<?php

namespace Surveyplus\App\Controllers;

use Surveyplus\App\Models\Users;

class UserController 
{
    public Users $users;

    public function __construct()
    {
        $this->users = new Users();
    }

    public function show()
    {
        return $this->users->getUsers();
    }


    public function create(array $data)
    {   
        // Only save if email count in db is 0
        if(count($this->users->find($data['email'])) == 0){

            $this->users->save($data);
            return true;
        }
        
        return false;
    }


    public function auth(string $email, string $password)
    {
        $users = $this->users->find($email);

        if(count($users) == 0){
            return false;
        }


        foreach($users as $user){
            $dbUserId = $user['id'];
            $dbEmail = $user['email'];
            $dbPassword = $user['password'];
            $isAdmin = $user['isAdmin'];
            
        }

        $verifyPassword = password_verify($password, $dbPassword);


        if($verifyPassword && ($dbEmail == $email)){
            
            session_start();
            $_SESSION['user_id'] = $dbUserId;
            $_SESSION['isAdmin'] = $isAdmin;

            return true;
        }

        return false;
        
        // debug_array($user);    
    }

}