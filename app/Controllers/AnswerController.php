<?php 

namespace Surveyplus\App\Controllers;
use Surveyplus\App\Models\Answers;

class AnswerController
{
    protected Answers $answers;

    public function  __construct()
    {
        $this->answers = new Answers();
    }


    /**
     * Add answer to the database
     *
     * @param array $data
     * @return int The last Insert ID
     */
    public function create(array $data, int $surveyTaker)
    {
       $insert = $this->answers->save($data, $surveyTaker);

       return $insert;
    }


}