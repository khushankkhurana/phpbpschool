<?php
	
	// Create connection
	include '../dbconn.php' ;
	$sql = "SELECT * FROM transport order by station";
	$result = mysqli_query( $conn, $sql);
	//echo "<select name='partyname'>";
$tstation = array();
$tstation1 = array();
$tstation2 = array();
 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
// for($i = 0; $tclass[$i] = mysqli_fetch_assoc($result); $i++) ;
$tstation[] = $row['station'] ;
//.",". $row['charges'] ;
$tstation1[] = $row['charges'] ;
$tstation2[] = $row['station'].",". $row['charges'] ; ;
 }
 
Mysqli_close($conn);
?>
