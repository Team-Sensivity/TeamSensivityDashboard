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
                <div class="row">
                    <?php
                    include "module/achievement.php";
                    ?>
                </div>
                <?php
                include "module/online-time.php";
                ?>
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
                    <div class="col-xl-4">
                        <div class="card widget">
                            <div class="card-header">
                                <h5 class="card-title">Share this Link</h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted d-block">This link will be opened in a new window</p>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-solid-bordered"
                                           value="https://themeforest.net/user/stacks/portfolio"
                                           aria-label="https://themeforest.net/user/stacks/portfolio"
                                           aria-describedby="share-link1">
                                    <button class="btn btn-primary" type="button" id="share-link1"><i
                                                class="material-icons no-m fs-5">content_copy</i></button>
                                </div>
                            </div>
                        </div>
                        <div class="card widget widget-info">
                            <div class="card-body">
                                <div class="widget-info-container">
                                    <div class="widget-info-image"
                                         style="background: url('../../assets/images/widgets/security.svg')"></div>
                                    <h5 class="widget-info-title">Advanced Security</h5>
                                    <p class="widget-info-text m-t-n-xs">Nunc cursus tempor sapien, et mattis libero
                                        dapibus ut. Ut a ante sit amet arcu imperdiet accumsan.</p>
                                    <a href="#" class="btn btn-primary widget-info-action">Upgrade Now</a>
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
                    <div class="col-xl-4">
                        <div class="card widget widget-connection-request">
                            <div class="card-header">
                                <h5 class="card-title">Connection Request<span
                                            class="badge badge-secondary badge-style-light">17 min ago</span></h5>
                            </div>
                            <div class="card-body">
                                <div class="widget-connection-request-container d-flex">
                                    <div class="widget-connection-request-avatar">
                                        <div class="avatar avatar-xl m-r-xs">
                                            <img src="../../assets/images/avatars/avatar.png" alt="">
                                        </div>
                                    </div>
                                    <div class="widget-connection-request-info flex-grow-1">
                                                <span class="widget-connection-request-info-name">
                                                    Woodrow Hawkins
                                                </span>
                                        <span class="widget-connection-request-info-count">
                                                    45 mutual connections
                                                </span>
                                        <span class="widget-connection-request-info-about">
                                                    Senior Go Developer at Google
                                                </span>
                                    </div>
                                </div>
                                <div class="widget-connection-request-actions d-flex">
                                    <a href="#" class="btn btn-primary btn-style-light flex-grow-1 m-r-xxs"><i
                                                class="material-icons">done</i>Accept</a>
                                    <a href="#" class="btn btn-danger btn-style-light flex-grow-1 m-l-xxs"><i
                                                class="material-icons">close</i>Ignore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            data: [44, 55, 57, 56, 61, 58, 63]
        }, {
            name: 'Letzte Woche',
            data: [76, 85, 101, 98, 87, 105, 91]
        }, {
            name: 'Durchschnitt',
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
</script>
</body>
</html>