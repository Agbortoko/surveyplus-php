<?php

namespace Surveyplus\App\Controllers;

use Surveyplus\App\Models\Surveys;

class SurveyController
{

    public Surveys $surveys;

    public function __construct()
    {
        $this->surveys = new Surveys();
    }

    public function show()
    {
        return $this->surveys->get();
    }



}