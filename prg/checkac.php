<!DOCTYPE html>
<html>


<body>

 


<?php
//$q = $_GET['q'] ;
// $search =$_POST['search'] ;
include "../dbconn.php" ;
if(isset($_POST["query"])){
$search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM student  where acno =  '$search' "; 
//LIKE  '%$search%'  " ;
 
$result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
	echo "This Account No already Exist";
        mysqli_free_result($result);
    } else{
        echo "New Account";
    }
} else{
    // echo "ERROR: Could not able to execute  " . mysqli_error($link);
}
 
// Close connection
mysqli_close($conn);

?>

</body>
</html>