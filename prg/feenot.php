<html>
<head>
<body>
<?php
$month =$_POST['monthname'] ;
$tclass = $_POST['classname'];
//echo (month) ;
include "../dbconn.php" ;
 
 ?>
 <table style="border:black solid">
 <?php  if ($month!=''){?>
  <tr>
 <td align="center"   colspan="5" style ="font-size:20" >
 Fees not deposit for the month of <?php echo $month?>
 </td>
 </tr>

 <?php  } 
  
	 ?>
	  <tr>
 <td align="center"   colspan="5" style ="font-size:16" >
  Class:  <?php echo $tclass?>
 </td>
 <tr>
 </tr>
 
	<tr>
		<th>A/C NO  </th>
		<th> NAME   </th>
		<th> FATHER'S NAME</th>
		<th>MOTHER'S NAME   </th>
		<th> MOBILE NO </th>
		
		</tr>
 
	<?php
	if ($month!='')
 $sql = "SELECT * FROM `student` INNER JOIN `transmonth` ON student.acno=transmonth.acno where $month = 2 && student.class_name='$tclass'";
  else
	   $sql = "SELECT * FROM `student` INNER JOIN `transmonth` ON student.acno=transmonth.acno where  student.class_name='$tclass'";
 
//$sql ="SELECT * FROM `student` " ;
if($result = mysqli_query($conn, $sql)){
    
		while($row = mysqli_fetch_array($result)){
		 //			 echo $row[1] ; 
            echo "<tr>" ;
			
			echo "<td>" . $row['acno'] . "</td>";
			// echo "<td>" . date("d-m-Y", strtotime($row["paiddate"])) . "</td>";
			echo "<td>" . $row['name'] . "</td>";			
			echo "<td>" . $row['father_name'] . "</td>";
			echo "<td>" . $row['mother_name'] . "</td>";
			echo "<td>" . $row['mobile_no'] . "</td>";
		//	 echo "<td>" 
			// php opening here <a href="report1.php">Print  </a> <?php "</td>";
		     echo "</tr>"	;
		
		 
		}
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





