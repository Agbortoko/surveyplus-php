<?php

namespace Surveyplus\App\Models;


final class Questions extends BaseModel 
{

    public string $table = "question";


    public function get(int $question_id = null, int $user_id = null) 
    {
        if($question_id != null){

                $questions = $this->select("SELECT 
                    q.id as id, 
                    q.name as name, 
                    q.createdOn as createdOn, 
                    s.id as survey_id, 
                    s.name as survey_name, 
                    s.published as survey_published,
                    ac.name as answer_type,
                    ac.id as answer_type_id 
                FROM $this->table q 
                JOIN survey s 
                    ON q.survey_id = s.id 
                JOIN answer_category ac 
                    ON q.answer_category_id = ac.id 
                WHERE s.user_id = $user_id AND q.id = $question_id")->findAll();


            foreach($questions as $question ){
                return $question;
            }
        
        }

        if($user_id != null){

             $questions = $this->join($user_id);
             return $questions;
        
        }


        $questions = $this->select("SELECT *  FROM $this->table")->findAll();
        return $questions;
    }



    public function save(array $data)
    {
        
        $this->stmt = $this->conn->prepare("INSERT INTO $this->table (name, survey_id, answer_category_id) VALUES (:name, :survey_id, :answer_category_id)");

        // Bind parameters to prepared indicators
        $this->stmt->bindParam(":name", $data["name"]);
        $this->stmt->bindParam(":survey_id", $data["survey_id"]);
        $this->stmt->bindParam(":answer_category_id", $data["answer_category_id"]);

        if(!$this->stmt->execute())
        {
             return false;
        }

        return true;
    }


    /**
     * Find all questions for survey created by a user
     *
     * @param integer $user_id
     * @return array $questions
     */
    public function join(int $user_id)
    {
        $questions = $this->select("SELECT 
                q.id as id, 
                q.name as name, 
                q.createdOn as createdOn, 
                s.id as survey_id, 
                s.name as survey_name, 
                s.published as survey_published,
                ac.name as answer_type  
            FROM $this->table q 
            JOIN survey s 
                ON q.survey_id = s.id 
            JOIN answer_category ac 
                ON q.answer_category_id = ac.id 
            WHERE s.user_id = $user_id")->findAll();

        return $questions;
    }



}  