<?php

use Surveyplus\App\Controllers\SurveyController;
use Surveyplus\App\Controllers\AnswerCategoryController;
use Surveyplus\App\Controllers\QuestionController;

$pageTitle = "Edit Questions"; ?>

<?php require "../../vendor/autoload.php"; ?>

<?php require DASHBOARD_PATH . "/partials/header.php" ?>

<?php


if(isset($_GET["question"]) && isset($_GET["action"]) && $_GET["action"] == "edit"){

    $question_id = $_GET["question"];
    $user_id = $_SESSION["user_id"];

    $surveys = new SurveyController();
    $answer_categories = new AnswerCategoryController();
    $questions = new QuestionController();

    $all_surveys = $surveys->show_user_survey($user_id, false);

    // print_r($all_surveys);

    $all_answer_categories = $answer_categories->show_all();


    $question = $questions->show($question_id, $user_id);

    if($question["survey_published"] == 1)
    {
        header("Location:" . DASHBOARD_URL . "/question/index.php?type=question&error=updatenotallowed");
        exit(0);
    }

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

                            <h1 class="mt-4"><?= $pageTitle ?></h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Modify questions</li>
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


                        <form action="<?= DASHBOARD_URL . "/includes/question/update.inc.php" ?>" method="POST">

                                <input type="hidden" name="question_id" value="<?= $question["id"] ?>">


                               <div class="form-group mb-4">
                                    <label for="name" class="mb-2 fw-bold">Name</label>
                                    <input type="text" class="form-control border border-1 border-primary rounded-0" placeholder="Type your Questions Title" value="<?= $question["name"] ?>" name="name">
                               </div> 

                               <div class="form-group mb-4">
                                    <label for="survey" class="mb-2 fw-bold">Survey</label>
                                    <select name="survey" class="form-select border border-1 border-primary rounded-0">
                                    <?php if(isset($all_surveys) && !empty($all_surveys)): ?>
                                        <?php foreach($all_surveys as $survey): ?>

                                            <?php if($survey["id"] == $question["survey_id"]): ?>
                                            <option value="<?= $survey["id"] ?>" selected>
                                                <?= $survey["name"] ?>
                                                <?php if($survey["published"] == 1): ?> 
                                                    <span>->Published</span>
                                                <?php else: ?>
                                                    <span>->Not Published</span>
                                                <?php endif ?>
                                            </option>

                                            <?php else: ?>

                                                <option value="<?= $survey["id"] ?>">
                                                    <?= $survey["name"] ?>
                                                    <?php if($survey["published"] == 1): ?> 
                                                        <span>->Published</span>
                                                    <?php else: ?>
                                                        <span>->Not Published</span>
                                                    <?php endif ?>
                                                 </option>

                                            <?php endif ?>

                                        <?php endforeach ?>
                                    <?php else: ?>
                                        <option selected disabled>No Answer Category Found</option>
                                    <?php endif ?>
                                    </select>
                               </div> 


                               <div class="form-group mb-4">
                                    <label for="answer_category" class="mb-2 fw-bold">Answer Type</label>
                                    <select name="answer_category" class="form-select border border-1 border-primary rounded-0">
                                        <?php if(isset($all_answer_categories) && !empty($all_answer_categories)): ?>
                                            <?php foreach($all_answer_categories as $answer_category): ?>

                                                <?php if($answer_category["id"] == $question["answer_type_id"]): ?>

                                                    <option value="<?= $answer_category["id"] ?>" selected><?= ucwords($answer_category["name"]) ?></option>

                                                <?php else: ?>

                                                    <option value="<?= $answer_category["id"] ?>"><?= ucwords($answer_category["name"]) ?></option>
                                                
                                                <?php endif ?>
                                                
                                            <?php endforeach ?>
                                        <?php else: ?>
                                            <option selected disabled>No Answer Category Found</option>
                                        <?php endif ?>
                                    </select>
                               </div> 

                               <div class="form-group">
                                    <button type="submit" class="btn btn-primary rounded-0 w-100">Update Survey Question</button>
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