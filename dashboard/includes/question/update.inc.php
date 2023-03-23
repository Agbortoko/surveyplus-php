<?php
require "../../../vendor/autoload.php";

use Surveyplus\App\Controllers\QuestionController;
use Surveyplus\App\Controllers\SurveyController;

session_start();

if(isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST")
{

    $questions = new QuestionController();
    $surveys = new SurveyController();

    $name = isset($_POST['name']) ? clean_input($_POST['name']) : "";
    $survey_id = isset($_POST['survey']) ? clean_input($_POST['survey']) : null;
    $answer_category_id = isset($_POST['answer_category']) ? clean_input($_POST['answer_category']) : null;

    $question_id = $_POST["question_id"];


    // Check for empty fields
    if(empty($name) || empty($survey_id) || empty($answer_category_id))
    {
        header("Location:" . DASHBOARD_URL . "/question/create.php?error=emptyfield");
        exit(0);
    }


    $survey = $surveys->show($survey_id);

    if($survey["published"] == 1)
    {
        header("Location:" . DASHBOARD_URL . "/question/create.php?error=emptyfield");
        exit(0);
    }


    $data = [
        "name" => $name,
        "survey_id" => $survey_id,
        "answer_category_id" => $answer_category_id
    ];




    $is_published = $surveys->is_published($survey_id);

    if($is_published){
        header("Location:" . DASHBOARD_URL . "/question/index.php?type=question&error=updatenotallowed");
        exit(0);
    }

    header("Location:" . DASHBOARD_URL . "/question/index.php?type=question&success=updated");
    exit(0);




}else{

    header("Location:" . DASHBOARD_URL . "/question/");
    exit(0);
}