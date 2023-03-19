<?php
session_start();
require_once("../inc/config.inc.php");
require_once("../inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();


include "inc/config.php";

$params = [
    'openid.assoc_handle' => $_GET['openid_assoc_handle'],
    'openid.signed'       => $_GET['openid_signed'],
    'openid.sig'          => $_GET['openid_sig'],
    'openid.ns'           => 'http://specs.openid.net/auth/2.0',
    'openid.mode'         => 'check_authentication',
];

$signed = explode(',', $_GET['openid_signed']);

foreach ($signed as $item) {
    $val = $_GET['openid_'.str_replace('.', '_', $item)];
    $params['openid.'.$item] = stripslashes($val);
}

$data = http_build_query($params);
//data prep
$context = stream_context_create([
    'http' => [
        'method' => 'POST',
        'header' => "Accept-language: en\r\n".
        "Content-type: application/x-www-form-urlencoded\r\n".
        'Content-Length: '.strlen($data)."\r\n",
        'content' => $data,
    ],
]);

//get the data
$result = file_get_contents('https://steamcommunity.com/openid/login', false, $context);

if(preg_match("#is_valid\s*:\s*true#i", $result)){
    preg_match('#^https://steamcommunity.com/openid/id/([0-9]{17,25})#', $_GET['openid_claimed_id'], $matches);
    $steamID64 = is_numeric($matches[1]) ? $matches[1] : 0;

    $response = file_get_contents('https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key='.$steamkey.'&steamids='.$steamID64);
    $response = json_decode($response,true);

    $username = $response['response']['players'][0]['personaname'];
    $connections = getConnections($user["discord_id"]);

    $discord_id = $user["discord_id"];

    if(empty($connections["steam"])){
 		$sql = "INSERT INTO connections (discord_id, type, connect_id, connect_name) VALUES ('$discord_id','steam','$steamID64','$username')";
 		$stmt = $pdo->prepare($sql);
 		$stmt->execute();
	}else {
		$sql = "UPDATE connections SET connect_id = '$steamID64', connect_name = '$username' WHERE discord_id = '$discord_id' AND type = 'steam'";
		$stmt = $pdo->prepare($sql);
 		$stmt->execute();
    }

    header("Location: /settings.php");
    
}else{
    echo 'error: unable to validate your request';
    exit();
}

exit();