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
        top: 50%;
        left: 50%;
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
                            <h1>Game Stats</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <a href="/dbd-stats.php">
                            <div class="card bg-dark text-white"
                                 style="border-style: solid; border-color: #4b4b52; border-width:2px;">
                                <img src="/assets/images/cards/dbd_banner.png" class="card-img" alt="...">
                                <div class="card-img-overlay" align="center" style="background-color: rgb(0,0,0, 0.4);">
                                    <img src="/assets/images/logos/games/dbd-logo.webp" width="350px" class="game-logo">
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-dark text-white"
                             style="border-style: solid; border-color: #4b4b52; border-width:2px;">
                            <img src="/assets/images/cards/lol_banner.jpg" class="card-img" alt="...">
                            <div class="card-img-overlay" align="center" style="background-color: rgb(0,0,0, 0.4)">
                                <img src="/assets/images/logos/games/lol-logo2.png" width="300px" class="game-logo">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-dark text-white"
                             style="border-style: solid; border-color: #4b4b52; border-width:2px;">
                            <img src="/assets/images/cards/valorant_banner.jpg" class="card-img" alt="...">
                            <div class="card-img-overlay" align="center" style="background-color: rgb(0,0,0, 0.4)">
                                <img src="/assets/images/logos/games/valorant-logo.png" width="180px" class="game-logo">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-dark text-white"
                             style="border-style: solid; border-color: #4b4b52; border-width:2px;">
                            <img src="/assets/images/cards/tft_banner.jpg" class="card-img" alt="...">
                            <div class="card-img-overlay" align="center" style="background-color: rgb(0,0,0, 0.4)">
                                <img src="/assets/images/logos/games/tft-logo.png" width="300px" class="game-logo">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-dark text-white"
                             style="border-style: solid; border-color: #4b4b52; border-width:2px;">
                            <img src="/assets/images/cards/sea_banner.jpg" class="card-img" alt="...">
                            <div class="card-img-overlay" align="center" style="background-color: rgb(0,0,0, 0.4)">
                                <img src="/assets/images/logos/games/sea-logo.png" width="250px" class="game-logo">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-dark text-white"
                             style="border-style: solid; border-color: #4b4b52; border-width:2px;">
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
