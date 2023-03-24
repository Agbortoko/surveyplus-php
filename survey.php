<?php require "vendor/autoload.php"; ?>
<?php use Surveyplus\App\Controllers\SurveyController; ?>
<?php session_start(); ?>


<?php if (isset($_GET["handle"]) && isset($_GET["id"]) && isset($_GET["profile"]) && isset($_GET["slug"])) : ?>

<?php 
    // debug_array($_SESSION);
    $survey_id = $_GET["id"];
    $profile_id = $_GET["profile"];

    $surveys = new SurveyController();

    // Check if survey is published
    $published = $surveys->is_published($survey_id);

    if (!$published) {

        // Redirect where user is logged in
        if (isset($_SESSION["user_id"])) {
            header("Location: " . DASHBOARD_URL . "/survey/index.php?type=survey&error=notpublished");
            exit(0);
        }

        if(!isset($_SESSION["user_id"])) {
            // Redirect where user is not logged in
            header("Location: " . base_url());
            exit(0);
        }
    }

    $survey = $surveys->show_view($survey_id, true, $profile_id);

    debug_array($survey);
?>


<?php else: ?>

    <?php
        header("Location: " . DASHBOARD_URL . "/survey/index.php?type=survey&error=invalidlink");
        exit(0);
    ?>

<?php endif ?>
