<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();

if (empty($user["steam_id"])) {
    header("Location: no-account.php");
} else {
    $urls = 'https://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=381210&key=AAB98CE4EF65918FD5FE6209892F9F7E&steamid=' . $user['steam_id'];
}

$json = file_get_contents($urls);
$myarray = json_decode($json, true);

$pipss = 0;
$skillchecks = 0;
$pipsk = 0;
$wins = 0;
$wink = 0;
$pips = 0;
$escape = 0;
$gen = 0;
$dgen = 0;
$ogen = 0;
$chest = 0;
$keller = 0;
$bloodpoints = 0;
$sacrifices = 0;
$mori = 0;
$huntress_w = 0;
$leatherface_w = 0;
$doctor_w = 0;
$blight_w = 0;
$nurse_w = 0;
$pyramidhead_w = 0;
$wraith_w = 0;
$trapper_w = 0;
$pig_W = 0;
$hag_w = 0;
$trickster_w = 0;
$cenobite_w = 0;
$dodged = 0;

for ($i = 0; $i < count($myarray["playerstats"]["stats"]); $i++) {
    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_CamperSkulls") {
        $pipss = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_Chapter19_Camper_Stat2") {
        $dodged = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_SkillCheckSuccess") {
        $skillchecks = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_KillerSkulls") {
        $pipsk = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_CamperMaxScoreByCategory") {
        $wins = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_SlasherMaxScoreByCategory") {
        $wink = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_UnlockRanking") {
        $pips = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_Escape") {
        $escape = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_GeneratorPct_float") {
        $gen = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_Camper8_Stat1") {
        $dgen = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_FinishWithPerks_Idx4") {
        $ogen = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_DLC7_Camper_Stat1") {
        $chest = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_Event1_Stat2") {
        $keller = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_BloodwebPoints") {
        $bloodpoints = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_SacrificedCampers") {
        $sacrifices = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_KilledCampers") {
        $mori = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_DLC5_Slasher_Stat1") {
        $huntress_w = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_DLC6_Slasher_Stat1") {
        $leatherface_w = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_DLC4_Slasher_Stat1") {
        $doctor_w = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_Chapter17_Slasher_Stat1") {
        $blight_w = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_SlasherChainAttack") {
        $nurse_w = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_Chapter16_Slasher_Stat1") {
        $pyramidhead_w = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_UncloakAttack") {
        $wraith_w = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_TrapPickup") {
        $trapper_w = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_DLC8_Slasher_Stat1") {
        $pig_W = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_DLC3_Slasher_Stat1") {
        $hag_w = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_Chapter19_Slasher_Stat1") {
        $trickster_w = $myarray["playerstats"]["stats"][$i]["value"];
    }

    if ($myarray["playerstats"]["stats"][$i]["name"] == "DBD_Chapter20_Slasher_Stat1") {
        $cenobite_w = $myarray["playerstats"]["stats"][$i]["value"];
    }
}

$gen = intval($gen);
$rangs = 20;
$in = "IV";
$color = "";

