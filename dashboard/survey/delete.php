<?php

require "../../vendor/autoload.php";

use Surveyplus\App\Controllers\SurveyController;

if(isset($_GET["survey"]) && isset($_GET["action"]) && $_GET["action"] == "delete")
{
    $survey_id = $_GET["survey"];

    $survey = new SurveyController();

    $is_published = $survey->is_published($survey_id);

    if($is_published){
        header("Location:" . DASHBOARD_URL . "/survey/index.php?type=survey&error=deletenotallowed");
        exit(0);
    }


    $delete = $survey->delete($survey_id);

    if(!$delete)
    {
        header("Location:" . DASHBOARD_URL . "/survey/index.php?type=survey&error=deletefailed");
        exit(0);
    }

    header("Location:" . DASHBOARD_URL . "/survey/index.php?type=survey&success=deleted");
    exit(0);

}