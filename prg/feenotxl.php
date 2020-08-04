<?php  
$token=$_GET['classname'];
$ar=Array();
$token = strtok($token, ",");
$ar[]=$token ; 
while ($token !== false)
   {
   //echo "$token<br>";
   $token = strtok(",");
   $ar[]=$token ; 
   }

$month=trim($ar[1]) ;
$classname=trim($ar[0]) ;
//month=$_GET['classname'];
// $classname=$_GET['classname'];
//echo ($month) ;
//echo ($classname);
$conn = new mysqli('localhost', 'root', '');  
mysqli_select_db($conn, 'fees');  
if ($month!='')
$sql = "SELECT  student.acno, student.name,student.father_name,student.mother_name,student.mobile_no FROM `student` INNER JOIN `transmonth` ON student.acno=transmonth.acno where transmonth.$month=2 && student.class_name='$classname' ";
 else
 $sql = "SELECT  student.acno, student.name,student.father_name,student.mother_name,student.mobile_no FROM `student`  where  student.class_name='$classname' ";

$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader1 = ''; 
$columnHeader2 ='';
$columnHeader1 = "Class " .$classname; 

$columnHeader = "Accoun No" . "\t" . "Name" . "\t" . "Father's Name" . "\t" ."Mother's Name" . "\t" . "Mobile No"  ;
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
if ($month!='')
$columnHeader2= "Fee not Deposit For the Month of " . $month ;  
else 
$columnHeader2= '' ;
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
	
  echo ($columnHeader2) . "\n" .($columnHeader1) . "\n" . ($columnHeader) . "\n" . $setData . "\n";  
 ?> 
 




