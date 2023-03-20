<?php $pageTitle = "All Surveys"; ?>

<?php require "../../vendor/autoload.php"; ?>

<?php require DASHBOARD_PATH . "/partials/header.php" ?>

<body class="sb-nav-fixed">

    <?php require DASHBOARD_PATH . "/partials/navigation.php" ?>

    <div id="layoutSidenav">

        <?php require DASHBOARD_PATH . "/partials/sidebar.php" ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">


                <?php require DASHBOARD_PATH . "/partials/notification.php" ?> 

                    <div class="row align-items-center">
                      <div class="col-md-6">

                          <h1 class="mt-4"><?= $pageTitle ?></h1>
                          <ol class="breadcrumb mb-4">
                              <li class="breadcrumb-item active">See All Existing Surveys</li>
                          </ol>

                      </div>
                      <div class="col-md-6 text-start text-md-end mb-5 mb-md-0">
                         
                        <?php if(isset($_SESSION["handle"]) & !empty($_SESSION["handle"])): ?>
                            <p class="mb-0 fs-2"><?= $_SESSION["full_name"] ?> </p>
                            <p class="mb-0 fs-5"><?= $_SESSION["handle"] ?> </p>
                        <?php endif ?>
                         
                      </div>
                    </div>


                    
                            



        
                </div>
            </main>


            <?php require DASHBOARD_PATH . "/partials/content-footer.php" ?>

        </div>

    </div>


    <?php require DASHBOARD_PATH . "/partials/footer.php" ?>

</body>

</html>