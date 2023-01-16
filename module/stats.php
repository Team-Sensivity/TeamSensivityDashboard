<div class="row">
    <div class="col-xl-4">
        <div class="card widget widget-stats">
            <div class="card-body">
                <div class="widget-stats-container d-flex">
                    <div class="widget-stats-icon widget-stats-icon-primary">
                        <i class="material-icons-outlined">schedule</i>
                    </div>
                    <div class="widget-stats-content flex-fill">
                        <span class="widget-stats-title">Onlinetime</span>

                        <?php
                        $last = getLastMonth($user["discord_id"]);
                        $now = getLatestGesamt($user["discord_id"]);
                        $thismonth = getNowMonth($user["discord_id"]);
                        $diff = 0;
                        $var = "";

                        if ($last < $thismonth) {
                            $diff = ($thismonth - $last) / $thismonth * 100;

                            $var = ' <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                        <i class="material-icons">keyboard_arrow_up</i> ' . intval($diff) . '%
                    </div>';
                        } else {
                            $diff = -(($last - $thismonth) / $last * 100);
                            $var = '<div class="widget-stats-indicator widget-stats-indicator-negative align-self-start">
                        <i class="material-icons">keyboard_arrow_down</i> ' . intval($diff) . '%
                    </div>';
                        }
                        ?>
                        <span class="widget-stats-amount"><?php echo $now; ?> min</span>
                        <span class="widget-stats-info"> <?php echo $last; ?> min last month</span>
                    </div>
                    <?php echo $var; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="card widget widget-stats">
            <div class="card-body">
                <div class="widget-stats-container d-flex">
                    <div class="widget-stats-icon widget-stats-icon-success">
                        <i class="material-icons-outlined">emoji_events</i>
                    </div>
                    <div class="widget-stats-content flex-fill">
                        <span class="widget-stats-title">Level</span>
                        <span class="widget-stats-amount">0 XP / 100 XP</span>
                    </div>
                </div>
                <div class="widget-stats-progress">
                    <div class="progress m-b-sm">
                        <div class="progress-bar" role="progressbar" style="width: 67%;"
                             aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card widget widget-stats" >
            <div class="card-body">
                <div class="widget-stats-container d-flex" style="margin-top: 20px;">
                    <div class="widget-stats-icon widget-stats-icon-warning">
                        <i class="material-icons-outlined">payments</i>
                    </div>
                    <div class="widget-stats-content flex-fill">
                        <span class="widget-stats-title">Points</span>
                        <span class="widget-stats-amount"><?php echo $user["points"]; ?></span>
                    </div>
                </div>
                <div class="widget-stats-chart">
                    <div id="widget-stats-chart1" style="margin-bottom: 10px;"></div>
                </div>
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
    <div class="col-xl-4">
        <div class="card widget">
            <div class="card-header">
                <h5 class="card-title">Link für dein Profil</h5>
            </div>
            <div class="card-body">
                <div class="input-group">
                    <input disabled type="text" id="copy" class="form-control form-control-solid-bordered"
                           value="https://sensivity.team/<?php echo $user["website_url"]; ?>"
                           aria-label="https://sensivity.team/<?php echo $user["website_url"]; ?>"
                           aria-describedby="share-link1">
                    <button class="btn btn-primary" type="button" onclick="copy()"><i
                                class="material-icons no-m fs-5">content_copy</i></button>
                </div>
            </div>
        </div>
        <div class="card widget">
            <div class="card-body" style="margin-top: 15px;">

            </div>
        </div>
    </div>
</div>

<script>
    function copy() {
        // Get the text field
        var copyText = document.getElementById("copy");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

    }
</script>