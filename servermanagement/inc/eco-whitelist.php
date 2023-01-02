<?php
$filename = basename(__FILE__, '.php');
if (str_contains($_SERVER['SCRIPT_FILENAME'], $filename)) {
    die("Permission denied!!");
}
?>

<?php
    if(isset($_GET["action"]) && isset($_GET["id"])){
        if($_GET["action"] == "active"){
            $sql = "UPDATE eco_server SET genehmigt='1' WHERE id=".$_GET["id"];
            // Prepare statement
            $stmt = $pdo->prepare($sql);
            // execute the query
            $stmt->execute();
        }else {
            $sql = "UPDATE eco_server SET genehmigt='0' WHERE id=".$_GET["id"];
            // Prepare statement
            $stmt = $pdo->prepare($sql);
            // execute the query
            $stmt->execute();
        }
    }
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Alle User</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr align="center">
                        <th scope="col">Username</th>
                        <th scope="col">SteamID</th>
                        <th scope="col">Datum</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM eco_server");
                    while ($row = $stmt->fetch()) {

                        if($row["genehmigt"] == 0){
                            $bat = '<a href="?site=whitelist&action=active&id='.$row["id"].'"><span class="badge badge-style-light rounded-pill badge-danger">Ausstehend</span></a>';
                        }else {
                            $bat = '<a href="?site=whitelist&action=inactive&id='.$row["id"].'"><span class="badge badge-style-light rounded-pill badge-success">Genehmigt</span></a>';
                        }

                        $us = getUsers($row["user_id"]);

                        echo '<tr align="center">
                                        <td>'.$us[0].'</td>
                                        <td>'.$us[1].'</td>
                                        <td>' . date_format(date_create($row["datum"]), "d.m.Y") . '</td>
                                        <td>'.$bat.'</td>
                                    </tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
