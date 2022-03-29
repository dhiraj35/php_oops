<?php
//interface support multiple inheritance
//interface does not have constructor
//interface must have abstract function only no other function can define
//Declare function inside interface must be used in child class
//inside interface we can declare public function  only
//we can not declare variable inside interface  
interface class1{
    public function test();
    public function test2();
}
interface class3{
    public function checkData();
}
class class2 implements class1,class3{

    public function test(){
        echo "test";
    }
    public function checkData(){
        echo "check Data";
    }
    public function test2(){
        echo "test2";
    }
    public function test3(){
        echo "test3";
    }


}
$obj = new class2;
$obj->test();
$obj->checkData();
$obj->test2();
$obj->test3();  