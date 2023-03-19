<?php

namespace Surveyplus\App\Controllers;

use Surveyplus\App\Models\Profiles;

class ProfileController
{
    public Profiles $profiles;


    public function __construct()
    {
        $this->profiles = new Profiles();
    }



    public function create(array $data)
    {
        $this->profiles->save($data);
        return true;
    }

    public function username_exists(string $username){

        $profiles = $this->profiles->find_username($username);

        if(count($profiles) > 0){
            return true;
        }

        return false;
    }
}
