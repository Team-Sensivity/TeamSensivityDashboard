<?php
include "../inc/config.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_GET['code'])){
    echo 'no code';
    exit();
}

function exist($type, $discord){
	global $pdo;
	$stmt = $pdo->query("SELECT * FROM connections WHERE discord_id = '$discord'");
	while ($row = $stmt->fetch()) {
	 	if($type == $row["type"]){
			return true;
		}
	}

	return false;
}

function existUser($discord){
	global $pdo;
	$stmt = $pdo->query("SELECT * FROM users WHERE discord_id = '$discord'");
	while ($row = $stmt->fetch()) {
		return true;	 	
	}

	return false;
}

function addRole($discord_ID,$token,$points){
    global $clientid;
    global $botoken;
    
    $payload = [
	'platform_name'=>'Team Sensivity',
        'metadata' => array(
        'points'=>$points,
        ),
    ];

    $discord_api_url = 'https://discord.com/api/v10/users/@me/applications/'.$clientid.'/role-connection';

    $header = array("Authorization: Bearer $token", "Content-Type: application/json");

    $ch = curl_init();
    //set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
    curl_setopt($ch,CURLOPT_URL, $discord_api_url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); //must be put for this method..
    curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($payload)); //must be a json body
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $result = curl_exec($ch);

    if(!$result){
        echo curl_error($ch);
    }else{
        return true;
    }
}

function getPoints($discord){
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM users WHERE discord_id = '$discord'");
    while ($row = $stmt->fetch()) {
        return $row["points"];
    }

    return NULL;
}



$discord_code = $_GET['code'];


$payload = [
    'code'=>$discord_code,
    'client_id'=>$clientid,
    'client_secret'=>$clientsecret,
    'grant_type'=>'authorization_code',
    'redirect_uri'=>'https://dashboard.sensivity.team/connect/discord/process-oauth.php',
    'scope'=>'identify%20connections%20role_connections.write',
];

$payload_string = http_build_query($payload);
$discord_token_url = "https://discord.com/api/v10/oauth2/token";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $discord_token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$result = curl_exec($ch);

if(!$result){
    echo curl_error($ch);
}

$result = json_decode($result,true);
$access_token = $result['access_token'];
$refresh_token  = $result['refresh_token'];

$discord_connections_url = "https://discordapp.com/api/users/@me/connections";
$header = array("Authorization: Bearer $access_token", "Content-Type: application/x-www-form-urlencoded");

$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_URL, $discord_connections_url);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$connections = curl_exec($ch);

$discord_users_url = "https://discordapp.com/api/users/@me";

curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_URL, $discord_users_url);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$user = curl_exec($ch);
$user = json_decode($user, true);

$user_id = $user["id"];

$connections = json_decode($connections, true);

if(existUser($user_id)){
foreach($connections AS $connect){
	$type = $connect["type"];
	$connect_id = $connect["id"];
	$connect_name = $connect["name"];

	if(!exist($type, $user_id)){
 		$sql = "INSERT INTO connections (discord_id, type, connect_id, connect_name) VALUES ('$user_id','$type','$connect_id','$connect_name')";
 		$stmt = $pdo->prepare($sql);
 		$stmt->execute();
	}else {
		$sql = "UPDATE connections SET connect_id = '$connect_id', connect_name = '$connect_name' WHERE discord_id = '$user_id' AND type = '$type'";
		$stmt = $pdo->prepare($sql);
 		$stmt->execute();
	}

		$sql = "UPDATE users SET discord_token = '$access_token', update_token = '$refresh_token'  WHERE discord_id = '$user_id'";
 		$stmt = $pdo->prepare($sql);
 		$stmt->execute();


}

    $punkt = getPoints($user_id);

    addRole($user_id, $access_token, $punkt);

header("Location: erfolg.html");
}else {
header("Location: no-account.php");
}

exit();