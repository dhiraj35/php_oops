<?php 
//abstract class contain one abstract function 
//abstract class object can not be create child class need to create object
abstract class bank{
    abstract function id_proff();
    function test(){
        echo "this is test";
    }
}

class hdfc extends bank {

    public function id_proff()
    {
        echo "hdfc bank";
    }
    function test1(){
        return $this->test();
        //return parent::test();
    }
}

class icici extends bank{
    public function id_proff()
    {
        echo __METHOD__." bank";
    }
}

$hdfcobj = new hdfc();
$hdfcobj->id_proff();
$hdfcobj->test();
$iciciobj = new icici();
$iciciobj->id_proff();

