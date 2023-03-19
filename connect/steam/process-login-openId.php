<?php
session_start();

include "inc/config.php";

function getDiscordID($discord){
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM connections WHERE type = 'steam' AND connect_id = '$discord'");
    while ($row = $stmt->fetch()) {
        return $row["discord_id"];
    }

    return NULL;
}

function getID($discord){
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM users WHERE discord_id = '$discord'");
    while ($row = $stmt->fetch()) {
        return $row["id"];
    }

    return NULL;
}



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

    $username = $response['response']['players'][0]['steamid'];

	$discord_id = getDiscordID($username);

	if($discord_id == NULL){
        header("Location: /login.php?error=Du hast deinen Steam Account nicht mit deinem Account verknüpft.");
        exit();
	}else {
		$_SESSION['userid'] = getId($discord_id);
	}

    header("Location: /");
    
}else{
    header("Location: /login.php?error=Ein Fehler ist aufgetreten.");
    exit();
}

exit();