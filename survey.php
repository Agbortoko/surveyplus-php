<?php require "vendor/autoload.php"; ?>
<?php

use Surveyplus\App\Controllers\SurveyController;
use Surveyplus\App\Controllers\QuestionController;
?>

<?php require "partials/header.php" ?>


<?php if (isset($_GET["handle"]) && isset($_GET["id"]) && isset($_GET["profile"]) && isset($_GET["slug"])) : ?>

    <?php
    // debug_array($_SESSION);
    $survey_id = $_GET["id"];
    $profile_id = $_GET["profile"];

    $surveys = new SurveyController();
    $questions = new QuestionController();

    // Check if survey is published
    $published = $surveys->is_published($survey_id);

    if (!$published) {

        // Redirect where user is logged in
        if (isset($_SESSION["user_id"])) {
            header("Location: " . DASHBOARD_URL . "/survey/index.php?type=survey&error=notpublished");
            exit(0);
        }

        if (!isset($_SESSION["user_id"])) {
            // Redirect where user is not logged in
            header("Location: " . base_url());
            exit(0);
        }
    }

    $survey = $surveys->show_view($survey_id, true, $profile_id);

    $all_survey_questions = $questions->show_survey_single_question($profile_id, $survey_id);

    $count_question = 0;

    // debug_array($survey);
    ?>


    <main class="container my-5">


        <h1 class="fw-bold text-center mb-5 text-primary"><?= $survey["name"] ?></h1>


        <form action="" method="POST">

        <?php foreach ($all_survey_questions as $question) : ?>

            <?php $count_question++ ?>


            <?php if ($question["answer_type_id"] == 1) : ?>

                <div class="form-group mb-4 border border-1 border-primary py-4 px-2">

                    <h4><?= $count_question . ") " . ucwords($question["name"]) ?></h4>

                    <?php $description = json_decode($question["description"]); ?>

                    <?php if (isset($description) && !empty($description)) : ?>
                        <?php foreach ($description as $label) : ?>

                            <div class="container p-0 my-2">
                                <input type="radio" name="<?= "radio_" . $question["id"] ?>">
                                <label class="ms-2 fw-bold" for="<?= "radio_" . $question["id"] ?>"><?= $label ?></label>
                            </div>

                        <?php endforeach ?>

                    <?php endif ?>

                </div>
            <?php endif ?>




            <?php if ($question["answer_type_id"] == 2) : ?>

                <div class="form-group mb-4 border border-1 border-primary py-4 px-2">

                    <h4><?= $count_question . ") " . ucwords($question["name"]) ?></h4>

                    <?php $description = json_decode($question["description"]); ?>

                    <?php if (isset($description) && !empty($description)) : ?>

                        <?php foreach ($description as $label) : ?>

                            <div class="container p-0 my-2">
                                <input type="checkbox" name="<?= "checkbox_" . $question["id"] ?>">
                                <label class="ms-2 fw-bold" for="<?= "checkbox_" . $question["id"] ?>"><?= $label ?></label>
                            </div>

                        <?php endforeach ?>

                    <?php endif ?>
                </div>

            <?php endif ?>


        <?php endforeach ?>

            <button type="submit" class="btn btn-primary w-100 text-white rounded-0">Submit Survey</button>

        </form>

    <?php else : ?>

        <?php
        header("Location: " . DASHBOARD_URL . "/survey/index.php?type=survey&error=invalidlink");
        exit(0);
        ?>

    <?php endif ?>


    </main>