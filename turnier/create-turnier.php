<?php
session_start();
require_once("../inc/config.inc.php");
require_once("../inc/functions.inc.php");

$user = check_user();
$alert = "";

if (isset($_POST["turniername_league"])) {
    $exist = 0;
    $turniername = $_POST["turniername_league"];
    $stmt = $pdo->query("SELECT * FROM league_turnier");
    while ($row = $stmt->fetch()) {
        if ($row["turnier_name"] == $turniername) {
            $exist = 1;
        }
    }

    if ($exist == 0) {
        header("Location: ./create-turnier.php?step=league&turniername=" . $_POST["turniername_league"]);
    } else {
        $alert = '<div class="alert alert-danger alert-style-light" role="alert">
                        Der Turniername ist schon vergeben!
                    </div>';
    }
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
                            <h1>Turnier erstellen</h1>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_GET["step"])) {
                    if ($_GET["step"] == 1) {
                        include "modul/step_1.php";
                    } else if ($_GET["step"] == "league") {
                        include "modul/step_2_league.php";
                    } else if ($_GET["step"] == "league_end") {
                        echo "lol";
                    } else {
                        include "modul/step_1.php";
                    }
                } else {
                    include "modul/step_1.php";
                }
                ?>
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