<?php 
include 'database.php';

$obj = new query();
$sql="select * from user";
$result = $obj->selectData($sql);
print_r($result);die();

$conditionArr = ['name' => 'Dhiraj','email' => 'mithi'];
//$result = $obj->getData('user','*',$conditionArr,'name','asc',2);
// $obj->insertData('user',$conditionArr);
// $obj->deleteData('user',$conditionArr);
// $obj->updateData('user',$conditionArr,['id' => 6]);
//print_r($result);