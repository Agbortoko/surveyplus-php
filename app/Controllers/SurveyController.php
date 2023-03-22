<?php

namespace Surveyplus\App\Controllers;

use Surveyplus\App\Models\Surveys;

class SurveyController extends BaseController
{

    public Surveys $surveys;

    public function __construct()
    {
        $this->surveys = new Surveys();
    }

    public function show(int $survey_id) : array
    {
        return $this->surveys->get($survey_id);
    }


    public function show_all(): array
    {
        return $this->surveys->get();
    }

    /**
     * Show Users for specific condition
     *
     * @param integer $user_id
     * @param integer|null $published
     * 
     * @return array
     */
    public function show_user_survey(int $user_id, bool $published = null) : array
    {
        return $this->surveys->get(null, $user_id, $published);
    }


    public function create(array $data)
    {
        if($this->surveys->save($data)){
            return true;
        }

        return false;

    }


    // Get survey to modify
    public function edit(int $survey_id, int $user_id)
    {
        $survey = $this->surveys->get($survey_id, $user_id);
        
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


    public function is_published(int $survey_id)
    {
        $published_surveys = $this->surveys->visibility($survey_id, 1);

        if(count($published_surveys) > 0){
            return true;
        }

        return false;
    }

    public function delete(int $survey_id)
    {
        $delete_survey = $this->surveys->delete($survey_id);

        if($delete_survey){
            return true;
        }

        return false;
    }


}