<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

$error_msg = "";

if(isset($_GET["error"])){
    $error_msg = $_GET["error"];
}

if (isset($_POST['email']) && isset($_POST['passwort'])) {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];

    $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email OR discord_username = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();

    //Überprüfung des Passworts
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['id'];

        //Möchte der Nutzer angemeldet beleiben?
        if (isset($_POST['angemeldet_bleiben'])) {
            $identifier = random_string();
            $securitytoken = random_string();

            $insert = $pdo->prepare("INSERT INTO securitytokens (user_id, identifier, securitytoken) VALUES (:user_id, :identifier, :securitytoken)");
            $insert->execute(array('user_id' => $user['id'], 'identifier' => $identifier, 'securitytoken' => sha1($securitytoken)));
            setcookie("identifier", $identifier, time() + (3600 * 24 * 365)); //Valid for 1 year
            setcookie("securitytoken", $securitytoken, time() + (3600 * 24 * 365)); //Valid for 1 year
        }

        header("location: /");
        exit;
    } else {
        $error_msg = "E-Mail oder Passwort war ungültig<br><br>";
    }

}

$email_value = "";
if (isset($_POST['email']))
    $email_value = htmlentities($_POST['email']);
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
            <a href="index.html">Team Sensivity</a>
        </div>
        <p class="auth-description">Du hast noch keinen Account? <a href="/register.php">Registrieren ...</a></p>

        <?php
        if (isset($error_msg) && !empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <form action="login.php" method="post">
            <div class="auth-credentials m-b-xxl">
                <label for="signInEmail" class="form-label">E-Mail</label>
                <input name="email" type="text" class="form-control m-b-md" id="signInEmail"
                       aria-describedby="signInEmail"
                       placeholder="example@sensivity.team">
                <label for="signInEmail" class="form-label">Passwort</label>
                <input name="passwort" type="password" class="form-control m-b-md" id="signInEmail"
                       aria-describedby="signInEmail"
                       placeholder="●●●●●●●●">
            </div>

            <div class="auth-submit">
                <button type="submit" href="#" class="btn btn-primary">Login</button>
                <a href="passwortvergessen.php" class="auth-forgot-password float-end">Passwort vergessen?</a>
            </div>
        </form>
        <div class="divider"></div>
        <div class="auth-alts">
            
<!-- <a href="https://discord.com/api/oauth2/authorize?client_id=917069851191816262&redirect_uri=https%3A%2F%2Fdashboard.sensivity.team%2Fconnect%2Fdiscord%2Fregister.php&response_type=code&scope=connections%20identify%20role_connections.write" class="auth-alts-discord"></a> -->
            <a href="/connect/steam/login-openId.php" class="auth-alts-steam"></a>
            
        </div>
    </div>
</div>
<?php
include "templates/javascript.html";
?>
</body>
</html>