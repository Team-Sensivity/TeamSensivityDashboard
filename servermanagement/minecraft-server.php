<?php
session_start();
require_once("../inc/config.inc.php");
require_once("../inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();
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
        <a href="#" class="content-menu-toggle btn btn-primary"><i class="material-icons">menu</i> content</a>
        <div class="content-menu content-menu-right">
            <ul class="list-unstyled">
                <li><a href="#">Alle Server</a></li>
                <li><a href="./eco-server.php">ECO</a></li>
                <li><a href="./satisfactory-server.php">Satisfactory</a></li>
                <li><a href="./minecraft-server.php" class="active">Minecraft</a></li>
                <li><a href="#">Space</a></li>
                <li class="divider"></li>
                <li><a href="?site=bungee">BungeecordServer</a></li>
                <li><a href="?site=lobby">LobbyServer</a></li>
                <li><a href="?site=foolscraft">FoolsCraftServer</a></li>
                <li><a href="?site=whitelist">Whitelist</a></li>
            </ul>
        </div>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="page-description d-flex align-items-center">
                            <div class="page-description-content flex-grow-1">
                                <h1>Minecraft-Server</h1>
                            </div>

                        </div>
                    </div>
                </div>
                <?php
                    if(isset($_GET["site"])){
                     if($_GET["site"] == "whitelist"){
                         include "inc/satisfactory-whitelist.php";
                     }
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
<script src="../assets/js/pages/datatables.js"></script>
<script src="../assets/plugins/datatables/datatables.min.js"></script>
<script>
    function restartServer(theUrl)
    {
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
        xmlHttp.send( null );
        console.log(xmlHttp.responseText);
        document.getElementById("restart").disabled = true;
        document.getElementById("stop").disabled = true;
        document.getElementById("start").disabled = true;
        setTimeout(function() {document.getElementById("restart").disabled = false;}, 1000 * 60 * 2);
        setTimeout(function() {document.getElementById("stop").disabled = false;}, 1000 * 60 * 2);
        setTimeout(function() {document.getElementById("start").disabled = false;}, 1000 * 60 * 2);
    }
    function stopServer(theUrl)
    {
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
        xmlHttp.send( null );
        console.log(xmlHttp.responseText);
        document.getElementById("stop").disabled = true;
        setTimeout(function() {document.getElementById("start").disabled = false;}, 1000 * 60 * 2);
    }
    function startServer(theUrl)
    {
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open("GET", theUrl, false); // false for synchronous request
        xmlHttp.send( null );
        setTimeout(function() {document.getElementById("stop").disabled = false;}, 1000 * 60 * 2);
        document.getElementById("start").disabled = true;
    }
</script>
</body>
</html>