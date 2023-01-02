<?php
$filename = basename(__FILE__, '.php');
if (str_contains($_SERVER['SCRIPT_FILENAME'], $filename)) {
    die("Permission denied!!");
}
?>
<div class="app align-content-stretch d-flex flex-wrap">
    <div class="app-sidebar">
        <div class="logo">
            <a href="index.html" class="logo-icon"><span class="logo-text">TeamSensivity</span></a>
            <div class="sidebar-user-switcher user-activity-online">
                <a href="#">
                    <img src="<?php echo $user['discord_pb']; ?>">
                    <span class="activity-indicator"></span>
                    <span class="user-info-text"><?php echo $user['discord_username']; ?><br><span
                                class="user-state-info">ONLINE</span></span>
                </a>
            </div>
        </div>
        <div class="app-menu">
            <ul class="accordion-menu">
                <li class="sidebar-title">
                    Apps
                </li>
                <li class="active-page">
                    <a href="/" class="active"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
                </li>
                <li>
                    <a href="mailbox.html"><i class="material-icons-two-tone">inbox</i>Mailbox<span
                                class="badge rounded-pill badge-danger float-end">87</span></a>
                </li>
                <li>
                    <a href="file-manager.html"><i class="material-icons-two-tone">military_tech</i>Achievements</a>
                </li>
                <li>
                    <a href="calendar.html"><i class="material-icons-two-tone">calendar_today</i>Calendar<span
                                class="badge rounded-pill badge-success float-end">14</span></a>
                </li>
                <li>
                    <a href="/settings.php"><i class="material-icons-two-tone">settings</i>Settings</a>
                </li>

                <li class="sidebar-title">
                    Games
                </li>
                <li>
                    <a href="#"><i class="material-icons-two-tone">color_lens</i>League of Legends<i
                                class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="styles-typography.html">GameStats</a>
                        </li>
                        <li>
                            <a href="styles-code.html">TurnierSystem</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="material-icons-two-tone">color_lens</i>Teamfight Tactics<i
                                class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="styles-typography.html">GameStats</a>
                        </li>
                        <li>
                            <a href="styles-code.html">TurnierSystem</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="material-icons-two-tone">color_lens</i>Valorant<i
                                class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="styles-typography.html">GameStats</a>
                        </li>
                        <li>
                            <a href="styles-code.html">TurnierSystem</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="material-icons-two-tone">phishing</i>Dead by Daylight<i
                                class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/dbd-stats.php">GameStats</a>
                        </li>
                        <li>
                            <a href="tables-datatable.html">TurnierSystem</a>
                        </li>
                        <li>
                            <a href="tables-datatable.html">ShrineOfSecrets</a>
                        </li>
                        <li>
                            <a href="tables-datatable.html">Find a SWF</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href=""><i class="material-icons-two-tone">view_in_ar</i>Minecraft<i
                                class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="ui-alerts.html">ServerStats</a>
                        </li>
                        <li>
                            <a href="ui-avatars.html">Server beitreten</a>
                        </li>
                    </ul>
                </li>
                </li>
                <li>
                    <a href=""><i class="material-icons-two-tone">factory</i>Satisfactory<i
                                class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="ui-avatars.html">Server beitreten</a>
                        </li>
                    </ul>
                </li>
                </li>
                <li>
                    <a href=""><i class="material-icons-two-tone">public</i>ECO<i
                                class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="ui-alerts.html">ServerStats</a>
                        </li>
                        <li>
                            <a href="ui-avatars.html">Server beitreten</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">
                    Administration
                </li>
                <li>
                    <a href="#"><i class="material-icons-two-tone">emoji_events</i>TurnierSystem<i
                                class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/turnier/create-turnier.php?step=1">Turnier erstellen</a>
                        </li>
                        <li>
                            <a href="/turnier/bearbeite-turnier.php">Turnier bearbeiten</a>
                        </li>
                        <li>
                            <a href="content-left-menu.html">Turnier starten</a>
                        </li>
                        <li>
                            <a href="/turnier/calendar.php">Turnierkalender</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/news-manager.php"><i class="material-icons-two-tone">local_police</i>News Manager</a>
                </li>
                <li>
                    <a href="#"><i class="material-icons-two-tone">discord</i>Discord Bot<i
                                class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/discord-bot.php">Feature Verwaltung</a>
                        </li>
                        <li>
                            <a href="content-section-headings.html">Mitteilungen versenden</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="material-icons-two-tone">language</i>Website<i
                                class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/website-einstellungen.php">Website Verwaltung</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">
                    Servermanager
                </li>
                <li>
                    <a href="/servermanagement/eco-server.php"><i class="material-icons-two-tone">public</i>Eco
                        Server</a>
                </li>
                <li>
                    <a href="/servermanagement/satisfactory-server.php"><i class="material-icons-two-tone">factory</i>Satisfactorty
                        Server</a>
                </li>
                <li>
                    <a href="/servermanagement/minecraft-server.php"><i class="material-icons-two-tone">view_in_ar</i>Minecraft
                        Server</a>
                </li>
            </ul>
        </div>