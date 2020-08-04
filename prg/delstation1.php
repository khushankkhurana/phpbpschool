<?php
{
		
$station1 = $_POST['station'];
include '../dbconn.php' ;
	
		
	$sql1 = "DELETE FROM  transport   WHERE station='$station1'" ;

	// $sql = "INSERT INTO `file1`(`grno`, `date`, `party`, `station`) VALUES ($grno,'$date','$party','$station')";
	$result = mysqli_query( $conn, $sql1);
	//echo "<select name='partyname'>";
if(! $result ) {
               die('Could not delete data: ' . mysqli_error());
            }
            
			            // echo "Entered data successfully\n";
            //$message = '<div style="text-align: center;>The username or password you entered are not good.</div>';
            $message="Record Deleted Successfully" ;
			echo "<script> alert('$message');</script>";
				mysqli_close($conn); }
 // header ("location: edittruck_1.php" ) ;
include 'transport.php' ;
?> 
<script> 


// window.history.back(1); </script>
<?php

// header ("location: delparty.php" ) ;
?> 
			