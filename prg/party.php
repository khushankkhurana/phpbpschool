<?php
		// Create connection
		include '../dbconn.php' ;
	$sql = "SELECT * FROM $party";
	$result = mysqli_query( $conn, $sql);
	//echo "<select name='partyname'>";
$tparty = array() ;
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
$tparty[] = $row['partyname'] ;
}
?>
