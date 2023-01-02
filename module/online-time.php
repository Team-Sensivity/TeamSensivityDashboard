<div class="row">
    <div class="col-xl-12">
        <div class="card widget widget-stats-large">
            <div class="row">
                <div class="col-xl-8">
                    <div class="widget-stats-large-chart-container">
                        <div class="card-header">
                            <h5 class="card-title">Online Time<span
                                        class="badge badge-light badge-style-light">Letzte Woche</span>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div id="online"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="widget-stats-large-info-container">
                        <div class="card-header">
                            <h5 class="card-title" align="center">Verknüpfte Accounts
                            </h5>
                        </div>
                        <div class="card-body">
                           
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Discord
                                        <?php
                                            if(isset($user["discord_id"])){
                                                echo '<span class="float-end text-success"><i class="material-icons align-middle">done</i>';
                                            }else {
                                                echo '<span class="float-end text-danger"><i class="material-icons align-middle">close</i>';
                                            }
                                        ?>
                                    </span>
                                </li>
                                <li class="list-group-item">Steam
                                        <?php
                                        if(isset($user["steam_id"])){
                                            echo '<span class="float-end text-success"><i class="material-icons align-middle">done</i>';
                                        }else {
                                            echo '<span class="float-end text-danger"><i class="material-icons align-middle">close</i>';
                                        }
                                        ?>
                                    </span>
                                </li>
                                <li class="list-group-item">Minecraft
                                    <?php
                                    if(isset($user["minecraft_uuid"])){
                                        echo '<span class="float-end text-success"><i class="material-icons align-middle">done</i>';
                                    }else {
                                        echo '<span class="float-end text-danger"><i class="material-icons align-middle">close</i>';
                                    }
                                    ?>
                                    </span>
                                </li>
                                <li class="list-group-item">Riot
                                    <?php
                                    if(isset($user["riot_puuid"])){
                                        echo '<span class="float-end text-success"><i class="material-icons align-middle">done</i>';
                                    }else {
                                        echo '<span class="float-end text-danger"><i class="material-icons align-middle">close</i>';
                                    }
                                    ?>
                                    </span>
                                </li>
                                <li class="list-group-item">X-BOX<span
                                            class="float-end text-danger"><i
                                                class="material-icons align-middle">close</i></span>
                                </li>

                                <li class="list-group-item" align="center">
                                    <a class="btn btn-primary" href="settings.php?active=connect">Accounts verknüpfen</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>