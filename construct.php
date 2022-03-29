<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class class2{

function __construct($y)
{
    $this->x=$y;
}
    function test1(){
        echo $this->x;
    }

    function __destruct()
    {
        echo "end";
    } 
}
$obj = new class2(10);
$obj->test1();
