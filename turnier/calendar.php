<?php
session_start();
require_once("../inc/config.inc.php");
require_once("../inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();
?>

<html lang="de">
<link href="../assets/plugins/fullcalendar/lib/main.min.css" rel="stylesheet">
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#createEvent"
                                        class="btn btn-primary btn-style-light">Create Event
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card calendar-container">
                            <div class="card-body">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="fade modal" id="createEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="row g-3 needs-validation">
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">EventName</label>
                            <input type="text" class="form-control" id="validationCustom01" name="eventname"
                                   placeholder="EventName"
                                   required>
                        </div>
                        <div class=" col-md-6">
                            <label for="validationCustom04" class="form-label">EventType</label>
                            <select class="form-select" id="validationCustom04" required="" name="eventtype">
                                <option selected="" disabled="" value="">Choose...</option>
                                <option value="BLIND_PICK">Turnier</option>
                                <option value="DRAFT_MODE">LanParty</option>
                                <option value="ALL_RANDOM">All Random</option>
                                <option value="TOUNAMENT_DRAFT">Tournament Draft</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
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
                        <div class="col-md-4">
                            <label for="validationCustom04" class="form-label">Color</label>
                            <input type="color" class="form-control" id="validationCustom01" name="color"
                                   required>
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
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var today = new Date();
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialDate: today,
            editable: true,
            height: "100%",
            locale: 'de',
            firstDay: 1,
            selectable: true,
            businessHours: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: [
                <?php
                $stmt = $pdo->query("SELECT * FROM league_turnier");
                while ($row = $stmt->fetch()) {
                    echo " {
                    title: '" . $row['turnier_name'] . " (League of Legends)',
                    start: '" . $row['date'] . "T" . $row['time'] . "',
                    end: '" . $row['end_date'] . "T" . $row['end_time'] . "',
                    color: '#EDB852',
                    url: 'https://turnier.sensivity.team/" . $row['turnier_name'] . "'
                },";
                }
                ?>
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2020-09-28'
                }
            ]
        });

        calendar.render();
    });

</script>
<script src="../assets/plugins/fullcalendar/lib/main.min.js"></script>
</html>