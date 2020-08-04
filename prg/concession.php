<?php
	
	// Create connection
	include '../dbconn.php' ;
	$sql = "SELECT * FROM concession";
	$result = mysqli_query( $conn, $sql);
	//echo "<select name='partyname'>";
$tconcession = array();
$tconcession1 = array();
$tconcession2 = array();
 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
// for($i = 0; $tclass[$i] = mysqli_fetch_assoc($result); $i++) ;
$tconcession[] = $row['concession'] ;
// .",". $row['amount'] ;
$tconcession1[] = $row['amount']  ;
$tconcession2[] = $row['concession'].",". $row['amount'] ;
 }
 
Mysqli_close($conn);
?>
