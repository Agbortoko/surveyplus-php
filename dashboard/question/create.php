<?php

use Surveyplus\App\Controllers\SurveyController;
use Surveyplus\App\Controllers\AnswerCategoryController;

$pageTitle = "Add Questions"; ?>

<?php require "../../vendor/autoload.php"; ?>

<?php require DASHBOARD_PATH . "/partials/header.php" ?>

<?php

$user_id = $_SESSION["user_id"];

$surveys = new SurveyController();
$answer_categories = new AnswerCategoryController();

$all_surveys = $surveys->show_user_survey($user_id);
$all_answer_categories = $answer_categories->show_all();

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


                        <form action="<?= DASHBOARD_URL . "/includes/question/create.inc.php" ?>" method="POST">


                               <div class="form-group mb-4">
                                    <label for="name" class="mb-2 fw-bold">Name</label>
                                    <input type="text" class="form-control border border-1 border-primary rounded-0" placeholder="Type your Questions Title" name="name">
                               </div> 

                               <div class="form-group mb-4">
                                    <label for="survey" class="mb-2 fw-bold">Survey</label>
                                    <select name="survey" class="form-select border border-1 border-primary rounded-0">
                                    <?php if(isset($all_surveys) && !empty($all_surveys)): ?>
                                        <?php foreach($all_surveys as $survey): ?>
                                            <option value="<?= $survey["id"] ?>">
                                                <?= $survey["name"] ?>
                                                <?php if($survey["published"] == 1): ?> 
                                                    <span>->Published</span>
                                                <?php else: ?>
                                                    <span>->Not Published</span>
                                                <?php endif ?>
                                            </option>
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
                                                <option value="<?= $answer_category["id"] ?>"><?= ucwords($answer_category["name"]) ?></option>
                                                
                                            <?php endforeach ?>
                                        <?php else: ?>
                                            <option selected disabled>No Answer Category Found</option>
                                        <?php endif ?>
                                    </select>
                               </div> 

                               <div class="form-group">
                                    <button type="submit" class="btn btn-primary rounded-0 w-100">Add Question to Survey</button>
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