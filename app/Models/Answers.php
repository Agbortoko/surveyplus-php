<?php

namespace Surveyplus\App\Models;


class Answers extends BaseModel
{

    public string $table = "answer";


    public function save(array $data)
    {

        $this->stmt = $this->conn->prepare("INSERT INTO $this->table (description, answer_category_id) VALUES (:description, :answer_category_id)");

        // Bind parameters to prepared indicators
        $this->stmt->bindParam(":description", $data["description"]);
        $this->stmt->bindParam(":answer_category_id", $data["answer_category_id"]);

        if(!$this->stmt->execute())
        {
             return false;
        }

        return true;

    }
    


}