<?php
include "../inc/config.php";

if(isset($_GET["discord_id"])) {
    $discord = $_GET["discord_id"];

    $stmt = $pdo->query("SELECT * FROM users WHERE discord_id = '$discord'");
    while ($row = $stmt->fetch()) {
        $points = $row["points"];
        $discord_token = $row["discord_token"];
    }

    $payload = [
        'platform_name' => 'Team Sensivity',
        'metadata' => array(
            'points' => $points,
        ),
    ];

    $discord_api_url = 'https://discord.com/api/v10/users/@me/applications/' . $clientid . '/role-connection';

    $header = array("Authorization: Bearer $discord_token", "Content-Type: application/json");

    $ch = curl_init();
//set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_URL, $discord_api_url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); //must be put for this method..
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload)); //must be a json body
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    echo $result = curl_exec($ch);

    if (!$result) {
        echo curl_error($ch);
    } else {
        return true;
    }
}
?>