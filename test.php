<?php require "vendor/autoload.php" ?>
<?php 

    debug_array($_SERVER);
    var_dump(url_is(BASE_URL_SEGMENT . "/test.php"));
    echo BASE_URL_SEGMENT . "/test.php";

?>