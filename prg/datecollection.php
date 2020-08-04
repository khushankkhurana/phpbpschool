<html>
<head>
<body>
<?php
$startdate =$_POST['startdate'] ;
$enddate = $_POST['enddate'];
$nstartdate =date("d-m-Y", strtotime($startdate));
$nenddate =date("d-m-Y", strtotime($enddate));
$total=0;
$totbalance=0;
//echo ($startdate) ;
include "../dbconn.php" ;
 
 
 include "header.php"; 
 ?>
 <table width="750px">
 
 
  <tr>
 <td align="center"   colspan="7" style ="background-color: white;font-size:22" >
 Fees collection From  <?php echo $nstartdate?> to <?php echo $nenddate?>
 </td>
 </tr>
	 
 
	<tr>
		<th>A/C NO  </th>
		<th> NAME   </th>
		<th> FATHER'S NAME</th>
		<th> Paid Date </th>
		<th> Paid Month </th>
		<th> Paid Amount </th>
		<th> Balance </th>
		</tr>
 
	<?php
	
 $sql = "SELECT * FROM `student` INNER JOIN `transaction` ON student.acno=transaction.acno WHERE `paiddate` >= '$startdate' && `paiddate` <= '$enddate' ";
 
//$sql ="SELECT * FROM `student` " ;
if($result = mysqli_query($conn, $sql)){
    
		while($row = mysqli_fetch_array($result)){
		 //			 echo $row[1] ; 
            echo "<tr>" ;
			
			echo "<td>" . $row['acno'] . "</td>";
			// echo "<td>" . date("d-m-Y", strtotime($row["paiddate"])) . "</td>";
			echo "<td>" . $row['name'] . "</td>";			
			echo "<td>" . $row['father_name'] . "</td>";
			echo "<td>" .date("d-m-Y", strtotime($row['paiddate'])) . "</td>";
			echo "<td>" . $row['paidmonth'] . "</td>";
			echo "<td>" . $row['paid'] . "</td>";
			echo "<td>" . $row['balance'] . "</td>";
		//	 echo "<td>" 
			// php opening here <a href="report1.php">Print  </a> <?php "</td>";
		     echo "</tr>"	;
			$total=$total + $row['paid'] ;
			$totbalance = $totbalance + $row['balance'] ;
		 
		}
		echo "<tr>" ;
		echo "<td align='right' colspan='5' >  TOTAL </td>";
		echo "<td>"  .number_format($total,2).  "</td>";
		echo "<td>"  .number_format($totbalance,2).  "</td>";
		echo "</tr>" ;
		 echo "</table>" ;
		
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
}
 
 

// Close connection
mysqli_close($conn);

?>
</body>
</head>
</html>





