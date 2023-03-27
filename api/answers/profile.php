<?php

session_start();

require "../../vendor/autoload.php";

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

use Surveyplus\App\Controllers\AnswerController;


    
    if(!isset($_SESSION["profile_id"]))
    {
        http_response_code(403);
        echo json_encode("403 Forbidden");
        
        exit(0);
    }
    
    
    $answers = new AnswerController();
    $profileID = $_SESSION["profile_id"];
    
    $allAnswers = $answers->getAnswerStatistics($profileID);
    
    // debug_array($allAnswers);
    
    if($allAnswers){
    
        echo json_encode($allAnswers);
    }
    
    
    exit(0);


