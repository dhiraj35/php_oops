<?php 
class class1{

    private $num;
    function __construct($value)
    {
        $this->num=$value;
    }
    private function getValue(){
        return $this->num;
    }

    function testData(){
        return $this->getValue();
    }
}

class class2 extends class1{

    function getData(){
        return $this->testData();
    }

}
$obj = new class2('22');
echo $obj->getData();