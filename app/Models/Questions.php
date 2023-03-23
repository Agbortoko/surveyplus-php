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
                WHERE s.user_id = $user_id AND q.id = $question_id ORDER BY q.id DESC")->findAll();


            foreach($questions as $question ){
                return $question;
            }
        
        }

        if($user_id != null){

             $questions = $this->join($user_id);
             return $questions;
        
        }


        $questions = $this->select("SELECT *  FROM $this->table ORDER BY id DESC")->findAll();
        return $questions;
    }



    public function save(array $data)
    {
        
        $this->stmt = $this->conn->prepare("INSERT INTO $this->table (name, description, survey_id, answer_category_id) VALUES (:name, :description, :survey_id, :answer_category_id)");

        // Bind parameters to prepared indicators
        $this->stmt->bindParam(":name", $data["name"]);
        $this->stmt->bindParam(":description", $data["description"]);
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
            WHERE s.user_id = $user_id ORDER BY q.id DESC")->findAll();

            

        return $questions;
    }



    public function update(array $data, int $question_id)
    {

        $name = $data["name"];
        $answer_category_id = $data["answer_category_id"];

        $this->stmt = $this->conn->prepare("UPDATE $this->table SET name = '$name', answer_category_id = '$answer_category_id' WHERE id = $question_id");


        if(!$this->stmt->execute())
        {
             return false;
        }

        return true;

    }




    public function delete(int $question_id)
    {
        $this->stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = $question_id");

        if(!$this->stmt->execute())
        {
             return false;
        }
        return true;
    }



}  