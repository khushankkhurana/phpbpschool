<?php 
$class= $_POST['classname'];
$count=0 ;
include "../dbconn.php";
$sql="SELECT *FROM student where class_name = '$class' ";
//$annual=88273;  
$result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($result))  {
  
  $count =  $row['acno'];
  }
  if( $count==0 )
	  $count=$start ;
   else 
	    $count=$count+1 ;
	
$temp = $count ;
echo json_encode($temp);

Mysqli_close($conn);
?>