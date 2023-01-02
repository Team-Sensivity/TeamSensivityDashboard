<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
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

<?php
if (isset($_GET["value"]) && isset($_GET["feature"])) {
    $feature = $_GET["feature"];
    $value = $_GET["value"];

    $sql = "UPDATE bot SET $feature='$value'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}

$login_cmd = 0;

$stmt = $pdo->query("SELECT * FROM bot");
while ($row = $stmt->fetch()) {
    $login_cmd = $row["cmd_login_on"];
    $connect_cmd = $row["cmd_connect_on"];
    $swf_cmd = $row["cmd_swf_on"];
    $daily_cmd = $row["cmd_daily_on"];
    $punkte_cmd = $row["cmd_points_cmd"];
    $token_cmd = $row["cmd_token_on"];
    $music_cmd = $row["cmd_music_on"];

    $chill_create = $row["chill_create"];
    $sync_system = $row["syncSystem"];
    $punktesystem = $row["punktesystem"];
}
?>

</div>
<div class="app-container">
    <?php include "templates/app-header.php"; ?>
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>DiscordBot</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Login Command</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-description">Dieser SlashCommand wird benutzt um einen Anmeldelink zu
                                    erstellen.<br><br></p>
                                <div class="example-content">
                                    <div class="input-group mb-3">
                                        <select class="form-select" aria-label="login-command" id="cmd_login_on"
                                                onchange="update('cmd_login_on')">
                                            <option <?php if ($login_cmd == 1) {
                                                echo "selected";
                                            } ?> value="1">Aktiviert
                                            </option>
                                            <option <?php if ($login_cmd == 0) {
                                                echo "selected";
                                            } ?> value="0">Deaktiviert
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Connect Command</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-description">Dieser SlashCommand wird benutzt um den DiscordAccount mit
                                    dem Dashboard zu verknüpfen.</p>
                                <div class="example-content">
                                    <div class="input-group mb-3">
                                        <select class="form-select" aria-label="login-command" id="cmd_connect_on"
                                                onchange="update('cmd_connect_on')">
                                            <option <?php if ($connect_cmd == 1) {
                                                echo "selected";
                                            } ?> value="1">Aktiviert
                                            </option>
                                            <option <?php if ($connect_cmd == 0) {
                                                echo "selected";
                                            } ?> value="0">Deaktiviert
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">SWF Command</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-description">Dieser SlashCommand wird benutzt um eine SWF zu
                                    erstellen.<br><br></p>
                                <div class="example-content">
                                    <div class="input-group mb-3">
                                        <select class="form-select" aria-label="login-command" id="cmd_swf_on"
                                                onchange="update('cmd_swf_on')">
                                            <option <?php if ($swf_cmd == 1) {
                                                echo "selected";
                                            } ?> value="1">Aktiviert
                                            </option>
                                            <option <?php if ($swf_cmd == 0) {
                                                echo "selected";
                                            } ?> value="0">Deaktiviert
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Daily Command</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-description">Das komplette PunkteSystem deaktivieren also keine Punkte
                                    werden mehr gezählt jedoch sind die Commands davon ausgeschlossen.</p>
                                <div class="example-content">
                                    <div class="input-group mb-3">
                                        <select class="form-select" aria-label="login-command" id="cmd_daily_on"
                                                onchange="update('cmd_daily_on')">
                                            <option <?php if ($daily_cmd == 1) {
                                                echo "selected";
                                            } ?> value="1">Aktiviert
                                            </option>
                                            <option <?php if ($daily_cmd == 0) {
                                                echo "selected";
                                            } ?> value="0">Deaktiviert
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Punkte Commands</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-description">Das komplette PunkteSystem deaktivieren also keine Punkte
                                    werden mehr gezählt jedoch sind die Commands davon ausgeschlossen.</p>
                                <div class="example-content">
                                    <div class="input-group mb-3">
                                        <select class="form-select" aria-label="login-command" id="cmd_points_on"
                                                onchange="update('cmd_points_on')">
                                            <option <?php if ($punkte_cmd == 1) {
                                                echo "selected";
                                            } ?> value="1">Aktiviert
                                            </option>
                                            <option <?php if ($punkte_cmd == 0) {
                                                echo "selected";
                                            } ?> value="0">Deaktiviert
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Music Command</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-description">Das komplette PunkteSystem deaktivieren also keine Punkte
                                    werden mehr gezählt jedoch sind die Commands davon ausgeschlossen.</p>
                                <div class="example-content">
                                    <div class="input-group mb-3">
                                        <select class="form-select" aria-label="login-command" id="cmd_music_on"
                                                onchange="update('cmd_music_on')">
                                            <option <?php if ($music_cmd == 1) {
                                                echo "selected";
                                            } ?> value="1">Aktiviert
                                            </option>
                                            <option <?php if ($music_cmd == 0) {
                                                echo "selected";
                                            } ?> value="0">Deaktiviert
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Token Command</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-description">Das komplette PunkteSystem deaktivieren also keine Punkte
                                    werden mehr gezählt jedoch sind die Commands davon ausgeschlossen.</p>
                                <div class="example-content">
                                    <div class="input-group mb-3">
                                        <select class="form-select" aria-label="login-command" id="cmd_token_on"
                                                onchange="update('cmd_token_on')">
                                            <option <?php if ($token_cmd == 1) {
                                                echo "selected";
                                            } ?> value="1">Aktiviert
                                            </option>
                                            <option <?php if ($token_cmd == 0) {
                                                echo "selected";
                                            } ?> value="0">Deaktiviert
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">PunkteSystem</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-description">Das komplette PunkteSystem deaktivieren also keine Punkte
                                    werden mehr gezählt jedoch sind die Commands davon ausgeschlossen.</p>
                                <div class="example-content">
                                    <div class="input-group mb-3">
                                        <select class="form-select" aria-label="login-command" id="punktesystem"
                                                onchange="update('punktesystem')">
                                            <option <?php if ($punktesystem == 1) {
                                                echo "selected";
                                            } ?> value="1">Aktiviert
                                            </option>
                                            <option <?php if ($punktesystem == 0) {
                                                echo "selected";
                                            } ?> value="0">Deaktiviert
                                            </option>
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
<?php
include "templates/javascript.html";
?>
<script>
    function update(feature) {
        var x = document.getElementById(feature).value;
        window.location = '/discord-bot.php?feature=' + feature + '&value=' + x;
    }
</script>
</body>
</html>