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
                            <h1>Verwalte Features (<?php echo $server["name"]; ?>)</h1>
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
                    <div class="card widget widget-popular-blog">
                        <div class="card-body">
                            <div class="widget-popular-blog-container">
                                <div class="widget-popular-blog-image">
                                    <img src="/assets/images/widgets/product2.jpeg" alt="">
                                </div>
                                <div class="widget-popular-blog-content ps-4">
                                                <span class="widget-popular-blog-title">
                                                    PunkteSystem
                                                </span>
                                    <span class="widget-popular-blog-text">
                                                    Dieses Feature vergibt Punkte für jede Nachricht und für Aktivität im Sprachchannel
                                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                                        <span class="widget-popular-blog-date text-success">
                                            Active
                                        </span>
                            <a href="#" class="btn btn-primary float-end">Zum Feature</a>
                        </div>
                    </div>
                    <div class="card widget widget-popular-blog">
                        <div class="card-body">
                            <div class="widget-popular-blog-container">
                                <div class="widget-popular-blog-content pe-4">
                                                <span class="widget-popular-blog-title">
                                                    Temporäre Channel
                                                </span>
                                    <span class="widget-popular-blog-text">
                                                    Erzeugt Temporäre Channel, die wieder gelöscht werden sobald keiner mehr im Channel ist.
                                                </span>
                                </div>
                                <div class="widget-popular-blog-image">
                                    <img src="/assets/images/widgets/product3.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="tempo.php?id=<?php echo $_GET["id"]; ?>" class="btn btn-primary">Zum Feature</a>
                            <span class="widget-popular-blog-date float-end text-success">
                                            Active
                                        </span>
                        </div>
                    </div>
                    <div class="card widget widget-popular-blog">
                        <div class="card-body">
                            <div class="widget-popular-blog-container">
                                <div class="widget-popular-blog-image">
                                    <img src="/assets/images/widgets/product2.jpeg" alt="">
                                </div>
                                <div class="widget-popular-blog-content ps-4">
                                                <span class="widget-popular-blog-title">
                                                    MusikBot
                                                </span>
                                    <span class="widget-popular-blog-text">
                                                    Dieses Feature kann Musik in Sprachchannel abspielen...
                                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                                        <span class="widget-popular-blog-date text-success">
                                            Active
                                        </span>
                            <a href="#" class="btn btn-primary float-end">Zum Feature</a>
                        </div>
                    </div>
                    <div class="card widget widget-popular-blog">
                        <div class="card-body">
                            <div class="widget-popular-blog-container">
                                <div class="widget-popular-blog-content pe-4">
                                                <span class="widget-popular-blog-title">
                                                    Temporäre Channel
                                                </span>
                                    <span class="widget-popular-blog-text">
                                                    Erzeugt Temporäre Channel, die wieder gelöscht werden sobald keiner mehr im Channel ist.
                                                </span>
                                </div>
                                <div class="widget-popular-blog-image">
                                    <img src="/assets/images/widgets/product3.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary">Zum Feature</a>
                            <span class="widget-popular-blog-date float-end text-success">
                                            Active
                                        </span>
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
