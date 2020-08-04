<?php
	//echo $station.$truck.$file ;
	// Create connection
	include '../dbconn.php' ;
	
	$sql = "SELECT * FROM $station";
	$result = mysqli_query( $conn, $sql);
	//echo "<select name='partyname'>";
$tstation = array();
$trate = array() ;
$rate1="";
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
$tstation[] = $row['station'] ;
$trate[] = $row['rate'];
}
?>