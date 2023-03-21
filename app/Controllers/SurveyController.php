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

    public function create(array $data)
    {
        if($this->surveys->save($data)){
            return true;
        }

        return false;

    }


    // Get survey to modify
    public function edit(int $survey_id)
    {
        $survey = $this->surveys->get($survey_id);
        
        return $survey;
    }
    
    
     // Modify 
    public function modify(array $data, int $survey_id)
    {
        if($this->surveys->update($data, $survey_id)){
            return true;
        }

        return false;
    }



}