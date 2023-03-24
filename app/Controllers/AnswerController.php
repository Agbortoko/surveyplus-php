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
     * @return boolean
     */
    public function create(array $data) : bool
    {

        $save = $this->answers->save($data);

        if(!$save){
            return false;
        }

        return true;

    }

}