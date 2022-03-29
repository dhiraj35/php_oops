<?php 
trait f1{
    function fun1(){
        echo "function f1";
    }
}

trait f2{
    function fun1(){
        echo "function f2";
    }
}

class class1 {
    use f1,f2 {
        f1::fun1 insteadOf f2;
        f2::fun1 as fun2;
    }
}

$obj = new Class1();
$obj->fun1();
$obj->fun2();