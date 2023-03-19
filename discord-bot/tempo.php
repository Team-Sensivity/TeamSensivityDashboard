<?php
session_start();
require_once("../connect/inc/config.php");
require_once("../inc/functions.inc.php");

$user = check_user();
$alert = "";

function isOnGuild($id){
    global $pdo;

    $stmt = $pdo->query("SELECT * FROM bot_guilds WHERE guild_id = '".$id."'");
    while ($stmt->fetch()) {
        return true;
    }

    return false;
}


if(isset($_GET["id"])){
    if(isOnGuild($_GET["id"])){
        $header = array("Authorization: Bot $bottoken", "Content-Type: application/x-www-form-urlencoded");
        $discord_users_url = "https://discordapp.com/api/guilds/".$_GET["id"];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $discord_users_url);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $server = curl_exec($ch);
        $server = json_decode($server, true);
    }else {
        header("Location: https://discord.com/oauth2/authorize?client_id=1083748264404324372&permissions=8&scope=bot%20applications.commands");
    }
}else {
    header("Location: ./");
}
?>
<html lang="de">

<?php
include "../templates/head.html";
?>
<body>
<?php
include "../templates/menu.php";
?>

</div>
<div class="app-container">
    <?php include "../templates/app-header.php"; ?>
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Temporäre Channel (<?php echo $server["name"]; ?>)</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <center>
                        <div class="col-md-6">
                            <center>
                                <?php
                                echo $alert;
                                ?>
                            </center>
                        </div>
                    </center>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Wähle einen VoiceChannel</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-description">Wähle einen VoiceChannel aus dem man Beitreten muss um einen neuen Channel zu erstellen.</p>
                                <div class="example-container">
                                    <div class="example-content">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Select VoiceChannel</option>
                                            <?php
                                            $discord_users_url = "https://discordapp.com/api/guilds/".$_GET["id"]."/channels";

                                            $header = array("Authorization: Bot $bottoken", "Content-Type: application/x-www-form-urlencoded");
                                            $ch = curl_init();
                                            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                                            curl_setopt($ch, CURLOPT_URL, $discord_users_url);
                                            curl_setopt($ch, CURLOPT_POST, false);
                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                                            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                                            $channels = curl_exec($ch);
                                            $channels = json_decode($channels, true);

                                            foreach ($channels as $c){
                                                if($c["type"] == 2)
                                                echo ' <option value="'.$c["id"].'">'.$c["name"].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include "../templates/javascript.html";
?>
</body>
</html>
