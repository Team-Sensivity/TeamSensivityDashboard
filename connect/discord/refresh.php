<?php
include "../inc/config.php";

$token = getRefresh($_GET["id"]);
echo refresh($token, $_GET["id"]);
function getRefresh($discord){
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM users WHERE discord_id = '$discord'");
    while ($row = $stmt->fetch()) {
        return $row["update_token"];
    }

    return NULL;
}

function refresh($refresh_token, $discord){
    global $clientid;
    global $clientsecret;
    global $pdo;

    $payload = [
        'client_id'=>$clientid,
        'client_secret'=>$clientsecret,
        'grant_type'=>'refresh_token',
        'refresh_token'=>$refresh_token,
    ];

    $payload_string = http_build_query($payload);
    $discord_token_url = "https://discord.com/api/v10/oauth2/token";

    $ch = curl_init();

    $header = array("Content-Type: application/x-www-form-urlencoded");

    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
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
    $access = $result['access_token'];
    $refresh  = $result['refresh_token'];

    $sql = "UPDATE users SET discord_token = '$access', update_token = '$refresh'  WHERE discord_id = '$discord'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return true;
}
?>