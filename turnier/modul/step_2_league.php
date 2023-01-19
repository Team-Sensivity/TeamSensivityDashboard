<?php
$filename = basename(__FILE__, '.php');
if (str_contains($_SERVER['SCRIPT_FILENAME'], $filename)) {
    die("Permission denied!!");
}

include "functions.php";

$end = 0;
if (isset($_GET["turniername"]) && !isset($_POST["turniername"])) {
    $_SESSION["providerid"] = getProviderID($RiotAPIKey, $_GET["turniername"]);
} else if (isset($_POST["turniername"]) && isset($_SESSION["providerid"])) {
    $fehler = 0;

    $turniername = $_POST["turniername"];
    $teamsize = filter_var($_POST["teamsize"], FILTER_VALIDATE_INT);
    $picktype = $_POST["picktype"];
    $maptype = $_POST["maptype"];
    $spectype = $_POST["spectype"];
    $date = $_POST["date"];
    $time = $_POST["time"];

    if (!empty($turniername) && !empty($teamsize) && !empty($picktype) && !empty($maptype) && !empty($spectype) && !empty($date) && !empty($time) && !empty($enddate) && !empty($endtime)) {
        if ($teamsize <= 5 && $teamsize >= 1) {
            if ($maptype == "SUMMONERS_RIFT" || $maptype == "TWISTED_TREELINE" || $maptype == "HOWLING_ABYSS") {
                if ($picktype == "BLIND_PICK" || $picktype == "DRAFT_MODE" || $picktype == "ALL_RANDOM" || $picktype == "TOURNAMENT_DRAFT") {
                    if ($spectype == "NONE" || $spectype == "LOBBYONLY" || $spectype == "ALL") {
                        $providerid = $_SESSION["providerid"];
                        $turnierid = createTurnierID($providerid, $turniername, "RGAPI-1bf3cf83-aa92-43cd-8e4b-9bf333063cde");
                        $organisator = $user["discord_username"];
                        
                        $sql = "INSERT INTO league_turnier (turnier_name, team_size, pick_type, map_type, spec_type, provider_id, turnier_id, date, time, end_date, end_time, organisator) VALUES ('$turniername', '$teamsize', '$picktype', '$maptype', '$spectype', '$providerid', '$turnierid', '$date', '$time', '$enddate', '$endtime', '$organisator')";
                        $pdo->exec($sql);
                        $end = 1;
                    } else {
                        $fehler = "Bitte wähle einen richtigen SpectatorMode aus";
                    }
                } else {
                    $fehler = "Bitte wähle einen richtigen PickType aus!";
                }
            } else {
                $fehler = "Bitte wähle eine richtige Map aus!";
            }
        } else {
            $fehler = "Die TeamSize muss zwischen 1 und 5 liegen!";
        }
    } else {
        $fehler = "Bitte alle Felder ausfüllen!";
    }

    if ($fehler != 0) {
        $alert = '<div class="alert alert-danger alert-style-light" role="alert">
                        ' . $fehler . '
                    </div>';
    }
} else {
    $alert = '<div class="alert alert-danger alert-style-light" role="alert">
                        Es ist ein Fehler aufgetreten, bitte erstellen Sie eien neues Turnier!
                    </div>';
}
?>
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
<?php
if ($end == 0) {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">League Of Legends</h5>
                </div>
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <form class="row g-3 needs-validation" action="?step=league" method="post">
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Turniername</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="turniername"
                                           placeholder="Turniername"
                                           required value="<?php echo $_GET["turniername"]; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Deine SummonerID</label>
                                    <input type="text" class="form-control" id="validationCustom02"
                                           value="<?php echo $user['riot_summoner_id']; ?>"
                                           disabled>
                                </div>
                                <div class=" col-md-3">
                                    <label for="validationCustom04" class="form-label">PickType</label>
                                    <select class="form-select" id="validationCustom04" required="" name="picktype">
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
                                <div class="col-md-3">
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
                                    <label for="validationCustom04" class="form-label">SpectatorType</label>
                                    <select class="form-select" id="validationCustom04" required="" name="spectype">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option value="NONE">None</option>
                                        <option value="LOBBY_ONLY">Lobby only</option>
                                        <option value="all">All</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom05" class="form-label">Team size</label>
                                    <input type="number" min="1" max="5" class="form-control" id="validationCustom05"
                                           required="" name="teamsize">
                                    <div class="invalid-feedback">
                                        Please choose a Number between 1 and 5.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom05" class="form-label">Start Datum</label>
                                    <input type="date" class="form-control" id="validationCustom05"
                                           required="" name="date">
                                    <div class="invalid-feedback">
                                        Please select a valid date.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom05" class="form-label">Start Uhrzeit</label>
                                    <input type="time" class="form-control" id="validationCustom05"
                                           required="" name="time">
                                    <div class="invalid-feedback">
                                        Please select a valid time.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom05" class="form-label">End Datum</label>
                                    <input type="date" class="form-control" id="validationCustom05"
                                           required="" name="enddate">
                                    <div class="invalid-feedback">
                                        Please select a valid time.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom05" class="form-label">End Uhrzeit</label>
                                    <input type="time" class="form-control" id="validationCustom05"
                                           required="" name="endtime">
                                    <div class="invalid-feedback">
                                        Please select a valid time.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Weiter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>

    <?php
}
?>
