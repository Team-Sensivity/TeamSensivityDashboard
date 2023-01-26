<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

$user = check_user();

?>

<html lang="de">

<?php
include "templates/head.html";
?>
<body>

<?php
include "templates/menu.php";
?>
<style>
    .game-logo {
        text-align: center;
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        transition: 0.5s;
    }

    .game-logo:hover {
        top: 45%;
    }
</style>
</div>
<div class="app-container">
    <?php include "templates/app-header.php"; ?>
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Join Server</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <a href="/dbd-stats.php">
                            <div class="card bg-dark text-white" style="border-style: solid; border-color: #4b4b52; border-width:2px;">
                                <img src="/assets/images/cards/minecraft_banner.jpg" class="card-img" alt="...">
                                <div class="card-img-overlay" align="center" style="background-color: rgb(0,0,0, 0.4);">
                                   <img src="/assets/images/logos/games/minecraft-logo.png" width="350px" class="game-logo">
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-dark text-white" style="border-style: solid; border-color: #4b4b52; border-width:2px;">
                                <img src="/assets/images/cards/space_banner.jpg" class="card-img" alt="...">
                            <div class="card-img-overlay" align="center" style="background-color: rgb(0,0,0, 0.4)">
                                <img src="/assets/images/logos/games/space-logo.webp" width="350px" class="game-logo">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-dark text-white" style="border-style: solid; border-color: #4b4b52; border-width:2px;">
                                <img src="/assets/images/cards/satis_banner.jpg" class="card-img" alt="...">
                            <div class="card-img-overlay" align="center" style="background-color: rgb(0,0,0, 0.4)">
        			 <img src="/assets/images/logos/games/satis-logo.webp" width="350px" class="game-logo">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-dark text-white" style="border-style: solid; border-color: #4b4b52; border-width:2px;">
                                <img src="/assets/images/cards/eco_banner.jpg" class="card-img" alt="...">
                            <div class="card-img-overlay" align="center" style="background-color: rgb(0,0,0, 0.4)">
                                <img src="/assets/images/logos/games/eco-logo.png" width="300px" class="game-logo">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-dark text-white" style="border-style: solid; border-color: #4b4b52; border-width:2px;">
                                <img src="/assets/images/cards/sea_banner.jpg" class="card-img" alt="...">
                            <div class="card-img-overlay" align="center" style="background-color: rgb(0,0,0, 0.4)">
                                <img src="/assets/images/logos/games/sea-logo.png" width="250px" class="game-logo">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-dark text-white" style="border-style: solid; border-color: #4b4b52; border-width:2px;">
                                <img src="/assets/images/cards/sea_banner.jpg" class="card-img" alt="...">
                            <div class="card-img-overlay" align="center" style="background-color: rgb(0,0,0, 0.4)">
                                <img src="/assets/images/logos/games/sea-logo.png" width="250px" class="game-logo">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
            <?php include "templates/footer.html"; ?>
    </div>
</div>
</div>
<?php
include "templates/javascript.html";
?>
</body>
</html>
