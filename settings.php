<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

$user = check_user();
$alert = "";
//Besitzt der User das Game ($dbd)
$dbd = 0;
$active = "";
$id = $user["id"];

//UpdateURL
if (isset($_POST["url"])){
    $url = $_POST["url"];
    $error = 0;

    $stmt = $pdo->query("SELECT * FROM users");

    while ($row = $stmt->fetch()) {
        if($row["website_url"] == $url){
            $error = 1;
        }
    }

    if($error == 1){
        $alert = '<div class="alert alert-danger alert-style-light" role="alert">
                        Benutzernamen schon vergeben.
                    </div>';
    }else {
        $sql = "UPDATE users SET website_url = '$url' WHERE id = '$id'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $user["website_url"] = $url;

        $alert = '<div class="alert alert-success alert-style-light" role="alert">
                        Benutzername wurde erfolgreich aktualisiert.
                    </div>';
    }
}

//DBD INFOS
if (isset($_GET["value"]) && isset($_GET["feature"])) {
    $feature = $_GET["feature"];
    $value = $_GET["value"];

    $sql = "UPDATE users SET $feature='$value' WHERE id = '$id'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $user = check_user();
}
//Modal disable
if(isset($user["steam_id"]) && isset($user["riot_puuid"]) && isset($user["discord_id"]) && $user["modal"] == 0){
    $sql = "UPDATE users SET modal = 1 WHERE id = '$id'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}

//Welcher Tab aktiv ist
if (isset($_GET["active"])) {
    $active = $_GET["active"];
}

//steamID
if (isset($_GET["steam_id"])) {
    $steam_id = $_GET["steam_id"];
    $steam_verify = 0;

    $url = 'https://steamcommunity.com/groups/TeamSensivityy/memberslistxml/?xml=1';
    $xmlurl = file_get_contents($url);
    $xml = simplexml_load_string($xmlurl);
    $json = json_encode($xml);
    $myarray = json_decode($json, TRUE);

    foreach ($myarray["members"]["steamID64"] as $value) {
        if ($steam_id == $value) {
            $steam_verify = 1;
        }
    }

    $error = 0;

    $stmt = $pdo->query("SELECT * FROM dbd_chars WHERE rolle = 'Survivor'");

    while ($row = $stmt->fetch()) {
       if($row["steam_id"] == $steam_id){
           $error = 1;
       }
    }

    if($error != 0){
        $alert = '<div class="alert alert-danger alert-style-light" role="alert">
                       Deine SteamID hat schon jemand anderes hinterlegt. Erstellen Sie ein Ticket um dies zu beheben...
                    </div>';
    }else {
        if ($steam_verify == 1) {
            $alert = '<div class="alert alert-success alert-style-light" role="alert">
                        Dein SteamAccount wurde erfolgreich verknüpft.
                    </div>';

            $sql = "UPDATE users SET steam_id = '$steam_id' WHERE id = '$id'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        } else {
            $alert = '<div class="alert alert-danger alert-style-light" role="alert">
                        Du bist nicht in der SteamGroup oder deine SteamID64 war falsch.
                    </div>';
        }
    }
} else if (isset($_GET["riot_id"])) {
    $summonername = $_GET["riot_id"];

    $url = 'https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/'.$summonername.'?api_key='.$RiotAPIKey;
    $xmlurl = file_get_contents($url);
    $riot_array = json_decode($xmlurl, TRUE);

    if (empty($riot_array["status_code"])) {
        $summonerid = $riot_array["id"];
        $riot_puuid = $riot_array["puuid"];

        $sql = "UPDATE users SET riot_puuid = '$riot_puuid', riot_summoner_id = '$summonerid', summoner_name = '$summonername' WHERE id = '$id'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $alert = '<div class="alert alert-success alert-style-light" role="alert">
                        Dein RiotAccount wurde erfolgreich verknüpft.
                    </div>';
    } else {
        $alert = '<div class="alert alert-danger alert-style-light" role="alert">
                        Dein SummonerName war falsch.
                    </div>';
    }
}

//USER BESITZT DBD
if (!empty($user["steam_id"])) {
    $url = 'https://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key='.$SteamAPIKey.'&steamid=' . $user["steam_id"];

    $json = file_get_contents($url);
    $myarray = json_decode($json, true);

    for ($i = 0; $i < count($myarray["response"]["games"]); $i++) {
        if ($myarray["response"]["games"][$i]["appid"] == "381210") {
            $dbd = 1;
        }
    }
}


?>

<html lang="de">

<?php
include "templates/head.html";
?>

<style>
    .cover-img {
        border: 5px solid #27313f;
        border-radius: 10px;
        transition: 0.3s;
    }

    .cover-img:hover {
        border-color: #4a5d78;
    }

    .active {
        border-color: #4a5d78;
    }
</style>
<body>

<?php
include "templates/menu.php";
?>

</div>
<div class="app-container">
    <?php include "templates/app-header.php"; ?>
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
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
                    <div class="col">
                        <div class="page-description page-description-tabbed">
                            <h1>Settings</h1>

                            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php if (!(isset($_GET["steam_id"]) || isset($_GET["riot_id"]) || $active == "connect") && $active != "dbd") {
                                        echo "active";
                                    } ?>" id="account-tab" data-bs-toggle="tab"
                                            data-bs-target="#account" type="button" role="tab"
                                            aria-controls="hoaccountme" aria-selected="true">Account
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php if ((isset($_GET["steam_id"]) || isset($_GET["riot_id"]) || $active == "connect") && $active != "dbd") {
                                        echo "active";
                                    } ?>" id="security-tab" data-bs-toggle="tab"
                                            data-bs-target="#security" type="button" role="tab"
                                            aria-controls="security" aria-selected="false">Verknüpfungen
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="security-tab" data-bs-toggle="tab"
                                            data-bs-target="#ecurity" type="button" role="tab"
                                            aria-controls="security" aria-selected="true">Security
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="integrations-tab" data-bs-toggle="tab"
                                            data-bs-target="#integrations" type="button" role="tab"
                                            aria-controls="integrations" aria-selected="false">Stats
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php if ($active == "dbd") {
                                        echo "active";
                                    } ?>" id="integrations-tab" data-bs-toggle="tab"
                                            data-bs-target="#dbd" type="button" role="tab"
                                            aria-controls="dbd" aria-selected="false">Dead By Daylight
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade <?php if (!(isset($_GET["steam_id"]) || isset($_GET["riot_id"])  || $active == "connect") && $active != "dbd") {
                                echo "show active";
                            } ?>" id="account" role="tabpanel"
                                 aria-labelledby="account-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form method="post">
                                                <label for="settingsInputEmail" class="form-label">Email
                                                    address</label>
                                                <div class="input-group">
                                                <input type="email" name="email" class="form-control" id="settingsInputEmail"
                                                       aria-describedby="settingsEmailHelp"
                                                       placeholder="example@sensivity.team">
                                                <button type="submit"
                                                        class="btn btn-primary btn-style-light"
                                                        id="settingsNewPassword">Ändern
                                                </button>
                                                </form>
                                                </div>
                                                <div id="settingsEmailHelp" class="form-text">Muss per E-Mail bestätigt werden...
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="settingsPhoneNumber" class="form-label">Phone
                                                    Number</label>
                                                <input type="text" class="form-control" id="settingsPhoneNumber"
                                                       placeholder="(xxx) xxx-xxxx">
                                            </div>
                                        </div>
                                        <div class="row m-t-lg">
                                            <div class="col-md-6">
                                                <label for="settingsInputFirstName" class="form-label">First
                                                    Name</label>
                                                <input type="text" class="form-control" id="settingsInputFirstName"
                                                       placeholder="John">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="settingsInputLastName" class="form-label">Last
                                                    Name</label>
                                                <input type="text" class="form-control" id="settingsInputLastName"
                                                       placeholder="Doe">
                                            </div>
                                        </div>
                                        <div class="row m-t-lg">
                                            <div class="col-md-6">
                                                <label for="settingsInputUserName"
                                                       class="form-label">Username</label>
                                                <form method="post">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="settingsInputUserName-add">sensivity.team/</span>
                                                    <input type="text" name="url" class="form-control"
                                                           id="settingsInputUserName"
                                                           value="<?php echo $user["website_url"]; ?>"
                                                           aria-describedby="settingsInputUserName-add"
                                                           placeholder="username">
                                                    <button type="submit"
                                                            class="btn btn-primary btn-style-light"
                                                            id="settingsNewPassword">Ändern
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row m-t-lg">
                                            <div class="col">
                                                <label for="settingsAbout" class="form-label">About</label>
                                                <textarea class="form-control" id="settingsAbout" maxlength="500"
                                                          rows="4" aria-describedby="settingsAboutHelp"></textarea>
                                                <div id="emailHelp" class="form-text">Brief information about you to
                                                    display on profile (max: 500 characters)
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-lg">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="SettingsNewsLetter">
                                                    <label class="form-check-label" for="SettingsNewsLetter">
                                                        Receive notifications about updates &amp; maintenances
                                                    </label>
                                                </div>
                                                <a href="#" class="btn btn-primary m-t-sm">Update</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade <?php if ((isset($_GET["steam_id"]) || isset($_GET["riot_id"])  || $active == "connect") && $active != "dbd") {
                                echo "show active";
                            } ?>" id="security" role="tabpanel" aria-labelledby="security-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="settings-security-two-factor">
                                            <h5>Accounts verknüpfen</h5>
                                            <span>Um alle funktionen des Team Sensivity Dashboards zu nutzen musst du deine GameAccounts verknüpfen. Dadurch kannst du deine Stats ansehen Achievements sammeln und vieles mehr. Eine Liste mit allen Vorteilen findest du <a
                                                        href="#">hier</a>.</span>
                                        </div>
                                        <div class="row m-t-xxl">
                                            <div class="col-md-6">
                                                <form method="get">
                                                    <label for="settingsCurrentPassword"
                                                           class="form-label">SteamAccount</label>
                                                    <div class="input-group">
                                                        <input name="steam_id" type="text" class="form-control"
                                                               placeholder="Bsp.: 765618973584321534" required <?php if(isset($user["steam_id"])){echo 'disabled value="'.$user["steam_id"].'"';}  ?>>
                                                        <button type="submit"
                                                                class="btn btn-primary btn-style-light"
                                                                id="settingsResentSmsCode" <?php if(isset($user["steam_id"])){echo 'disabled';}  ?>>Add
                                                        </button>
                                                    </div>
                                                    <div class="form-text">You must be in the following
                                                        <a href="https://steamcommunity.com/groups/TeamSensivityy"
                                                           target="_blank">SteamGroup</a>
                                                        to
                                                        be verified
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row m-t-xxl">
                                            <div class="col-md-6">
                                                <label for="settingsNewPassword" class="form-label">Riot
                                                    SummonerName</label>
                                                <form method="get">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                               aria-describedby="settingsNewPassword"
                                                               placeholder="Bsp.: michel929" name="riot_id"
                                                               required <?php if(isset($user["riot_puuid"])){echo 'disabled value="'.$user["summoner_name"].'"';}  ?>>
                                                        <button type="submit"
                                                                class="btn btn-primary btn-style-light"
                                                                id="settingsNewPassword" <?php if(isset($user["steam_id"])){echo 'disabled';}  ?>>Add
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row m-t-xxl">
                                            <div class="col-md-6">
                                                <label for="settingsConfirmPassword" class="form-label">Confirm
                                                    Password</label>
                                                <input type="password" class="form-control"
                                                       aria-describedby="settingsConfirmPassword"
                                                       placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                                            </div>
                                        </div>
                                        <div class="row m-t-xxl">
                                            <div class="col-md-6">
                                                <label for="settingsSmsCode" class="form-label">SMS Code</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control"
                                                           aria-describedby="settingsSmsCode"
                                                           placeholder="&#9679;&#9679;&#9679;&#9679;">
                                                    <button class="btn btn-primary btn-style-light"
                                                            id="settingsResentSmsCode">Resend
                                                    </button>
                                                </div>
                                                <div id="settingsSmsCode" class="form-text">Code will be sent to the
                                                    phone number from your account.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-lg">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="settingsPasswordLogout" checked>
                                                    <label class="form-check-label" for="settingsPasswordLogout">
                                                        Log out from all current sessions
                                                    </label>
                                                </div>
                                                <a href="#" class="btn btn-primary m-t-sm">Change Password</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="integrations" role="tabpanel"
                                 aria-labelledby="integrations-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="settings-integrations">
                                            <div class="settings-integrations-item">
                                                <div class="settings-integrations-item-info">
                                                    <img src="assets/images/logos/games/lol-logo.png"
                                                         alt="">
                                                    <span>Plan, track, and manage your agile and software development projects in Jira.</span>
                                                </div>
                                                <div class="settings-integrations-item-switcher">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input form-control-md"
                                                               type="checkbox" id="settingsIntegrationOneSwitcher"
                                                               checked>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="settings-integrations-item">
                                                <div class="settings-integrations-item-info">
                                                    <img src="assets/images/logos/games/dbd-logo-w.svg" alt="">
                                                    <span>Build, organize, and collaborate on work in one place from virtually anywhere.</span>
                                                </div>
                                                <div class="settings-integrations-item-switcher">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input form-control-md"
                                                               type="checkbox" id="settingsIntegrationTwoSwitcher"
                                                               checked>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="settings-integrations-item">
                                                <div class="settings-integrations-item-info">
                                                    <img src="assets/images/logos/games/minecraft-logo.png" alt="">
                                                    <span>Build, test, and deploy with unlimited private or public space with Bitbucket.</span>
                                                </div>
                                                <div class="settings-integrations-item-switcher">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input form-control-md"
                                                               type="checkbox"
                                                               id="settingsIntegrationThreeSwitcher">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="settings-integrations-item">
                                                <div class="settings-integrations-item-info">
                                                    <img src="../../assets/images/icons/sourcetree.png" alt="">
                                                    <span>A Git GUI that offers a visual representation of your repositories.</span>
                                                </div>
                                                <div class="settings-integrations-item-switcher">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input form-control-md"
                                                               type="checkbox" id="settingsIntegrationFourSwitcher">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade <?php if ($active == "dbd") {
                                echo "show active";
                            } ?>" id="dbd" role="tabpanel"
                                 aria-labelledby="integrations-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row m-t-xxl">
                                            <div class="col-md-12">
                                                <label for="dbd_main" class="form-label">Killer oder Survivor
                                                    Main</label>
                                                <div class="input-group">
                                                    <select class="form-select" aria-label="main-select"
                                                            id="dbd_main" onchange="update('dbd_main')">
                                                        <option <?php if (empty($user["dbd_main"])) {
                                                            echo "selected";
                                                        } ?>>Select Main
                                                        </option>
                                                        <option <?php if ($user["dbd_main"] == "s") {
                                                            echo "selected";
                                                        } ?> value="s">Survivor
                                                        </option>
                                                        <option <?php if ($user["dbd_main"] == "k") {
                                                            echo "selected";
                                                        } ?> value="k">Killer
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-xxl">
                                            <p>Wähle deinen Survivor Main</p>
                                            <div class="row">
                                                <?php

                                                $stmt = $pdo->query("SELECT * FROM dbd_chars WHERE rolle = 'Survivor'");

                                                while ($row = $stmt->fetch()) {
                                                    echo '<div class="col-md-1" style="padding-right: 120px; padding-bottom: 10px;">
                                                    <a href="?feature=survivor_main&value=' . $row["id"] . '&active=dbd"><img class="cover-img ';
                                                    if($user["survivor_main"] == $row["id"]){
                                                        echo 'active';
                                                    }
                                                    echo '" alt="' . $row["name"] . '" src="assets/images/dbd/survivor/portrait/' . $row["pb"] . '.jpg"  width="120px" height="175"></a>
                                                </div>';
                                                }
                                                ?>
                                            </div>
                                            <p style="margin-top: 20px;">Wähle deinen Killer Main</p>
                                            <div class="row">
                                                <?php

                                                $stmt = $pdo->query("SELECT * FROM dbd_chars WHERE rolle = 'Killer'");

                                                while ($row = $stmt->fetch()) {
                                                    echo '<div class="col-md-1" style="padding-right: 120px; padding-bottom: 10px;">
                                                    <a href="?feature=killer_main&value=' . $row["id"] . '&active=dbd"><img class="cover-img ';
                                                    if($user["killer_main"] == $row["id"]){
                                                        echo 'active';
                                                    }
                                                    echo '" alt="' . $row["name"] . '" src="assets/images/dbd/killer/portrait/' . $row["pb"] . '.jpg"  width="120px" height="175"></a>
                                                </div>';
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
            </div>
        </div>
    </div>
</div>
</div>
<?php
include "templates/javascript.html";
?>

<script>
    function update(feature) {
        var x = document.getElementById(feature).value;
        window.location = '/settings.php?feature=' + feature + '&value=' + x + '&active=dbd';
    }
</script>
</body>
</html>
