
<?php
//$q = INTVAL($_GET['q']) ;
// echo ($q); 
include "../dbconn.php" ; 
if (!$conn) {
  die('Could not connect: ' . mysqli_error($conn));
  ?>
  <script> alert("could not conect") ; </script> 
<?php
}
// WHERE class_name = '".$q."'
//$sql = "SELECT * FROM classname WHERE class_name = "1st" ";
//	$result = mysqli_query( $conn, $sql);


 

$sql="SELECT * FROM class_wise ";
$result = mysqli_query($con,$ql);
 while($row = mysqli_fetch_array($result)){
    //$id = $row['id'];
    $class_name = $row['class_name'];
    $adm_fee = $row['adm_fee'];
    $annual_charge = $row['annual_charge'];
// "id" => $id,
    $return_arr[] = array(
                    "class_name" => $class_name,
                    "adm_fee" => $adm_fee,
                    "annual_charge" => $annual_charge);
}

// Encoding array in JSON format
echo json_encode($return_arr);


Mysqli_close($conn);
?>
