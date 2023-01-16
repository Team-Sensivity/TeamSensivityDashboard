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
                            <h1>PunkteSystem</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Punkteverlauf</h5>
                            </div>
                            <div class="card-body">
                                <div id="apex2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <?php
                        $stmt = $pdo->query("SELECT * FROM points");

                        while ($row = $stmt->fetch()) {
                            if($row["discord_id"] == $user["discord_id"]){
                                echo '<div class="alert alert-custom" role="alert">';

                                if($row["type"] == 0){
                                    echo '<div class="custom-alert-icon icon-danger"><i
                                    class="material-icons-outlined">keyboard_arrow_down</i></div>';
                                }else {
                                    echo '<div class="custom-alert-icon icon-success"><i
                                    class="material-icons-outlined">keyboard_arrow_up</i></div>';
                                }

                        echo '<div class="alert-content">
                            <span class="alert-title">'.$row["points"].' Punkte';


                                if($row["type"] == 0){
                                    echo " ausgegeben";
                                }else {
                                    echo " erhalten";
                                }

                            echo '<span style="float:right;" class="badge badge-style-bordered badge-info">'.date("d.m.Y, H:i", strtotime($row["datum"])).'</span></span>
                            <span class="alert-text">'.$row["grund"].'</span>
                     
                        </div>
                    </div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php
include "templates/javascript.html";
?>

<script>
    var options2 = {
        chart: {
            height: 350,
            type: 'area',
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        series: [ {
            name: 'Punkte erhalten',
            data: [<?php $stmt = $pdo->query("SELECT * FROM online ORDER BY firstDate DESC");
                while ($row = $stmt->fetch()) {
                    if($row["discord_Id"] == $user["discord_id"]){
                        echo $row["minuten"].',';
                    }
                }
                ?>]
        }],

        xaxis: {
            type: 'datetime',
            categories: [<?php $stmt = $pdo->query("SELECT * FROM online ORDER BY firstDate DESC");
                while ($row = $stmt->fetch()) {
                   if($row["discord_Id"] == $user["discord_id"]){
                      echo '"'.$row["firstDate"].'",';
                   }
                }
                ?>],
            labels: {
                style: {
                    colors: 'rgba(94, 96, 110, .5)'
                }
            }
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        },
        grid: {
            borderColor: 'rgba(94, 96, 110, .5)',
            strokeDashArray: 4
        },
        markers: {
            size: 0,
            colors: undefined,
            strokeColors: '#fff',
            strokeWidth: 2,
            strokeOpacity: 0.9,
            strokeDashArray: 0,
            fillOpacity: 1,
            discrete: [],
            shape: "circle",
            radius: 2,
            offsetX: 0,
            offsetY: 0,
            onClick: undefined,
            onDblClick: undefined,
            showNullDataPoints: true,
            hover: {
                size: undefined,
                sizeOffset: 3
            }
        }
    }

    var chart2 = new ApexCharts(
        document.querySelector("#apex2"),
        options2
    );

    chart2.render();
</script>
</body>
</html>