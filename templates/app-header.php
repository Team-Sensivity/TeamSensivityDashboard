<div class="search">
    <form action="/search.php" method="post">
        <input class="form-control" type="text" placeholder="Type here..." aria-label="Search" name="search">
    </form>
    <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
</div>
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<div class="app-header">
    <nav class="navbar navbar-light navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-nav" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                    </li>
                    <li class="nav-item dropdown hidden-on-mobile">
                        <a class="nav-link dropdown-toggle" href="#" id="addDropdownLink" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="material-icons">add</i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="addDropdownLink">
                            <li><a class="dropdown-item" href="#">Neues Ticket</a></li>
                            <li><a class="dropdown-item" href="#">New Board</a></li>
                            <li><a class="dropdown-item" href="#">Create Project</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown hidden-on-mobile">
                        <a class="nav-link dropdown-toggle" href="#" id="exploreDropdownLink" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="material-icons-outlined">campaign</i>
                        </a>
                        <ul class="dropdown-menu dropdown-lg large-items-menu"
                            aria-labelledby="exploreDropdownLink">
                            <li>
                                <h6 class="dropdown-header">Neuigkeiten</h6>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <h5 class="dropdown-item-title">
                                        Neptune iOS
                                        <span class="badge badge-warning">1.0.2</span>
                                        <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                    </h5>
                                    <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <h5 class="dropdown-item-title">
                                        Neptune Android
                                        <span class="badge badge-info">dev</span>
                                        <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                    </h5>
                                    <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                </a>
                            </li>
                            <li class="dropdown-btn-item d-grid">
                                <button class="btn btn-primary">Alle Neuigkeiten</button>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
            <div class="d-flex">
                <ul class="navbar-nav">
                    <li class="nav-item hidden-on-mobile">
                        <a class="nav-link" href="https://sensivity.team">Homepage</a>
                    </li>
                    <li class="nav-item hidden-on-mobile">
                        <a class="nav-link <?php if (!str_contains($_SERVER['SCRIPT_FILENAME'], "turnier")) {
                            echo "active";
                        } ?>" href="https://dashboard.sensivity.team">Dashboard</a>
                    </li>
                    <li class="nav-item hidden-on-mobile">
                        <a class="nav-link <?php if (str_contains($_SERVER['SCRIPT_FILENAME'], "turnier")) {
                            echo "active";
                        } ?>" href="https://turnier.sensivity.team">TurnierSystem</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link toggle-search" href="#"><i class="material-icons">search</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout.php"><i class="material-icons">logout</i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
