<?php


/**
 * Array Debugger
 * Print out all the values of an array
 * @param array $arrayToDebug
 * @return void
 */
function debug_array(array $arrayToDebug)
{
    echo "<pre> <code>";
    print_r($arrayToDebug);
    echo "</pre> </code>";

    exit(0); // stops the script from loading below
}