<?php

namespace Surveyplus\App\Models;


final class Surveys extends BaseModel 
{

    public string $table = "survey";


    public function get() 
    {
        $surveys = $this->select("SELECT *  FROM $this->table")->findAll();
        return $surveys;
    }



}  