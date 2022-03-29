<?php 
//method in different class will do the same things
//should have same name 
//polymorphism define in two ways 
//Abstact class
//Interface 

abstract class class1 {
    abstract function func1();
}

class class2 extends class1{

    function func1()
    {
        echo "function data";
    }

}

class class3 extends class1{

    function func1()
    {
        echo "function class2";
    }
}

$obj = new class3();
$obj->func1();
/*interface cricket{
    function play();
}

class batsman implements cricket{
    function play()
    {
        echo "batsman start play cricket";
    }
}
class bowler implements cricket{
    function play()
    {
        echo "bowler start bowling";
    }
}
class wicketkeeper implements cricket{
    function play()
    {
        echo "wicket keeper  start wicketing";
    }
}
$batsmanobj = new batsman();
$batsmanobj->play();*/