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
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <?php
                include "module/stats.php";
                ?>
                <?php
                include "module/online-time.php";
                ?>
                <div class="row">
                    <?php
                    include "module/achievement.php";
                    ?>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <img src="../../assets/images/widgets/blog5.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">The M1 Macbook Pro is Blazing Fast</h5>
                                <p class="card-text">Pellentesque habitant morbi tristique senectus et. Curabitur
                                    molestie in tellus sed porttitor. Etiam eget erat erat. Nullam auctor a justo
                                    lacinia varius.</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Small chip. Giant leap.</li>
                                <li class="list-group-item">Creates beauty like a beast.</li>
                                <li class="list-group-item">Make connections. Faster than ever.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-warning">
                                        <i class="material-icons-outlined">task_alt</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Tasks Completed</span>
                                        <span class="widget-stats-amount">1,871</span>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        <i class="material-icons">keyboard_arrow_down</i> 18%
                                    </div>
                                </div>
                                <div class="widget-stats-chart">
                                    <div id="widget-stats-chart1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-danger">
                                        <i class="material-icons-outlined">star_border_purple500</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Engagement</span>
                                        <span class="widget-stats-amount">45,661</span>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        <i class="material-icons">keyboard_arrow_up</i> 25%
                                    </div>
                                </div>
                                <div class="widget-stats-chart">
                                    <div id="widget-stats-chart2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-primary">
                                        <i class="material-icons-outlined">account_balance_wallet</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Balance</span>
                                        <span class="widget-stats-amount">$218,655</span>
                                    </div>
                                    <div class="widget-stats-indicator align-self-start">
                                        <i class="material-icons">keyboard_arrow_down</i> 9%
                                    </div>
                                </div>
                                <div class="widget-stats-chart">
                                    <div id="widget-stats-chart3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card widget widget-popular-blog">
                            <div class="card-body">
                                <div class="widget-popular-blog-container">
                                    <div class="widget-popular-blog-image">
                                        <img src="../../assets/images/widgets/product2.jpeg" alt="">
                                    </div>
                                    <div class="widget-popular-blog-content ps-4">
                                                <span class="widget-popular-blog-title">
                                                    Quisque congue risus sit amet pellentesque fermentum
                                                </span>
                                        <span class="widget-popular-blog-text">
                                                    Morbi blandit, mi at lacinia ornare, turpis justo viverra risus, at tristique tortor massa ut arcu. Suspendisse potenti. Suspendisse cursus aliquam dictum. Curabitur nec fringilla orci. Vivamus ut viverra elit. Pellentesque id interdum odio. Fusce finibus maximus egestas.
                                                </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                        <span class="widget-popular-blog-date">
                                            Date: 6:38 PM
                                        </span>
                                <a href="#" class="btn btn-primary float-end">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php
                    include "templates/footer.html";
                ?>
            </div>
        </div>
    </div>
</div>
</div>


<!-- First modal dialog -->
<div class="modal show" id="modal" aria-hidden="true" aria-labelledby="..." tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Accounts verknüpfen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Um alle funktionen des Dashboards nutzen zu können verknüpfe deine GameAccounts mit dem Dashboard. </h4>
            </div>
            <div class="modal-footer">
                <!-- Toogle to second dialog -->
                <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <a class="btn btn-primary" href="settings.php?active=connect">Accounts verknüpfen ...</a>
            </div>
        </div>
    </div>
</div>
<!-- Second modal dialog -->
<div class="modal fade" id="modal2" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            ...
            <div class="modal-footer">
                <!-- Toogle to first dialog, `data-bs-dismiss` attribute can be omitted - clicking on link will close dialog anyway -->
                <a class="btn btn-primary" href="#modal" data-bs-toggle="modal" role="button">Open #modal</a>
            </div>
        </div>
    </div>
</div>

<?php
include "templates/javascript.html";
?>

<?php
if($user["modal"] == 0){
    echo "
    <script>
    $(window).on('load', function() {
        $('#modal').modal('show');
    });
</script>
    ";
}

