<?php
session_start();
require_once("../inc/config.inc.php");
require_once("../inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();

if (isset($_GET["delete"]) && isset($_GET["game"])) {
    $delete = $_GET["delete"];
    $game = $_GET["game"];

    if ($game == "lol") {
        $sql = "DELETE FROM league_turnier WHERE id=$delete";

        // use exec() because no results are returned
        $pdo->exec($sql);
    }
}
?>

<html lang="de">
<link href="../assets/plugins/datatables/datatables.min.css" rel="stylesheet">
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
                            <h1>Bearbeite Turnier</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Alle Turniere</h5>
                            </div>
                            <div class="card-body">
                                <table id="datatable1" class="display" style="width:100%">
                                    <thead>
                                    <tr align="center">
                                        <th>Name</th>
                                        <th>Organisator</th>
                                        <th>Game</th>
                                        <th>Start date</th>
                                        <th>Start time</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $stmt = $pdo->query("SELECT * FROM league_turnier");
                                    while ($row = $stmt->fetch()) {
                                        echo '<tr align="center">
                                        <td>' . $row["turnier_name"] . '</td>
                                        <td>' . $row["organisator"] . '</td>
                                        <td>League of Legends</td>
                                        <td>' . date_format(date_create($row["date"]), "d.m.Y") . '</td>
                                        <td>' . date_format(date_create($row["time"]), "H:i") . '</td>
                                        <td><a href="#"><i class="material-icons" style="margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#edit">edit</i></a><a href="https://turnier.sensivity.team/' . $row["turnier_name"] . '"><i class="material-icons" style="margin-right: 5px;">visibility</i></a><a href="?delete=' . $row["id"] . '&game=lol"><i
                                                    class="material-icons">delete_outline</i></td>
                                    </tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="fade modal" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Turnier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="row g-3 needs-validation">
                        <div class=" col-md-4">
                            <label for="validationCustom04" class="form-label">Sichtbar für</label>
                            <select class="form-select" id="validationCustom04" required="" name="permission">
                                <option selected="" disabled="" value="">Choose...</option>
                                <option value="BLIND_PICK">Blind Pick</option>
                                <option value="DRAFT_MODE">Draft Mode</option>
                                <option value="ALL_RANDOM">All Random</option>
                                <option value="TOUNAMENT_DRAFT">Tournament Draft</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom04" class="form-label">Map</label>
                            <select class="form-select" id="validationCustom04" required="" name="maptype">
                                <option selected="" disabled="" value="">Choose...</option>
                                <option value="SUMMONERS_RIFT">Summoners Rift</option>
                                <option value="TWISTED_TREELINE">Twsisted Treeline</option>
                                <option value="HOWLING_ABYSS">Howling Abyss</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label">Start Datum</label>
                            <input type="date" class="form-control" id="validationCustom05"
                                   required="" name="date">
                            <div class="invalid-feedback">
                                Please select a valid date.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label">End Datum</label>
                            <input type="date" class="form-control" id="validationCustom05"
                                   required="" name="date">
                            <div class="invalid-feedback">
                                Please select a valid date.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label">Start Uhrzeit</label>
                            <input type="time" class="form-control" id="validationCustom05"
                                   required="" name="time">
                            <div class="invalid-feedback">
                                Please select a valid time.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label">End Uhrzeit</label>
                            <input type="time" class="form-control" id="validationCustom05"
                                   required="" name="time">
                            <div class="invalid-feedback">
                                Please select a valid time.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include "../templates/javascript.html";
?>
<script src="../assets/js/pages/datatables.js"></script>
<script src="../assets/plugins/datatables/datatables.min.js"></script>
</body>
</html>