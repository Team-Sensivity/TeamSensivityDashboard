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
        <div class="card widget widget-stats">
            <div class="card-body">
                <div class="widget-stats-container d-flex">
                    <div class="widget-stats-icon widget-stats-icon-warning">
                        <i class="material-icons-outlined">payments</i>
                    </div>
                    <div class="widget-stats-content flex-fill">
                        <span class="widget-stats-title">Points</span>
                        <span class="widget-stats-amount"><?php echo $user["points"]; ?></span>
                        <span class="widget-stats-info">0 messages left</span>
                    </div>
                    <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                        <i class="material-icons">keyboard_arrow_up</i> 7%
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>