<?php

namespace Surveyplus\App\Models;


final class Surveys extends BaseModel 
{

    public string $table = "survey";


    /**
     * Get survey data
     *
     * @param integer|null $survey_id - Get survey wit id
     * @param integer|null $user_id - Get with user id
     * @param bool|null $published - Get by state
     * @param integer|null $limit - Limit number of items to get
     * 
     * @return array
     */
    public function get(int $survey_id = null, int $user_id = null, bool $published = null, int $limit = null) : array
    {
        if(isset($published) && isset($user_id)){

            $is_published = ($published == true) ? $published = 1 : $published = 0;
            
            $surveys = $this->select("SELECT * FROM $this->table WHERE user_id = $user_id AND published = $is_published ORDER BY id DESC")->findAll();

            return $surveys; // Return all surveys with user id and check for published state
        }


        if($survey_id != null){

            $surveys = $this->select("SELECT * FROM $this->table WHERE id = $survey_id AND user_id = $user_id ORDER BY id DESC")->findAll();

            foreach($surveys as $survey){
                return $survey; // Return single survey incase id paramater is set
            }
        }

        if($user_id != null && $limit != null)
        {
            $surveys = $this->select("SELECT * FROM $this->table WHERE user_id = $user_id ORDER BY id DESC LIMIT $limit")->findAll();
            return $surveys; // Return all surveys with user id limit 
        }

        if($user_id != null){
            $surveys = $this->select("SELECT * FROM $this->table WHERE user_id = $user_id ORDER BY id DESC")->findAll();
            return $surveys; // Return all surveys with user id
        }


        


        $surveys = $this->select("SELECT * FROM $this->table ORDER BY id DESC")->findAll();
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




    public function update(array $data, int $survey_id)
    {


        $updated_on = $data["updatedOn"];
        $name = $data["name"];
        $description = $data["description"];
        $published = $data["published"];
        $publishedOn = $data["publishedOn"];
        $expiresOn = $data["expiresOn"];
        $user_id = $data["user_id"];
        
        $this->stmt = $this->conn->prepare("UPDATE $this->table SET updatedOn = '$updated_on', name = '$name', description = '$description', published = $published, publishedOn = '$publishedOn', expiresOn = '$expiresOn', user_id = $user_id WHERE id = $survey_id");


        if(!$this->stmt->execute())
        {
             return false;
        }

        return true;
    }

    

    public function visibility(int $survey_id, int $state)
    {
        $surveys = $this->select("SELECT *  FROM $this->table WHERE id = $survey_id AND published = $state")->findAll();
        
        return $surveys;
    }


    public function delete(int $survey_id)
    {
        $this->stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = $survey_id");

        if(!$this->stmt->execute())
        {
             return false;
        }
        return true;

    }



}  