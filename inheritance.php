<?php 
class Class1 {

    function __construct()
    {
        echo "parent Construct";
        $this->x=10;
    }

    function fun2(){
        echo "parent function";
    }

    

} 
class Class2 extends class1{
   
    function __construct()
    {
        echo "child Construct";
        parent::__construct();   // call parent constructor
        $this->x=20;
    }

     function fun1(){
        return parent::fun2(); // call parent function 
    }

}

$obj = new Class2();
$obj->fun1();
echo $obj->x;

