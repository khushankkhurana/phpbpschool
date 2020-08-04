<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
$q = ($_GET['q']);
// echo ("welcome"); 
include "../dbconn.php" ; 
if (!$conn) {
  die('Could not connect: ' . mysqli_error($con));
  ?>
  <script> alert("could not conect") ; </script> 
<?php
}
// WHERE class_name = '".$q."'
//$sql = "SELECT * FROM classname WHERE class_name = "1st" ";
//	$result = mysqli_query( $conn, $sql);


echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
// 
$mysqli = new mysqli("localhost", "root", "", "fees");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$row="";
$sql="SELECT class_name,adm_fee,annual_charge FROM class_wise where class_name = ?";
echo ($q) ;
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($class_name, $adm, $annual );
$stmt->fetch();
$stmt->close();
echo "<table>";
echo "<tr>";
echo "<th>CustomerID</th>";
echo "<td>" . $class_name . "</td>";
echo "<th>CompanyName</th>";
echo "<td>" . $adm . "</td>";
echo "<th>ContactName</th>";
echo "<td>" . $annual . "</td>";
echo "<th>ContactName</th>";
echo "<td>  .$annual.  +  .$adm.  </td>";
//$result = mysqli_query($conn,$sql);
//while($row = mysqli_fetch_array($result)) {
 // echo "<tr>";
 // echo "<td>" . $row['class_name'] . "</td>";
 // echo "<td>" . $row['adm_fee'] . "</td>";
 // echo "<td>" . $row['annual_charge'] . "</td>";
 // echo "<td>" . $row['tuition_fee'] . "</td>";
 // echo "<td>" . $row['exam_charge'] . "</td>";
 // echo "</tr>";
//}
// "</table>";
//mysqli_close($conn);
; 
?>
</body>
</html>