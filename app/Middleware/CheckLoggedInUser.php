<?php

namespace Surveyplus\App\Middleware;

use Surveyplus\App\Models\Profiles;

final class CheckLoggedInUser
{

    private $profiles;

    public function __construct()
    {
        $this->profiles = new Profiles();
     
    }

    public function auth()
    {
    
        if(!(isset( $_SESSION['user_id'] ) || empty( $_SESSION['user_id'] ))){

            header("Location:" . base_url("login.php"));
            exit(0);
        }

        $numberOfProfiles = count($this->profiles->find($_SESSION['user_id']));
    
        // Check if user has any saved profile else let him create a profile
        if($numberOfProfiles == 0){

            header("Location:" . base_url("create_profile.php?step=1"));
            exit(0);

        }

    }


    public function userOnly()
    {
        
        if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){

            header("Location:" . base_url("login.php"));
            exit(0);
        }

    }

}