<?php



$res= Array() ;
//$q = $_GET['q'] ;
// $search =$_POST['search'] ;
include "../dbconn.php" ;
if(isset($_POST["query"])){
$search = mysqli_real_escape_string($conn, $_POST["query"]);
$query = "SELECT * FROM student  where acno  LIKE  '%$search%'  OR  `name` LIKE  '%$search%' OR `father_name` LIKE '%$search%' " ;
 
$result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
	// echo "This Account No already Exist";
	$Result1    =    mysqli_fetch_array($result);	
   $res1 = $Result1['acno'];
   $res2 = $Result1['name'] ;
 $res3 = $Result1['class_name'] ;
 $res4  = $Result1['father_name'] ;
$res5 = $Result1['mobile_no'] ;
$res6 = $Result1['filename'] ; 
$res7 = $Result1['mother_name'] ;
$res8 = $Result1['gender'] ;
$res9 = $Result1['transport']; 
$res10 = $Result1['concession'] ;
$res11 = $Result1['spl_concession'];
$res12 = $Result1['balance'];
$res = Array($res1,$res2,$res3,$res4,$res5,$res6,$res7,$res8,$res9,$res10,$res11,$res12);
//  echo $res ;
//$res =  array('name' => '$res1' => 'fathername' ; '$res2');
//$res[0] = $result1['name'];
//$res[1] = $result1['father_name'];
// echo $res[0] ;
// echo $res [1] ;
// echo $res ;	 
	mysqli_free_result($result);
    } else{
        $res= "New Account";
    }
} else{
    // echo "ERROR: Could not able to execute  " . mysqli_error($link);
}
 
// Close connection
//return $res ; 
echo json_encode($res) ;
mysqli_close($conn);





?>
