<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link <?= url_is(BASE_URL_SEGMENT . "/dashboard") ? "active" : ""; ?>" href="<?= DASHBOARD_URL ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>


                            <div class="sb-sidenav-menu-heading">Survey Manager</div>


                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Surveys
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse  <?= url_is(BASE_URL_SEGMENT . "/dashboard/survey") || url_is(BASE_URL_SEGMENT . "/dashboard/survey/create.php") ? "show" : "" ?>" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?= url_is(BASE_URL_SEGMENT . "/dashboard/survey") ? "active" : "" ?>" href="<?= DASHBOARD_URL . "/survey/" ?>">All Surveys</a>
                                    <a class="nav-link <?= url_is(BASE_URL_SEGMENT . "/dashboard/survey/create.php") ? "active" : "" ?>" href="<?= DASHBOARD_URL . "/survey/create.php" ?>">Add Survey</a>
                                </nav>
                            </div>



                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseQuestions" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Questions
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse  <?= url_is(BASE_URL_SEGMENT . "/dashboard/question") || url_is(BASE_URL_SEGMENT . "/dashboard/question/create.php") ? "show" : "" ?>" id="collapseQuestions" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?= url_is(BASE_URL_SEGMENT . "/dashboard/question") ? "active" : "" ?>" href="<?= DASHBOARD_URL . "/question/" ?>">All Questions</a>
                                    <a class="nav-link <?= url_is(BASE_URL_SEGMENT . "/dashboard/question/create.php") ? "active" : "" ?>" href="<?= DASHBOARD_URL . "/question/create.php" ?>">Add Question</a>
                                </nav>
                            </div>





                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php if(isset($_SESSION["handle"]) & !empty($_SESSION["handle"])): ?>
                            <p class="mb-0 fs-5"><?= $_SESSION["full_name"] ?> </p>
                            <p class="mb-0 fs-6"><?= $_SESSION["handle"] ?> </p>
                        <?php endif ?>
                    </div>
                </nav>
            </div>