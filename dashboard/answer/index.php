<?php $pageTitle = "All Answers"; ?>

<?php require "../../vendor/autoload.php"; ?>

<?php

use Surveyplus\App\Controllers\ProfileController;
use Surveyplus\App\Controllers\SurveyController;
?>

<?php require DASHBOARD_PATH . "/partials/header.php" ?>

<?php

$profiles =  new ProfileController();
$surveys = new SurveyController();



$profile = $profiles->all_active_profiles($_SESSION["user_id"]);

$allSurveys = $surveys->show_user_survey($profile["id"]);
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
                                <li class="breadcrumb-item active">See All Existing Survey Answers</li>
                            </ol>

                        </div>
                        <div class="col-md-6 text-start text-md-end mb-5 mb-md-0">

                            <?php if (isset($_SESSION["handle"]) & !empty($_SESSION["handle"])) : ?>
                                <p class="mb-0 fs-2"><?= $_SESSION["full_name"] ?> </p>
                                <p class="mb-0 fs-5"><?= $_SESSION["handle"] ?> </p>
                            <?php endif ?>

                        </div>
                    </div>

                    <!-- Surveys table -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            <?= $pageTitle ?> Table
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Survey</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php if (isset($allSurveys) && !empty($allSurveys)) : ?>
                                        <?php foreach ($allSurveys as $survey) : ?>

                                            <tr>
                                                <td>
                                                    <?= $survey["name"] ?>

                                                </td>

                                                <td>
                                                    <?php $query = http_build_query(["survey" => $survey["id"] ]); ?>
                                                    <a class="btn btn-primary rounded-0" href="<?= DASHBOARD_URL . '/answer/question.php' . '?' . $query ?>">See All Survey Questions</a>
                                                </td>

                                            </tr>

                                        <?php endforeach ?>


                                    <?php endif ?>

                                </tbody>
                            </table>
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