<?php

use Surveyplus\App\Controllers\SurveyController;

$pageTitle = "Add Questions"; ?>

<?php require "../../vendor/autoload.php"; ?>

<?php require DASHBOARD_PATH . "/partials/header.php" ?>

<?php

$surveys = new SurveyController();

$all_surveys = $surveys->show();

?>

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
                                <li class="breadcrumb-item active">Add a questions to your survey</li>
                            </ol>

                        </div>
                        <div class="col-md-6 text-start text-md-end mb-5 mb-md-0">

                            <?php if (isset($_SESSION["handle"]) & !empty($_SESSION["handle"])) : ?>
                                <p class="mb-0 fs-2"><?= $_SESSION["full_name"] ?> </p>
                                <p class="mb-0 fs-5"><?= $_SESSION["handle"] ?> </p>
                            <?php endif ?>

                        </div>
                    </div>

              


                    <div class="container p-0 mt-3">


                        <form action="" method="POST">


                               <div class="form-group mb-4">
                                    <label for="name" class="mb-2 fw-bold">Name</label>
                                    <input type="text" class="form-control border border-1 border-primary rounded-0" placeholder="Type your Survey Name" name="name">
                               </div> 


                               <div class="form-group mb-4">
                                    <label for="description" class="mb-2 fw-bold">Description</label>
                                    <textarea class="form-control border border-1 border-primary rounded-0" style="resize:none" name="description"></textarea>
                               </div> 

                               <div class="form-group mb-4">
                                    <label for="visibility" class="mb-2 fw-bold">Visibility</label>
                                    <select name="visibility" class="form-select border border-1 border-primary rounded-0">
                                        <option value="1">Publish</option>
                                        <option value="2">Draft</0option>
                                    </select>
                               </div> 

                               <div class="form-group">
                                    <button type="submit" class="btn btn-primary rounded-0 w-100">Create Survey</button>
                               </div>


                        </form>



                    </div>




                </div>
            </main>


            <?php require DASHBOARD_PATH . "/partials/content-footer.php" ?>

        </div>

    </div>


    <?php require DASHBOARD_PATH . "/partials/footer.php" ?>

</body>

</html>