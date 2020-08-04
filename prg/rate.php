<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "master1" ; 
// Create connection
$conn = mysqli_connect($servername, $username, $password);
 mysqli_select_db($conn, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
// echo "Connected successfully"; 
}
$sql = "SELECT * FROM PARTY WHERE $GET("selectedCountry") = partyname";
$result = mysqli_query( $conn, $sql);
//echo "<select name='partyname'>";

$co=0 ;

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
$station =$row['station'];
}
?>