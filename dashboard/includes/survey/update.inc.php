<?php

require "../../../vendor/autoload.php";


use Surveyplus\App\Controllers\SurveyController;
use Surveyplus\App\Controllers\ProfileController;

session_start();

if(isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST")
{

    


}else{

    header("Location:" . DASHBOARD_URL . "/survey/");
    exit(0);
}