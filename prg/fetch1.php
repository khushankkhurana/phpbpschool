<!DOCTYPE html>
<html>

<body>
<?php $tclass1 = "7th"   ;
	  $tannual = 1000  ;
		  if(isset($temp_class)){
        $data = array(
            "temp_class"     => $temp_class,
            "tannual"  => $tannual ,
            
        );
        echo json_encode($data);
?> 



<?php
include "../dbconn.php" ;
$sql = "SELECT * FROM class_wise ";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
    


        while($row = mysqli_fetch_array($result)){
          $temp_class = . $row['temp_class'] .  ;
		  $tannual = . $row['adm_Fee'] . ;
		  if(isset($amount)){
        $data = array(
            "temp_class"     => $temp_class,
            "tannual"  => $tannual ,
            
        );
        echo json_encode($data);
    }
		//	 echo "<td>" . $row['adm_fee'] . "</td>";
		//	 echo "<td>" . $row['annual_charge'] . "</td>";
		//	echo "<td>" . $row['tuition_fee'] . "</td>";
			//echo "<td>" . $row['book_charge'] . "</td>";
			//echo "<td>" . $row['stationary_charge'] . "</td>";
			//echo "<td>" . $row['diary_charge'] . "</td>";
			// echo "<td>" . $row['misc_charge'] . "</td>";         
			// echo "<td>" . $row['exam_charge'] . "</td>";
		}
					 
       
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($conn);
?>
 ----?
</body>
</html>
