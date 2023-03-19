<?php
session_start();

include "../inc/config.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_GET['code'])){
    header("Location: /login.php?error=Ein Fehler ist aufgetreten.");
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

function getID($discord){
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM users WHERE discord_id = '$discord'");
    while ($row = $stmt->fetch()) {
        return $row["id"];
    }

    return NULL;
}

function existUser($discord){
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM users WHERE discord_id = '$discord'");
    while ($row = $stmt->fetch()) {
        return true;
    }

    return false;
}

function guildExist($discord, $guild){
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM guilds WHERE discord_id = '$discord' AND guild_id = '$guild'");
    while ($row = $stmt->fetch()) {
        return true;
    }

    return false;
}

function getPoints($discord){
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM users WHERE discord_id = '$discord'");
    while ($row = $stmt->fetch()) {
        return $row["points"];
    }

    return NULL;
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



$discord_code = $_GET['code'];


$payload = [
    'code'=>$discord_code,
    'client_id'=>$clientid,
    'client_secret'=>$clientsecret,
    'grant_type'=>'authorization_code',
    'redirect_uri'=>'https://dashboard.sensivity.team/connect/discord/auth-bot.php',
    'scope'=>'identify%20connections%20role_connections.write%20guilds',
];

$payload_string = http_build_query($payload);
$discord_token_url = "https://discordapp.com/api/oauth2/token";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $discord_token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$result = curl_exec($ch);

if(!$result){
    header("Location: /login.php?error=Ein Fehler ist aufgetreten. Versuche es erneut.");
    exit();
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
$discord_username = $user["username"]."#".$user["discriminator"];
$discord_pb = "https://cdn.discordapp.com/avatars/".$user_id."/".$user["avatar"].".png";

if($user["banner"] == "null"){
    $banner = NULL;
}else {
    $banner = "https://cdn.discordapp.com/banners/".$user_id."/".$user["banner"].".png";
}

$connections = json_decode($connections, true);


$discord_api_url = "https://discordapp.com/api";
$header = array("Authorization: Bearer $access_token","Content-Type: application/x-www-form-urlencoded");
$ch = curl_init();
//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
curl_setopt($ch,CURLOPT_URL, $discord_api_url.'/users/@me/guilds');
curl_setopt($ch,CURLOPT_POST, false);
//curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$guilds = curl_exec($ch);
$guilds = json_decode($guilds,true);

foreach ($guilds as $g){
    $guild_id = $g["id"];
    $permission = $g["permissions"];
    $icon = $g["icon"];

    if(guildExist($user_id, $guild_id)){
        $sql = "UPDATE guilds SET permissions = '$permission', icon = '$icon' WHERE discord_id = '$user_id' AND guild_id = '$guild_id'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }else {
        $sql = "INSERT INTO guilds (discord_id, guild_id, permissions, icon) VALUES ('$user_id','$guild_id','$permission', '$icon')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }
}

if(!existUser($user_id)){

    $sql = "INSERT INTO users (discord_id, discord_pb, discord_username, discord_banner, website_url, discord_token, update_token) VALUES ('$user_id','$discord_pb','$discord_username','$banner', '$user_id', '$access_token', '$refresh_token')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

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
    }

    $_SESSION['userid'] = getId($user_id);
    addRole($user_id, $access_token, 0);
    header("Location: /discord-bot");
}else {

    $sql = "UPDATE users SET discord_pb = '$discord_pb', discord_username = '$discord_username', discord_banner = '$banner', discord_token = '$access_token', update_token = '$refresh_token' WHERE discord_id = '$user_id'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

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
    }


    $punkt = getPoints($user_id);

    addRole($user_id, $access_token, $punkt);

    $_SESSION['userid'] = getId($user_id);
    header("Location: /discord-bot");
}

exit();