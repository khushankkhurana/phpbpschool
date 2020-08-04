<html>
<head>
<body>
<?php
//$month =$_POST['monthname'] ;
$tclass = $_POST['classname'];
//echo (month) ;
include "../dbconn.php" ;
include "header.php";
 ?>
 <table>
 <?php  if ($tclass=='All')
  $head= "Balance for All Classes" ;
    else 
    $head = "Balance of class: " .$tclass ; 		
	?>
  

	  <tr>
 <td align="center"   colspan="7" style ="background-color: white;font-size:18" >
   <?php echo $head?>
 </td>
 <tr>
 </tr>
 
	<tr>
		<th>A/C NO  </th>
		<th> NAME   </th>
		<th> FATHER'S NAME</th>
		<th>MOTHER'S NAME   </th>
		 <th>CLASS NAME </th>
		<th> MOBILE NO </th>
		<th> BALANCE </th>
		</tr>
 
	<?php
	if ($tclass =='All')
		$sql = "SELECT * FROM `student` WHERE balance>0   ";
	else
 $sql = "SELECT * FROM `student` WHERE  class_name='$tclass' && balance > 0  ";
  
 
//$sql ="SELECT * FROM `student` " ;
if($result = mysqli_query($conn, $sql)){
     $tbalance = 0;
		while($row = mysqli_fetch_array($result)){
		 //			 echo $row[1] ; 
            echo "<tr>" ;
			
			echo "<td>" . $row['acno'] . "</td>";
			// echo "<td>" . date("d-m-Y", strtotime($row["paiddate"])) . "</td>";
			echo "<td>" . $row['name'] . "</td>";			
			echo "<td>" . $row['father_name'] . "</td>";
			echo "<td>" . $row['mother_name'] . "</td>";
			echo "<td>" . $row['class_name'] . "</td>";
			echo "<td>" . $row['mobile_no'] . "</td>";
			echo "<td>" . $row['balance'] . "</td>";
		//	 echo "<td>" 
			// php opening here <a href="report1.php">Print  </a> <?php "</td>";
		     echo "</tr>"	;
			
			$tbalance = $tbalance +  $row['balance'] ; 
		 
		}
		echo "<tr>" ;
		echo "<td align='right' colspan='6' style='font-size:20'>  Total  </td>";
		echo "<td style='font-size:20'>" . number_format($tbalance,2) . "</td>";
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





