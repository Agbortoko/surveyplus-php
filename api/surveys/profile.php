<?php

session_start();

require "../../vendor/autoload.php";

header("Content-Type: application/json");

use Surveyplus\App\Controllers\SurveyController;

if(!isset($_SESSION["profile_id"]))
{
    http_response_code(403);
    echo json_encode("403 Forbidden");
    
    exit(0);
}


$surveys = new SurveyController();
$profileID = $_SESSION["profile_id"];

$allSurveys = $surveys->getSurveyStatistics($profileID);


// debug_array($allSurveys);

if($allSurveys){

    echo json_encode($allSurveys);
}


exit(0);
