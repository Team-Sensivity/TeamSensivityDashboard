<?php
$filename = basename(__FILE__, '.php');
if (str_contains($_SERVER['SCRIPT_FILENAME'], $filename)) {
    die("Permission denied!!");
}
?>
<style>
    .cover-img img {
        border: 5px solid #27313f;
        border-radius: 10px;
        transition: 0.3s;
    }

    .cover-img img:hover {
        border-color: #4a5d78;
    }
</style>
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
<div class="row">
    <div class="col-md-12">
        <div class="row" align="center">
            <h1>Select Game</h1>
        </div>
        <br>
        <div class="row">
            <div class="col-md-1 cover-img" style="padding-right: 160px;">
                <a data-bs-toggle="modal" data-bs-target="#LeagueOfLegends"><img src="img/lol-cover.jpg"></a>
            </div>
            <div class="col-md-1 cover-img" style="padding-right: 160px;">
                <a data-bs-toggle="modal" data-bs-target="#LeagueOfLegends"><img src="img/dbd-cover.jpg"></a>
            </div>
            <div class="col-md-1 cover-img" style="padding-right: 160px;">
                <a href="#"><img src="img/valorant-cover.jpg"></a>
            </div>
            <div class="col-md-1 cover-img" style="padding-right: 160px;">
                <a href="#"><img src="img/csgo-cover.jpg"></a>
            </div>
            <div class="col-md-1 cover-img" style="padding-right: 160px;">
                <a href="#"><img src="img/apex-cover.jpg"></a>
            </div>
            <div class="col-md-1 cover-img" style="padding-right: 160px;">
                <a href="#"><img src="img/fifa-cover.jpg"></a>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="LeagueOfLegends" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">League Turnier erstellen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="?step=1">
                <div class="modal-body">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Turniername</label>
                        <input type="text" class="form-control" id="validationCustom01" name="turniername_league"
                               placeholder="Turniername"
                               required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Weiter</button>
                </div>
            </form>
        </div>
    </div>
</div>