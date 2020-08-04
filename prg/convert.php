<?php 


// include 'menu.php' ;
// echo "RAJDHANI EXPRESS               [ ".  $compname. " ]  " .$file  ;
echo  "<br>" ;
?> 
<html>
<head>
<body>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
table.center {
  margin-left:auto; 
  margin-right:auto;
}

</style>
<?php
// include 'menu.php';
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include '../dbconn.php' ;
// Attempt select query execution
$sql = "SELECT * FROM `student` where `acno`=1001   ";
if($result = mysqli_query($conn, $sql))
    
while ($row =mysqli_fetch_array($result)){ 
//echo ($row['name']);
$classname = trim($row['class_name']) ;
//echo ($classname) ;
			}
     $sql = "SELECT * FROM `transaction` where `acno`=1001   ";
if ($result = mysqli_query($conn, $sql)) 
//	echo ($classname) ;
        while($row = mysqli_fetch_array($result)){
        
		$balance = $row['balance'] ;
		$paid = $row['paid'] ;
		$paiddate = $row['paiddate'];
		$paidmonth	= $row['paidmonth'];
	
		}
		
		$sql = "SELECT * FROM `class_wise` WHERE  trim(class_name) = '$classname'   ";
if($result = mysqli_query($conn, $sql)) 
	    while($row = mysqli_fetch_array($result)){
        $admfee = $row['adm_fee'] ;
		$annual = $row['annual_charge'];
		$stationary =  $row['stationary_charge'];
		$book = $row['book_charge'];
		$diary = $row['diary_charge'];
		$book = $row['book_charge'] ;
		$tuition = $row['tuition_fee'];
		$exam =  $row['exam_charge'] ;
		$misc = $row['misc_charge'] ;
		
		}
		// Free result set
        // mysqli_free_result($result);
   
	
 
// Close connection
// mysqli_close($conn);
?>
<table class="center">
		<tr> 
			<th> S.No. </th> 
			<th>PARTICULARS </th>
			<th> AMOUNT  </th>
		</tr>	
		 <tr>
		  <td>  1. </td>
		  <td> Admission Fee </td>
		  <td> <?php echo ($admfee) ?> </td> 
		  </tr>
		  <tr>
		  <td>  2. </td>
		  <td> Annual charges </td>
		  <td> <?php echo ($annual) ?> </td>
		  </tr>
		  <tr>
		  <td>  3. </td>
		  <td> Tuition Fees </td>
		  <td> <?php echo ($tuition) ?> </td>
		  </tr>
		  <tr>
		  <td>  4. </td>
		  <td> Book Charges </td>
		  <td> <?php echo ($book) ?> </td>
		  </tr>
		  <tr>
		  <td>  5. </td>
		  <td> Stationary Charges </td>
		  <td> <?php echo ($book) ?> </td>
		  </tr>
		  <tr>
		  <td>  6. </td>
		  <td> Diary Charges </td>
		  <td> <?php echo ($diary) ?> </td>
		  </tr>
		  <tr>
		  <td>  7. </td>
		  <td> Exam Charges </td>
		  <td> <?php echo ($exam) ?> </td>
		  </tr>
		  <tr>
		  <td>  8. </td>
		  <td> Misc. Charges </td>
		  <td> <?php echo ($misc) ?> </td>
			</table>

</body>
</head>
</html>
