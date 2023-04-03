<?php $pageTitle = "All Answers"; ?>

<?php require "../../vendor/autoload.php"; ?>

<?php

use Surveyplus\App\Controllers\ProfileController;
use Surveyplus\App\Controllers\QuestionController;
?>

<?php require DASHBOARD_PATH . "/partials/header.php" ?>

<?php

if(isset($_GET["survey"]) && !empty($_GET["survey"]))
{

    $profiles =  new ProfileController();
    $questions = new QuestionController();
    
    $surveyID = $_GET["survey"];
    
    $profile = $profiles->all_active_profiles($_SESSION["user_id"]);
    $allQuestions = $questions->show_all_survey_question($profile["id"], $surveyID);

}

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
                            
                            
                            <h1 class="mt-4"><?= 'See All Survey Questions' ?></h1>


                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">See All Answers for each survey question</li>
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
                                        <th>Questions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Questions</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php if (isset($allQuestions) && !empty($allQuestions)) : ?>
                                        <?php foreach ($allQuestions as $question) : ?>

                                            <tr>
                                                <td>
                                                    <?= $question["name"] ?>
                                                </td>

                                                <td>
                                                <?php $query = http_build_query(["question" => $question["id"] ]); ?>
                                                    <a class="btn btn-primary rounded-0" href="<?= DASHBOARD_URL . '/answer/view.php' . '?' . $query ?>">See Answers</a>
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