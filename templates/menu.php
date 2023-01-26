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
                    <a href="/points.php"><i class="material-icons-two-tone">payments</i>PunkteSystem</a>
                </li>
                <li>
                    <a href="/settings.php"><i class="material-icons-two-tone">settings</i>Settings</a>
                </li>

                <li class="sidebar-title">
                    Games
                </li>
                <li>
                    <a href="/games.php"><i class="material-icons-two-tone">sports_esports</i>GameStats</a>
                </li>
                <li>
                    <a href="/games-join.php"><i class="material-icons-two-tone">dns</i>Server beitreten</a>
                </li>
                <li>
                    <a href="/games-join.php"><i class="material-icons-two-tone">emoji_events</i>Turnierübersicht</a>
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

                <li class="sidebar-title hidden-on-pc">
                    
                </li>
                <li class="hidden-on-pc">
                    <a href="https://sensivity.team/impressum.php">Impressum</a>
                </li>
                <li class="hidden-on-pc">
                    <a href="https://sensivity.team/datenschutz.php">Datenschutz</a>
                </li>
                <li class="hidden-on-pc">
                    <a href="https://status.sensivity.team/">Status</a>
                </li>
            </ul>
        </div>