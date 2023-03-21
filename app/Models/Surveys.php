<?php

namespace Surveyplus\App\Models;


final class Surveys extends BaseModel 
{

    public string $table = "survey";


    /**
     * Get survey data
     *
     * @param integer|null $survey_id
     * @return array
     */
    public function get(int $survey_id = null) 
    {
        if($survey_id != null){
            $surveys = $this->select("SELECT *  FROM $this->table WHERE id = $survey_id")->findAll();

            foreach($surveys as $survey){
                return $survey; // Return single survey incase id paramater is set
            }
        }

        $surveys = $this->select("SELECT *  FROM $this->table")->findAll();
        return $surveys;
    }

    public function save(array $data)
    {
        
        $this->stmt = $this->conn->prepare("INSERT INTO $this->table (name, description, published, publishedOn, expiresOn, user_id) VALUES (:name, :description, :published, :publishedOn, :expiresOn, :user_id)");

        // Bind parameters to prepared indicators
        $this->stmt->bindParam(":name", $data["name"]);
        $this->stmt->bindParam(":description", $data["description"]);
        $this->stmt->bindParam(":published", $data["published"]);
        $this->stmt->bindParam(":publishedOn", $data["publishedOn"]);
        $this->stmt->bindParam(":expiresOn", $data["expiresOn"]);
        $this->stmt->bindParam(":user_id", $data["user_id"]);

        if(!$this->stmt->execute())
        {
             return false;
        }

        return true;
    }



}  