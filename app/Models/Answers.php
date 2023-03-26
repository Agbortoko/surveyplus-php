<?php

namespace Surveyplus\App\Models;


class Answers extends BaseModel
{

    public string $table = "answer";

    public function save(array $data, int $surveyTaker)
    {

        $this->stmt = $this->conn->prepare("INSERT INTO $this->table (description, answer_category_id, question_id, survey_taker_id) VALUES (:description, :answer_category_id, :question_id, :survey_taker_id)");

        // Loop through and bind parameters to prepared indicators

        foreach ($data as $key => $value) {

            // count the number of values encpde tje value answer and bind
        
            for($i = 0 ; $i <= count($value) ; $i++)
            {

                $answerToSave = json_encode($value["answer"]);
    
                $this->stmt->bindParam(":description", $answerToSave);
                $this->stmt->bindParam(":answer_category_id", $value["answer_type"]);
                $this->stmt->bindParam(":question_id", $key);
                $this->stmt->bindParam(":survey_taker_id", $surveyTaker);

                // executing here will make it add more than needed
            }
            
            // execute for each existing value bind above
            $execute = $this->stmt->execute();
        }


        if (!$execute) {
            return false;
        }

        $lastID =  $this->conn->lastInsertId();

        return $lastID;
    }


}