if(date("N", strtotime("now")) == 1){
    $montag = "now";
    $montag1 = "-7 day";
    $dienstag = "+1 day";
    $dienstag1 = "-6 day";
    $mittwoch = "+2 day";
    $mittwoch1 = "-5 day";
    $donnerstag = "+3 day";
    $donnerstag1 = "-4 day";
    $freitag = "+4 day";
    $freitag1 = "-3 day";
    $samstag = "+5 day";
    $samstag1 = "-2 day";
    $sonntag = "+6 day";
    $sonntag1 = "-1 day";
}else if(date("N", strtotime("now")) == 2){
    $montag = "-1 day";
    $montag1 = "-8 day";
    $dienstag = "now";
    $dienstag1 = "-7 day";
    $mittwoch = "+1 day";
    $mittwoch1 = "-6 day";
    $donnerstag = "+2 day";
    $donnerstag1 = "-5 day";
    $freitag = "+3 day";
    $freitag1 = "-4 day";
    $samstag = "+4 day";
    $samstag1 = "-3 day";
    $sonntag = "+5 day";
    $sonntag1 = "-2 day";
}else if(date("N", strtotime("now")) == 3){
    $montag = "-2 day";
    $montag1 = "-9 day";
    $dienstag = "-1 day";
    $dienstag1 = "-8 day";
    $mittwoch = "now";
    $mittwoch1 = "-7 day";
    $donnerstag = "+1 day";
    $donnerstag1 = "-6 day";
    $freitag = "+2 day";
    $freitag1 = "-5 day";
    $samstag = "+3 day";
    $samstag1 = "-4 day";
    $sonntag = "+4 day";
    $sonntag1 = "-3 day";
}else if(date("N", strtotime("now")) == 4){
    $montag = "-3 day";
    $montag1 = "-10 day";
    $dienstag = "-2 day";
    $dienstag1 = "-9 day";
    $mittwoch = "-1 day";
    $mittwoch1 = "-8 day";
    $donnerstag = "now";
    $donnerstag1 = "-7 day";
    $freitag = "+1 day";
    $freitag1 = "-6 day";
    $samstag = "+2 day";
    $samstag1 = "-5 day";
    $sonntag = "+3 day";
    $sonntag1 = "-4 day";
}else if(date("N", strtotime("now")) == 5){
    $montag = "-4 day";
    $montag1 = "-11 day";
    $dienstag = "-3 day";
    $dienstag1 = "-10 day";
    $mittwoch = "-2 day";
    $mittwoch1 = "-9 day";
    $donnerstag = "-1 day";
    $donnerstag1 = "-8 day";
    $freitag = "now";
    $freitag1 = "-7 day";
    $samstag = "+1 day";
    $samstag1 = "-6 day";
    $sonntag = "+2 day";
    $sonntag1 = "-5 day";
}else if(date("N", strtotime("now")) == 6){
    $montag = "-5 day";
    $montag1 = "-12 day";
    $dienstag = "-4 day";
    $dienstag1 = "-11 day";
    $mittwoch = "-3 day";
    $mittwoch1 = "-10 day";
    $donnerstag = "-2 day";
    $donnerstag1 = "-9 day";
    $freitag = "-1 day";
    $freitag1 = "-8 day";
    $samstag = "now";
    $samstag1 = "-7 day";
    $sonntag = "+1 day";
    $sonntag1 = "-6 day";
}else if(date("N", strtotime("now")) == 7){
    $montag = "-6 day";
    $montag1 = "-13 day";
    $dienstag = "-5 day";
    $dienstag1 = "-12 day";
    $mittwoch = "-4 day";
    $mittwoch1 = "-11 day";
    $donnerstag = "-3 day";
    $donnerstag1 = "-10 day";
    $freitag = "-2 day";
    $freitag1 = "-9 day";
    $samstag = "-1 day";
    $samstag1 = "-8 day";
    $sonntag = "now";
    $sonntag1 = "-7 day";
}
?>
<script>
    var options1 = {
        chart: {
            height: 350,
            type: 'bar',
            toolbar: {
                show: false
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded',
                borderRadius: 10
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [{
            name: 'Diese Woche',
            data: [<?php echo getDayMinutes($user["discord_id"], $montag) ?>, <?php echo getDayMinutes($user["discord_id"], $dienstag) ?>, <?php echo getDayMinutes($user["discord_id"], $mittwoch) ?>, <?php echo getDayMinutes($user["discord_id"], $donnerstag) ?>, <?php echo getDayMinutes($user["discord_id"], $freitag) ?>, <?php echo getDayMinutes($user["discord_id"], $samstag) ?>, <?php echo getDayMinutes($user["discord_id"], $sonntag) ?>]
        }, {
            name: 'Letzte Woche',
            data: [<?php echo getDayMinutes($user["discord_id"], $montag1) ?>, <?php echo getDayMinutes($user["discord_id"], $dienstag1) ?>, <?php echo getDayMinutes($user["discord_id"], $mittwoch1) ?>, <?php echo getDayMinutes($user["discord_id"], $donnerstag1) ?>, <?php echo getDayMinutes($user["discord_id"], $freitag1) ?>, <?php echo getDayMinutes($user["discord_id"], $samstag1) ?>, <?php echo getDayMinutes($user["discord_id"], $sonntag1) ?>]
        }, {
            name: 'Minecraft',
            data: [35, 41, 36, 26, 45, 48, 52]
        }],
        xaxis: {
            categories: ['MO', 'DI', 'MI', 'DO', 'FR', 'SA', 'SO'],
            labels: {
                style: {
                    colors: 'rgba(94, 96, 110, .5)'
                }
            }
        },
        yaxis: {
            title: {
                text: 'Zeit in Minuten'
            }
        },
        fill: {
            opacity: 1

        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " Minuten"
                }
            }
        },
        grid: {
            borderColor: '#e2e6e9',
            strokeDashArray: 4
        }
    }
    var chart1 = new ApexCharts(
        document.querySelector("#online"),
        options1
    );

    chart1.render();

    var options2 = {
        chart: {
            id: 'sparkline1',
            type: 'area',
            height: 80,
            sparkline: {
                enabled: true
            },
        },
        stroke: {
            curve: 'smooth'
        },
        fill: {
            opacity: 1,
        },
        series: [{
            name: 'Punkte erhalten',
            data: [<?php $stmt = $pdo->query("SELECT * FROM online ORDER BY firstDate DESC");
            $min = 0;
                while ($row = $stmt->fetch()) {
                    if($row["discord_Id"] == $user["discord_id"]){
                        if($min < $row["minuten"]) {
                            $min = $row["minuten"];
                        }

                        echo $row["minuten"].',';
                    }
                }
                ?>]
        }],
        labels: [1, 2, 3],
        yaxis: {
            min: 0,
            max: <?php echo $min + 100; ?>
        },
        colors: ['#FFDDB8']
    }

    var chart2 = new ApexCharts(document.querySelector("#widget-stats-chart1"), options2);
    chart2.render();
</script>
</body>
</html>