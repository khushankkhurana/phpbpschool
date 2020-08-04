<?php
$acno =$_POST["acno"] ;
$month= $_POST["month"] ;
$amtdeposit= $_POST["amtdeposit"];
$monthNum  = $month +1;
$monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
$pbalance =$_POST["nbalance"];
$balance =$_POST["balance"] ;
$monthName =strtoupper($monthName) ;
$edate = date("Y-m-d", strtotime($_POST["edate"]));  
$admfee = $_POST["admfee"];
$annual = $_POST["annual"];
$tuition = $_POST["tuition"];
$bookcharge=$_POST["bookcharge"];
$stationary =$_POST["stationarycharge"];
$diarycharge =$_POST["diarycharge"];
$examfee = $_POST["examcharge"];
$misc = $_POST["misccharge"];
$transport=$_POST["charges"];
$concession = $_POST["concession"];
$special = $_POST["splconcession"];
$classname= $_POST["tclass"];
$paymentmode= $_POST["cash"];
$chequeno = $_POST["chno"];
$bankname = $_POST["bankname"];
//echo $annual;
//exit($bankname);
include '../dbconn.php' ;
  $sql1="SELECT * FROM `transmonth` WHERE `acno` = $acno " ;
				$result=mysqli_query($conn,$sql1);
				{ 
$sql1="UPDATE `transmonth` SET  $monthName =1 WHERE `acno` = $acno " ; 

$result = mysqli_query( $conn, $sql1);
				}

				
				
		$sql1="SELECT * FROM `transaction`" ;
		$result=mysqli_query($conn,$sql1);
	$sql2 ="INSERT INTO `transaction`(`acno`,`tclass_name`, `paid`, `paiddate`, `paidmonth`,`pbalance`,`tbalance`,`adm_fee`,`annual_charge`,`tuition_fee`,`book_charge`,`stationary_charge`,`diary_charge`,`exam_charge`,`misc_charge`,`ttransport`,`tconcession`,`tspl_concession`,`payment_mode`,`cheque_no`,`bankname`) VALUES ($acno ,'$classname',$amtdeposit,'$edate' , '$monthName' ,$pbalance,$balance,$admfee,$annual,$tuition,$bookcharge,$stationary,$diarycharge,$examfee,$misc,$transport,$concession,$special,'$paymentmode','$chequeno','$bankname' )" ;
 	$result = mysqli_query( $conn, $sql2);
		$id = $conn->insert_id;
		$sql1="SELECT * FROM `student` WHERE `acno` = $acno" ;		
$sql1="UPDATE `student` SET balance = $balance WHERE `acno` = $acno " ; 
$result=mysqli_query($conn,$sql1);
if(! $result ) {
               die('Could not enter data: ' . mysqli_error());
            }
            
			{          
            $message="Record Enter Successfully" ;
			echo "<script> alert('$message');</script>";
			mysqli_close($conn);
				header ("location: monthpay.php" ) ;
				
					//echo '<a href="report1.php?id=$id&acno=$acno"> Print</a>'  ;
					}
?>

