<?php


require "../../vendor/autoload.php";

header("Content-Type: application/json");

use Surveyplus\App\Controllers\AnswerController;

$answers = new AnswerController();


$allAnswers = $answers->getAnswerStatistics();

//debug_array($allAnswers);

if($allAnswers){

    echo json_encode($allAnswers);
}


exit(0);
