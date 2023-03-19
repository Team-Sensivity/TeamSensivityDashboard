<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

$error_msg = "";
?>

<html lang="de">

<?php
include "templates/head.html";
?>

<body>
<div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
    <div class="app-auth-background">

    </div>
    <div class="app-auth-container">
        <div class="logo">
            <a href="https://sensivity.team">Team Sensivity</a>
        </div>
        <p class="auth-description">Du hast bereits einen Account?<a href="/login.php"> Zum Login...</a></p>

        <?php
        if (isset($error_msg) && !empty($error_msg)) {
            echo $error_msg;
        }
        ?>
            <div class="auth-credentials m-b-xxl">
                <div class="d-grid gap-2">
                    <a class="btn btn-primary" href="https://discord.com/api/oauth2/authorize?client_id=917069851191816262&redirect_uri=https%3A%2F%2Fdashboard.sensivity.team%2Fconnect%2Fdiscord%2Fregister.php&response_type=code&scope=connections%20identify%20role_connections.write">Account erstellen</a>

                </div>
            </div>
        <div class="divider"></div>
        <div class="auth-alts">
            <a href="https://discord.sensivity.team" class="auth-alts-google"></a>
        </div>
    </div>
</div>
<?php
include "templates/javascript.html";
?>
</body>
</html>