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
        <p class="auth-description">Benutze den Command <b>/login</b> um dich direkt anzumelden oder <b>/token</b> um
            einen Token zum
            Login zu erhalten.</p>

        <div class="auth-credentials m-b-xxl">
            <label for="signInEmail" class="form-label">Token</label>
            <input type="text" class="form-control m-b-md" id="signInEmail" aria-describedby="signInEmail"
                   placeholder="example@neptune.com">
        </div>

        <div class="auth-submit">
            <button type="submit" href="#" class="btn btn-primary">Login</button>
            <a href="login.php" class="auth-forgot-password float-end">Mit Passwort anmelden</a>
        </div>
        <div class="divider"></div>
        <div class="auth-alts">
            <a href="#" class="auth-alts-google"></a>
            <a href="#" class="auth-alts-facebook"></a>
            <a href="#" class="auth-alts-twitter"></a>
        </div>
    </div>
</div>
<?php
include "templates/javascript.html";
?>
</body>
</html>