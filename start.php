<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
class Class1{
  public $x=1;
  private $y=10;
function test1(){
    echo "test1";
}
function test2(){
    echo "test2";
}

}
$obj = new Class1();
echo $obj->x;