if ($pipss < 3) {
    $rangs = 20;
    $colors = "#afa484";
    $ins = "IV";
} else if ($pipss < 6) {
    $rangs = 19;
    $colors = "#afa484";
    $ins = "III";
    $pipss = $pipss - 3;
} else if ($pipss < 10) {
    $rangs = 18;
    $colors = "#afa484";
    $ins = "II";
    $pipss = $pipss - 6;
} else if ($pipss < 14) {
    $rangs = 17;
    $colors = "#afa484";
    $ins = "I";
    $pipss = $pipss - 10;
} else if ($pipss < 18) {
    $rangs = 16;
    $colors = "#c46a23";
    $ins = "IV";
    $pipss = $pipss - 14;
} else if ($pipss < 22) {
    $rangs = 15;
    $colors = "#c46a23";
    $ins = "III";
    $pipss = $pipss - 18;
} else if ($pipss < 26) {
    $rangs = 14;
    $colors = "#c46a23";
    $ins = "II";
    $pipss = $pipss - 22;
} else if ($pipss < 30) {
    $rangs = 13;
    $colors = "#c46a23";
    $ins = "I";
    $pipss = $pipss - 26;
} else if ($pipss < 35) {
    $rangs = 12;
    $colors = "#e7e2d6";
    $ins = "IV";
    $pipss = $pipss - 30;
} else if ($pipss < 40) {
    $rangs = 11;
    $colors = "#e7e2d6";
    $ins = "III";
    $pipss = $pipss - 35;
} else if ($pipss < 45) {
    $rangs = 10;
    $colors = "#e7e2d6";
    $ins = "II";
    $pipss = $pipss - 40;
} else if ($pipss < 50) {
    $rangs = 9;
    $colors = "#e7e2d6";
    $ins = "I";
    $pipss = $pipss - 45;
} else if ($pipss < 55) {
    $rangs = 8;
    $colors = "#e2b920";
    $ins = "IV";
    $pipss = $pipss - 50;
} else if ($pipss < 60) {
    $rangs = 7;
    $colors = "#e2b920";
    $ins = "III";
    $pipss = $pipss - 55;
} else if ($pipss < 65) {
    $rangs = 6;
    $colors = "#e2b920";
    $ins = "II";
    $pipss = $pipss - 60;
} else if ($pipss < 70) {
    $rangs = 5;
    $colors = "#e2b920";
    $ins = "I";
    $pipss = $pipss - 65;
} else if ($pipss < 75) {
    $rangs = 4;
    $colors = "#c01815";
    $ins = "IV";
    $pipss = $pipss - 70;
} else if ($pipss < 80) {
    $rangs = 3;
    $colors = "#c01815";
    $ins = "III";
    $pipss = $pipss - 75;
} else if ($pipss < 85) {
    $rangs = 2;
    $colors = "#c01815";
    $ins = "II";
    $pipss = $pipss - 80;
} else {
    $rangs = 1;
    $colors = "#c01815";
    $ins = "I";
    $pipss = 0;
}

if ($pipsk < 3) {
    $rangk = 20;
    $color = "#afa484";
    $in = "IV";
} else if ($pipsk < 6) {
    $rangk = 19;
    $color = "#afa484";
    $in = "III";
    $pipsk = $pipsk - 3;
} else if ($pipsk < 10) {
    $rangk = 18;
    $color = "#afa484";
    $in = "II";
    $pipsk = $pipsk - 6;
} else if ($pipsk < 14) {
    $rangk = 17;
    $color = "#afa484";
    $in = "I";
    $pipsk = $pipsk - 10;
} else if ($pipsk < 18) {
    $rangk = 16;
    $color = "#c46a23";
    $in = "IV";
    $pipsk = $pipsk - 14;
} else if ($pipsk < 22) {
    $rangk = 15;
    $color = "#c46a23";
    $in = "III";
    $pipsk = $pipsk - 18;
} else if ($pipsk < 26) {
    $rangk = 14;
    $color = "#c46a23";
    $in = "II";
    $pipsk = $pipsk - 22;
} else if ($pipsk < 30) {
    $rangk = 13;
    $color = "#c46a23";
    $in = "I";
    $pipsk = $pipsk - 26;
} else if ($pipsk < 35) {
    $rangk = 12;
    $color = "#e7e2d6";
    $in = "IV";
    $pipsk = $pipsk - 30;
} else if ($pipsk < 40) {
    $rangk = 11;
    $color = "#e7e2d6";
    $in = "III";
    $pipsk = $pipsk - 35;
} else if ($pipsk < 45) {
    $rangk = 10;
    $color = "#e7e2d6";
    $in = "II";
    $pipsk = $pipsk - 40;
} else if ($pipsk < 50) {
    $rangk = 9;
    $color = "#e7e2d6";
    $in = "I";
    $pipsk = $pipsk - 45;
} else if ($pipsk < 55) {
    $rangk = 8;
    $color = "#e2b920";
    $in = "IV";
    $pipsk = $pipsk - 50;
} else if ($pipsk < 60) {
    $rangk = 7;
    $color = "#e2b920";
    $in = "III";
    $pipsk = $pipsk - 55;
} else if ($pipsk < 65) {
    $rangk = 6;
    $color = "#e2b920";
    $in = "II";
    $pipsk = $pipsk - 60;
} else if ($pipsk < 70) {
    $rangk = 5;
    $color = "#e2b920";
    $in = "I";
    $pipsk = $pipsk - 65;
} else if ($pipsk < 75) {
    $rangk = 4;
    $color = "#c01815";
    $in = "IV";
    $pipsk = $pipsk - 70;
} else if ($pipsk < 80) {
    $rangk = 3;
    $color = "#c01815";
    $in = "III";
    $pipsk = $pipsk - 75;
} else if ($pipsk < 85) {
    $rangk = 2;
    $color = "#c01815";
    $in = "II";
    $pipsk = $pipsk - 80;
} else {
    $rangk = 1;
    $color = "#c01815";
    $in = "I";
    $pipsk = 0;
}
?>

