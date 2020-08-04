<?php
session_start() ;
$schoolname = $_SESSION['schoolname'];
$line1 = $_SESSION['line1'];
$logo = $_SESSION['logo'];
//echo $line1 ;
// call from reportmain1.php
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
	
		
		


<?php
$acno = $_POST['acno'] ;
//$acno=$_GET['acno'];
//$id= $_GET['id'];
//$id = $_POST['id'] ;
// include 'menu.php';
//$acno=1001 ;
//$id = 1 ;
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include '../dbconn.php' ;
$con=0;
// Attempt select query execution
$sql = "SELECT * FROM `student`  WHERE student.`acno`= $acno ";
   if($result = mysqli_query($conn, $sql))
			
		while ($Row =mysqli_fetch_array($result)){ 
$name = $Row['name'] ;
		$fathername = $Row['father_name'];
		$classname = trim($Row['class_name']) ;
		$balance = $Row['balance']; 
 
		
		$acno = $Row['acno'];
		$newold = $Row["newold"];
?>		
		<img style align="left" width="100" height="100" id="image" src="<?php echo $logo ?>" alt="logo"  />  
		 <br>
		<p style="font-size:16" > <?php echo $schoolname ?></p>
		<p> <?php echo $line1 ?> </p>
		
        <table border="1px">
		<tr>	
		 <th colspan="2"> Account No </th>
		  <th colspan="2"> Student Name </th>
		  <th colspan="2"> Father's Name </th>
		  <th colspan="2"> Class </th>
		  </tr>
		   <tr>
		   <td colspan="2"> <?php echo  $acno  ?> </td> 
		    <td colspan="2"> <?php echo  $name  ?> </td> 
			<td colspan="2"> <?php echo $fathername ?> </td>
			<td colspan="2"> <?php echo $classname ?> </td>
			</tr>
			<tr>
			 <th> Receipt No </th>
			<th> Paid Date </th>
			<th> Paid Month </th>
			<th> Total </th>
			<th> Less Disc. </th>
			<th> Net Payable </th>
			<th> Paid  </th>
			 <th> Balance </th>
			 </tr>
	<?php	}

$sql = "SELECT * FROM `student` INNER JOIN `transaction` ON student.acno=transaction.acno WHERE student.`acno`= $acno ";
   if($result = mysqli_query($conn, $sql))
			
		while ($Row =mysqli_fetch_array($result)){ 
		
	
		
				$balance = $Row['tbalance'] ;
				$paid = $Row['paid'] ;
				//$paid = 17232 ;
				$paiddate = $Row['paiddate'];
				$paidmonth	= $Row['paidmonth'];
			$nmonth = date('m',strtotime($paidmonth));
			$pbalance = $Row['pbalance'];
				$id = $Row['id'] ;
				
				//echo ($paidmonth) ;
				//echo ($nmonth) ; 
						
				$admfee = $Row['adm_fee'] ;
				$annual = $Row['annual_charge'];
				$stationary =  $Row['stationary_charge'];
				$book = $Row['book_charge'];
				$diary = $Row['diary_charge']; 
				//$Row['diary_charge'];
				$book = $Row['book_charge'] ;
				$tuition = $Row['tuition_fee'];
						 
				$splconcession =$Row['spl_concession'] ;
				 $exam = $Row['exam_charge'] ;
				 $misc = $Row['misc_charge'];	 
				$concession = $Row['tconcession'];
		$splconcession = $Row['tspl_concession'];
				$concharge = $Row['ttransport'] ;
				// Free result set
				// mysqli_free_result($result);
		   
		$total=$admfee  + $annual + $tuition + $stationary+ $book+$diary + $misc + $concharge + $pbalance +$exam;
				
				$disc = $concession  ;
				$net  = $total - $disc -$splconcession ;
				$disc = $disc + $splconcession ;		
		 // Close connection
		 //mysqli_close($conn);
		
$currendate = date("d-m-Y") ;
$con=$con+1 ;	
 
	
?>

   		
			 <tr>
			 <td> <?php echo $id ?></td>
			 <td><?php echo date("d-m-Y", strtotime($paiddate)) ?> </td>
			 <td> <?php echo $paidmonth ?></td>
		 	 <td> <?php echo (number_format($total,2)) ?> </td>
			 <td> <?php echo (number_format($disc,2)) ?> </td>
			 <td> <?php echo (number_format($net,2)) ?> </td>
			 <td> <?php echo (number_format($paid,2)) ?> </td>
			  <td> <?php echo (number_format($balance,2)) ?> </td>
				</tr>

		

	
		<?php } ?>	
		
	</table>
		
	
</body>
</html>