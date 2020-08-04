
<?php
$tclass= $_POST['classname'] ;
//$q = INTVAL($_GET['q']) ;
// echo ($q); 
$tclass1 = Array() ;
include "../dbconn.php" ; 
if (!$conn) {
  die('Could not connect: ' . mysqli_error($conn));
  ?>
  <script> alert("could not conect") ; </script> 
<?php
}
// WHERE class_name = '".$q."'
//$sql = "SELECT * FROM classname WHERE class_name =  "1st" ";
//	$result = mysqli_query( $conn, $sql);


 

$sql="SELECT * FROM class_wise where trim(class_name) = trim('$tclass') ";
// $annual=88273;  
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))  {
 //$a1 = $row['adm_fee'] ;
// $a2 = $row['annual_charge'] ;
// $tclass1 = Array($a1,$a2) ;
$tclass1 = Array($row['adm_fee'] , $row['annual_charge'], $row['tuition_fee'], $row['book_charge'] , $row['stationary_charge'] , $row['diary_charge'] ,$row['exam_charge'] ,$row['misc_charge']);
//echo $tclass1 ;
	

}

 

// Encoding array in JSON format

echo json_encode($tclass1);


Mysqli_close($conn);
?>
