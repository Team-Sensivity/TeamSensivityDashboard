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


</div>
<div class="app-container">
    <?php include "templates/app-header.php"; ?>
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>News Manager</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $stmt = $pdo->query("SELECT * FROM news");
                    while ($row = $stmt->fetch()) {
                        $text = substr($row["text"], 0, 120);
                        echo ' 
                        <div class="col-xl-4">
                        <div class="card">
                            <img src="' . $row["banner"] . '" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">' . $row["titel"] . '</h5>
                                <p class="card-text">' . $text . '</p>
                                <a href="#" class="btn btn-primary">Show News</a>
                                <a href="#" class="btn btn-danger">Remove News</a>
                            </div>
                        </div>
                        </div>';
                    }
                    ?>
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