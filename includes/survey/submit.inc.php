<?php

require "../../vendor/autoload.php";

if(isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST")
{
    
    debug_array($_POST);
}