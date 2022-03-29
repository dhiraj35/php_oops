<?php 
//static function and variable can be access without creating object of class
//if you don't want to initialize constructor then use static function 
class class1{

     public static $num=10;
    static function test(){
       return  self::$num;
    }
}

echo class1::$num;
echo class1::test();