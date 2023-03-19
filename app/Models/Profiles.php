<?php

namespace Surveyplus\App\Models;

class Profiles extends BaseModel
{

    public string $table = "profile";


    public function find(int $userId){

        $profiles = $this->select("SELECT * FROM $this->table WHERE user_id = $userId")->findAll();
        return $profiles;
        
    }


}