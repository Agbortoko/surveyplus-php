<?php

require "vendor/autoload.php";


if(isset($_GET["handle"])){
    echo "Hello! " . $_GET["handle"];
}
?>

<p><?= "Page still under development!" ?></p>
