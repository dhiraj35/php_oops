<?php 
$csvColoum = array("StudentName","Telno","StudenEmail","StudentDOB","ClassName","ClassTelNo","ClassNoOfStudents","ClassFloor","TeacherName","TecherCity");  
$currentdate = date('Y-m-d_H:i:s');
$flag = false;
$filename = "StudentDatabaseSystem-" . $currentdate . ".xls";
header('Content-Disposition: attachment; filename="' . $filename . '";');
header('Content-Type: application/vnd.ms-excel');
header("Content-Type: text/plain");
if (!$flag) {  
    echo ucwords(implode("\t", $csvColoum)) . "\r\n";
    $flag = true;  
}  
$selectData[0]=['test' => 'test1','test1' => 'test1'];
$selectData[1]=['test' => 'test2','test1' => 'test1'];
$selectData[2]=['test' => 'test3','test1' => 'test1'];
foreach ($selectData as $value) {     
    $empdata = array(
        'test' => $value['test'],
        'test1' => $value['test1'],
    );
    echo implode("\t", $empdata) . "\r\n";
}
exit;
