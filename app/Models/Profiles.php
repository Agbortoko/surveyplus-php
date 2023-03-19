<?php

namespace Surveyplus\App\Models;

class Profiles extends BaseModel
{
    /** @var string Table name for this model */
    public string $table = "profile";


    /**
     * Find a user id in profile
     *
     * @param integer $userId
     * @return array An array of profiles found
     */
    public function find(int $userId)
    {

        $profiles = $this->select("SELECT * FROM $this->table WHERE user_id = $userId")->findAll();
        return $profiles;
    }

    /**
     * Save a profile
     *
     * @param array $data
     * @return void
     */
    public function save(array $data)
    {

        $this->stmt = $this->conn->prepare("INSERT INTO $this->table (first_name, last_name, username, dob, handle, signature, user_id, role_id, gender_id) VALUES (:first_name, :last_name, :username, :dob, :handle, :signature, :user_id, :role_id, :gender_id)");

        // Bind parameters to prepared indicators

        $this->stmt->bindParam(":first_name", $data["first_name"]);
        $this->stmt->bindParam(":last_name", $data["last_name"]);
        $this->stmt->bindParam(":username", $data["username"]);
        $this->stmt->bindParam(":dob", $data["dob"]);
        $this->stmt->bindParam(":handle", $data["handle"]);
        $this->stmt->bindParam(":signature", $data["signature"]);
        $this->stmt->bindParam(":user_id", $data["user_id"]);
        $this->stmt->bindParam(":role_id", $data["role_id"]);
        $this->stmt->bindParam(":gender_id", $data["gender_id"]);


        $this->stmt->execute();
    }


    /**
     * Find a username in database
     *
     * @param string $username
     * @return array An array of profiles found
     */
    public function find_username(string $username)
    {

        $profiles = $this->select("SELECT * FROM $this->table WHERE username = '$username'")->findAll();
        return $profiles;
    }
}