<html lang="de" xmlns="http://www.w3.org/1999/html">

<?php
include "templates/head.html";
?>
<body>
<?php
include "templates/menu.php";
?>
<style>
    @font-face {
        font-family: 'rang';
        font-style: normal;
        font-weight: 400;
        src: url(assets/fonts/ROMANUS.otf) format('otf');

    }
</style>

</div>
<div class="app-container">
    <?php include "templates/app-header.php"; ?>
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Dead By Daylight Stats</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card widget widget-info"
                             style="background: url('/assets/images/backgrounds/dbd.jpg');">
                            <div style="margin-top: 200px;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: -90px;">
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div style="margin-right: 10px; margin-top: -20px;">
                                        <img src="/assets/images/rank/<?php echo $rangk; ?>.webp"
                                             width="100px">
                                        <h1 style="text-align: center; margin-top:-83px; font-family: rang; color: <?php echo $color; ?>"><?php echo $in; ?></h1>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title" style="font-size: 17px;">Killer Rang</span>
                                        <?php
                                        if ($pipsk != 0) {
                                            echo '<span class="widget-stats-amount"><img src="assets/images/rank/pip' . $pipsk . '.png" height="30px"></span>';
                                        } else {
                                            echo '<br><br>';
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div style="margin-right: 10px; margin-top: -20px;">
                                        <img src="/assets/images/rank/<?php echo $rangs; ?>s.webp"
                                             width="100px">
                                        <h1 style="text-align: center; margin-top:-83px; font-family: rang; color: <?php echo $colors; ?>"><?php echo $ins; ?></h1>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                            <span class="widget-stats-title"
                                                  style="font-size: 17px;">Survivor Rang</span>
                                        <?php
                                        if ($pipss != 0) {
                                            echo '<span class="widget-stats-amount"><img src="/assets/images/rank/pip' . $pipss . '.png" height="30px"></span>';
                                        } else {
                                            echo '<br><br>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div style="margin-right: 10px; ">


                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Gesamte Pip anzahl</span>

                                        <span class="widget-stats-amount"><?php echo $pips; ?></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div style="margin-right: 10px; ">
                                        <img src="/assets/images/dbd/surv_icon.png" width="60px">
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Siege als Survivor</span>
                                        <span class="widget-stats-amount"><?php echo $wins; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div style="margin-right: 10px; ">
                                        <img src="assets/images/dbd/killer_icon.png" width="60px">
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Siege als Killer</span>
                                        <span class="widget-stats-amount"><?php echo $wink; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div style="margin-right: 10px; ">
                                        <img src="assets/images/dbd/SkillCheck.png" width="60px">
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Gute Skill Checks</span>
                                        <span class="widget-stats-amount"><?php echo $skillchecks; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card widget widget-info">
                            <div class="card-body">
                                <div class="widget-info-container">
                                    <div class="widget-info-image"
                                         ><img src="assets/images/dbd/chest.webp" width="75px"> </div>
                                    <h5 class="widget-info-title"><?php echo $chest; ?> Kisten geöffnet</h5>
                                    <p class="widget-info-text">Davon wurden <?php echo $keller; ?> im Keller
                                        geöffnet.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-info-inline">
                            <div class="card-header">
                                <h5 class="card-title">Generators</h5>
                            </div>
                            <div class="card-body">
                                <div class="widget-info-container">
                                    <p class="widget-info-text"><b>Generatoren
                                            repariert: </b><br><?php echo $gen; ?><br><b>Generatoren ohne Perk
                                            repariert:</b> <br><?php echo $ogen; ?></p>
                                    <div class="widget-info-image"
                                         style="background: url('assets/images/dbd/gen.webp')"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-info">
                            <div class="card-body">
                                <div class="widget-info-container">
                                    <div class="widget-info-image"
                                    ><img src="assets/images/dbd/doged.png" width="65px"> </div>
                                    <h5 class="widget-info-title"><?php echo $dodged; ?> Mal</h5>
                                    <p class="widget-info-text">Basic Attacken and Projektile gedodged.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-8">
                        <div class="card widget widget-action-list">
                            <div class="card-body">
                                <div class="widget-action-list-container">
                                    <ul class="list-unstyled d-flex no-m">
                                        <li class="widget-action-list-item">
                                            <a>
                                                <img src="assets/images/dbd/bloodpoints.webp" width="60px">
                                                <span class="widget-action-list-item-title">
                                                            <?php echo $bloodpoints; ?><br> Total Bloodpoints
                                                        </span>
                                            </a>
                                        </li>
                                        <li class="widget-action-list-item">
                                            <a>
                                                <img src="assets/images/dbd/skull.webp" width="50px">
                                                <span class="widget-action-list-item-title">
                                                            <?php echo $sacrifices; ?><br> Sacrifices
                                                        </span>
                                            </a>
                                        </li>
                                        <li class="widget-action-list-item">
                                            <a>
                                                <img src="assets/images/dbd/mori.webp" width="60px">
                                                <span class="widget-action-list-item-title">
                                                            <?php echo $mori; ?><br> Moris
                                                        </span>
                                            </a>
                                        </li>
                                        <li class="widget-action-list-item">
                                            <a>
                                                <img src="assets/images/dbd/hatch.webp" width="60px">
                                                <span class="widget-action-list-item-title">
                                                            <?php echo $bloodpoints; ?><br> Hatches closed
                                                        </span>
                                            </a>
                                        </li>
                                        <li class="widget-action-list-item">
                                            <a>
                                                <img src="assets/images/dbd/bloodpoints.webp" width="60px">
                                                <span class="widget-action-list-item-title">
                                                            <?php echo $bloodpoints; ?><br> Total Bloodpoints
                                                        </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget-tweet">
                            <div class="card-body">
                                <div class="widget-tweet-container">
                                    <div class="widget-tweet-content">

                                        <p class="widget-tweet-text">I think we did a pretty good...job so far.</p>
                                        <p class="widget-tweet-author">- Mathieu Cote</p>
                                        <p><br></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card widget widget-action-list">
                            <div class="card-body">
                                <div class="widget-action-list-container">
                                    <ul class="list-unstyled d-flex no-m">
                                        <li class="widget-action-list-item">
                                            <a>
                                                <img src="assets/images/dbd/huntress_w.webp" width="60px">
                                                <span class="widget-action-list-item-title">
                                                            <?php echo $huntress_w; ?><br> Hatchets thrown
                                                        </span>
                                            </a>
                                        </li>
                                        <li class="widget-action-list-item">
                                            <a>
                                                <img src="assets/images/dbd/leatherface_w.webp" width="60px">
                                                <span class="widget-action-list-item-title">
                                                            <?php echo $leatherface_w; ?><br> Survivors downed with chainsaw
                                                        </span>
                                            </a>
                                        </li>
                                        <li class="widget-action-list-item">
                                            <a>
                                                <img src="assets/images/dbd/doctor_w.webp" width="60px">
                                                <span class="widget-action-list-item-title">
                                                            <?php echo $doctor_w; ?><br> Shocks
                                                        </span>
                                            </a>
                                        </li>
                                        <li class="widget-action-list-item">
                                            <a>
                                                <img src="assets/images/dbd/blight_w.webp" width="60px">
                                                <span class="widget-action-list-item-title">
                                                            <?php echo $blight_w; ?><br> Survivors hit with Lethal Rush
                                                        </span>
                                            </a>
                                        </li>
                                        <li class="widget-action-list-item">
                                            <a>
                                                <img src="assets/images/dbd/nurse_w.webp" width="60px">
                                                <span class="widget-action-list-item-title">
                                                            <?php echo $nurse_w; ?><br> Blink attacks
                                                        </span>
                                            </a>
                                        </li>
                                        <li class="widget-action-list-item">
                                            <a>
                                                <img src="assets/images/dbd/pyramidhead_W.webp" width="60px">
                                                <span class="widget-action-list-item-title">
                                                            <?php echo $pyramidhead_w; ?><br> Survivors sent to Cage of Atonement
                                                        </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex no-m">
                                        <li class="widget-action-list-item">
                                            <a>
                                                <img src="assets/images/dbd/wraith_w.webp" width="60px">
                                                <span class="widget-action-list-item-title">
                                                            <?php echo $wraith_w; ?><br> Uncloak attacks
                                                        </span>
                                            </a>
                                        </li>
                                        <li class="widget-action-list-item">
                                            <a>
                                                <img src="assets/images/dbd/trapper_w.webp" width="60px">
                                                <span class="widget-action-list-item-title">
                                                            <?php echo $trapper_w; ?><br> Survivors trapped and picked up
                                                        </span>
                                            </a>
                                        </li>
                                        <li class="widget-action-list-item">
                                            <a>
                                                <img src="assets/images/dbd/pig_w.webp" width="60px">
                                                <span class="widget-action-list-item-title">
                                                            <?php echo $pig_W; ?><br> Reverse bear-traps put on survivors
                                                        </span>
                                            </a>
                                        </li>
                                        <li class="widget-action-list-item">
                                            <a>
                                                <img src="assets/images/dbd/hag_w.webp" width="60px">
                                                <span class="widget-action-list-item-title">
                                                            <?php echo $hag_w; ?><br> Traps triggered
                                                        </span>
                                            </a>
                                        </li>
                                        <li class="widget-action-list-item">
                                            <a>
                                                <img src="assets/images/dbd/trickster_w.webp" width="60px">
                                                <span class="widget-action-list-item-title">
                                                            <?php echo $trickster_w; ?><br> Max Lacerations dealt
                                                        </span>
                                            </a>
                                        </li>
                                        <li class="widget-action-list-item">
                                            <a>
                                                <img src="assets/images/dbd/cenobite_w.webp" width="60px">
                                                <span class="widget-action-list-item-title">
                                                            <?php echo $cenobite_w; ?><br> Survivors bound with a possessed chain
                                                        </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/dwight.webp" width="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">DWIGHT FAIRFIELD</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/bond.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/prove_thyself.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/leader.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/meg.webp" width="75px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">MEG THOMAS</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/quick_quiet.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/sprint_burst.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/adrenaline.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/claudette.webp" width="75px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">CLAUDETTE MOREL</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/empathy.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/botany_knowledge.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/self_care.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/jake.webp" width="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">JAKE PARK</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/iron_will.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/calm_spirit.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/saboteur.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/bill.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">WILLIAM "BILL" OVERBECK</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/left_behind.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/unbreakable.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/borrowed_time.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/nea.webp" width="75px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">NEA KARLSSON</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/balanced_landing.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/urban_evasion.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/streetwise.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/david.webp" width="105px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">DAVID KING</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/iron_will.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/calm_spirit.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/saboteur.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/laurie.webp" width="80px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">LAURIE STRODE</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/sole_survivor.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/object_of_obsession.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/decisive_strike.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/ace.webp" width="90px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">ACE VISCOMTI</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/left_behind.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/borrowed_time.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/unbreakable.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/feng.webp" width="75px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">FENG MIN</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/technician.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/lithe.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/alert.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/quentin.webp" width="90px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">QUENTIN SMITH</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/wake_up.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/pharmacy.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/vigil.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/tapp.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">DETECTIVE DAVID TAPP</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/tenacity.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/detectives_hunch.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/stake_out.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/kate.webp" width="75px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">KATE DENSON</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/dance_with_me.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/windows_of_opportunity.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/boil_over.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/adam.webp" width="90px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">ADAM FRANCIS</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/diversion.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/deliverance.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/autodidact.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/jeff.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">JEFFREY "JEFF" JOHANSEN</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/breakdown.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/aftercare.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/distortion.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/jane.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">JANE ROMERO</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/solidarity.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/poised.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/head_on.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/ashley.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">ASHLEY J. WILLIAMS</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/flip_flop.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/buckle.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/mettle_of_man.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/yui.webp" width="90px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">YUI KIMURA</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/lucky_break.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/any_means_necessary.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/breakout.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/zarina.webp" width="90px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">ZARINA KASSIR</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/off_the_record.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/red_herring.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/for_the_people.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/cheryl.webp" width="75px" height="95px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">CHERYL MASON</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/soul_guard.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/blood_pact.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/repressed_alliance.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/felix.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">FELIX RICHTER</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/visionary.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/desperate_measures.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/built_to_last.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/elodie.webp" width="80px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">ÉLODIE RAKOTO</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/appraisal.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/deception.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/power_struggle.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/yun-jin.webp" width="90px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">YUN-JIN LEE</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/fast_track.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/smash_hit.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/self_preservation.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/jill.webp" width="80px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">JILL VALENTINE</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/counterforce.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/resurgence.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/blast_mine.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/leon.webp" width="90px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">LEON S. KENNEDY</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/bite_the_bullet.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/flashbang.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/rookie_spirit.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/mikaela.webp" width="110px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">MIKAELA REID</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/clairvoyance.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/circle_of_healing.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/shadow_step.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/jonah.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">JONAH VASQUEZ</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/overcome.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/corrective_action.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/boon_exponential.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/yoichi.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">YOICHI ASAKAWA</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/parental_guidance.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/empathic_connection.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/boon_dark_theory.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/haddie.webp" width="80px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">HADDIE KAUR</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/inner_focus.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/residual_manifest.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/overzealous.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/ada.webp" width="80px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">ADA WONG</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/inner_focus.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/residual_manifest.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/overzealous.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/rebeca.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">REBECCA CHAMBERS</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/inner_focus.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/residual_manifest.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/overzealous.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/killer/trapper.webp" width="100px" height="90px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">THE TRAPPER</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/killer/unnerving_presence.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/killer/brutal_strength.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/killer/agitation.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/killer/wraith.webp" width="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">THE WRAITH</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/quick_quiet.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/sprint_burst.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/adrenaline.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/claudette.webp" width="75px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">CLAUDETTE MOREL</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/empathy.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/botany_knowledge.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/self_care.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/jake.webp" width="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">JAKE PARK</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/iron_will.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/calm_spirit.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/saboteur.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/bill.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">WILLIAM "BILL" OVERBECK</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/left_behind.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/unbreakable.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/borrowed_time.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/nea.webp" width="75px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">NEA KARLSSON</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/balanced_landing.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/urban_evasion.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/streetwise.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/david.webp" width="105px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">DAVID KING</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/iron_will.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/calm_spirit.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/saboteur.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/laurie.webp" width="80px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">LAURIE STRODE</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/sole_survivor.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/object_of_obsession.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/decisive_strike.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/ace.webp" width="90px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">ACE VISCOMTI</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/left_behind.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/borrowed_time.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/unbreakable.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/feng.webp" width="75px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">FENG MIN</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/technician.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/lithe.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/alert.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/quentin.webp" width="90px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">QUENTIN SMITH</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/wake_up.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/pharmacy.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/vigil.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/tapp.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">DETECTIVE DAVID TAPP</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/tenacity.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/detectives_hunch.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/stake_out.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/kate.webp" width="75px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">KATE DENSON</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/dance_with_me.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/windows_of_opportunity.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/boil_over.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/adam.webp" width="90px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">ADAM FRANCIS</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/diversion.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/deliverance.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/autodidact.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/jeff.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">JEFFREY "JEFF" JOHANSEN</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/breakdown.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/aftercare.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/distortion.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/jane.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">JANE ROMERO</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/solidarity.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/poised.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/head_on.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/ashley.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">ASHLEY J. WILLIAMS</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/flip_flop.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/buckle.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/mettle_of_man.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/yui.webp" width="90px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">YUI KIMURA</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/lucky_break.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/any_means_necessary.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/breakout.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/zarina.webp" width="90px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">ZARINA KASSIR</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/off_the_record.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/red_herring.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/for_the_people.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/cheryl.webp" width="75px" height="95px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">CHERYL MASON</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/soul_guard.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/blood_pact.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/repressed_alliance.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/felix.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">FELIX RICHTER</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/visionary.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/desperate_measures.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/built_to_last.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/elodie.webp" width="80px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">ÉLODIE RAKOTO</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/appraisal.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/deception.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/power_struggle.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/yun-jin.webp" width="90px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">YUN-JIN LEE</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/fast_track.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/smash_hit.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/self_preservation.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/jill.webp" width="80px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">JILL VALENTINE</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/counterforce.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/resurgence.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/blast_mine.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/leon.webp" width="90px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">LEON S. KENNEDY</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/bite_the_bullet.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/flashbang.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/rookie_spirit.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/mikaela.webp" width="110px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">MIKAELA REID</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/clairvoyance.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/circle_of_healing.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/shadow_step.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/jonah.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">JONAH VASQUEZ</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/overcome.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/corrective_action.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/boon_exponential.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/yoichi.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">YOICHI ASAKAWA</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/parental_guidance.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/empathic_connection.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/boon_dark_theory.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/haddie.webp" width="80px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">HADDIE KAUR</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/inner_focus.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/residual_manifest.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/overzealous.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/ada.webp" width="80px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">ADA WONG</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/inner_focus.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/residual_manifest.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/overzealous.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <img src="assets/images/dbd/survivor/rebeca.webp" width="100px" height="100px">
                                    <div class="widget-stats-content flex-fill">
                                        <center>
                                            <span class="widget-stats-title">REBECCA CHAMBERS</span>
                                            <span class="widget-stats-amount"><i
                                                        class="material-icons align-middle text-success">done</i></span
                                            <span>
                                                <img src="assets/images/dbd/perks/survivor/inner_focus.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/residual_manifest.webp" width="50px"
                                                     style="margin-top: 10px;">
                                                <img src="assets/images/dbd/perks/survivor/overzealous.webp" width="50px"
                                                     style="margin-top: 10px;">
                                            </span>
                                        </center>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        9x
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
include "templates/javascript.html";
?>
</body>
</html>