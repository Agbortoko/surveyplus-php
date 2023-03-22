<?php

namespace Surveyplus\App\Controllers;

use Surveyplus\App\Models\Questions;

class QuestionController 
{
    public Questions $questions;


    public function __construct()
    {
        $this->questions = new Questions();
    }

    /**
     * Get a particular question in he database
     * @param integer $question_id
     * @return array A question qith id question_id
     */
    public function show(int $question_id, int $user_id): array
    {
        return $this->questions->get($question_id, $user_id);
    }



    public function show_all(int $user_id): array
    {
        return $this->questions->get(null, $user_id);
    }


    public function show_survey_question(int $user_id) : array
    {
        return $this->questions->join($user_id);
    }


    public function create(array $data)
    {
        if($this->questions->save($data)){
            return true;
        }

        return false;
    }

    

}
