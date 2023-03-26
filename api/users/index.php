<?php


require "../../vendor/autoload.php";

header("Content-Type: application/json");

use Surveyplus\App\Controllers\UserController;

$users = new UserController();


$allUsers = $users->show();

echo json_encode($allUsers);

exit(0);
