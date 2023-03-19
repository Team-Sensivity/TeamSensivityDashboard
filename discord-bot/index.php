<?php
session_start();
require_once("../connect/inc/config.php");
require_once("../inc/functions.inc.php");

$user = check_user();
$alert = "";
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
                            <h1>Select Server</h1>
                        </div>
                    </div>
                </div>
                <style>
                    .cover-img img {
                        border: 5px solid #27313f;
                        border-radius: 10px;
                        transition: 0.3s;
                    }

                    .cover-img img:hover {
                        border-color: #4a5d78;
                    }
                </style>
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
                    <div class="col-md-12">
                        <div class="row">
                            <?php
                            $stmt = $pdo->query("SELECT * FROM guilds WHERE discord_id = '".$user['discord_id']."'");
                            while ($row = $stmt->fetch()) {
                                if($row["permissions"] == "2147483647"){
                                    if($row["icon"] != null) {
                                        echo '<div class="col-md-1 cover-img" style="padding-right: 160px;">
                                            <a href="manage.php?id='.$row["guild_id"].'"><img src="https://cdn.discordapp.com/icons/' . $row["guild_id"] . '/' . $row["icon"] . '.webp?size=128"></a>
                                           </div>';
                                    }else {
                                        echo '<div class="col-md-1 cover-img" style="padding-right: 160px;">
                                            <a data-bs-toggle="modal" data-bs-target="#LeagueOfLegends"><img width="140px" src="https://cdn.discordapp.com/embed/avatars/1.png"></a>
                                           </div>';
                                    }
                                }
                            }
                            ?>
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