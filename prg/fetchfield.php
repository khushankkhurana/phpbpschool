<?php
	//echo $station.$truck.$file ;
	// Create connection
	include '../dbconn.php' ;
	// $acno="1001" ;
	$acno =$_POST['acno'] ;
	$sql = "SELECT * FROM transmonth where acno = '$acno' ";
	$result = mysqli_query( $conn, $sql);
	//echo "<select name='partyname'>";
$month = array();

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
$month[]= "JANUARY" ."   ". $row['JANUARY'] ;
$month[]= "FEBRUARY" ." ". $row['FEBRUARY'] ;
$month[]= "MARCH   " . " ". $row['MARCH'] ; 

$month[] = "APRIL" . " ". $row['APRIL'] ;
$month[] = "MAY" . " ". $row['MAY'] ;
$month[]= "JUNE   " . " ". $row['JUNE'] ;
$month[]= "JULY   " . " ". $row['JULY'] ;
$month[]= "AUGUST   " . " ". $row['AUGUST'] ;
$month[]= "SEPTEMBER" . " ". $row['SEPTEMBER'] ;
$month[]= "OCTOBER  " . " ". $row['OCTOBER'] ;
$month[]= "NOVEMBER  " . " ". $row['NOVEMBER'] ;
$month[]= "DECEMBER  " . " ". $row['DECEMBER'] ;       
//echo $month[0];
//echo $month[1];
//echo $month[2] ;
}
 
	echo json_encode($month) ;
	Mysqli_close($conn);
	
?>