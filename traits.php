<?php 
/*class class1{
    function f1(){
        echo "function 1";
    }
}
class class2 extends class1{
    function f2(){
        echo "function 2 ";
    }
}

class class3 extends class2{
    function f3(){
        echo "function 3";
    }
}

class class4 extends class3{
    function f4(){
        echo "function f4";
    }
}

$obj = new class3();
$obj->f1();
$obj->f2();*/
// class3  can be accessd class2 and class1 function 
//so avoid such problem we use traits 
trait class1{
    function f1(){
        echo "function 1";
    }
}
class class2 {
    function f2(){
        echo "function 2 ";
    }
}

class class3 extends class2{
    use class1; // access class1
    function f3(){
        echo "function 3";
    }
}

class class4 extends class3{
    function f4(){
        echo "function f4";
    }
}

$obj = new class3();
$obj->f1();