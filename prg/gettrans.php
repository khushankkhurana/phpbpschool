<html>
<head>
<body>

<?php
$acno =$_POST['tacno'] ;
include "../dbconn.php" ;
$ex =Array() ;
$sql = "SELECT * FROM `transaction` where `acno`= $acno";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){ 
?>    

   	

      <?php      
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
			$edate = date("d-m-Y", strtotime($row["paiddate"]));
               $ex[] = $row['id']." ". $row['acno']. " " .$edate." ".$row['paidmonth'] ." ". $row['paid']. " ". $row['tbalance'] ;
		}
		$result = mysqli_query($conn, $sql);
?>
	<table>		

 <tr> 
 <td  align="center"   colspan="7" style ="background-color: white"  > 
 SHOWING RECORDS 
 </td>
 </tr>
 <tr>
		<th> SLIP NO </th>
		<th>A/C NO  </th>
		<th> PAYMENT DATE   </th>
		<th> PAID MONTH</th>
		<th>PAID AMT  </th>
		<th> BALANCE </th>
		<th> PRINT </th>	
	</tr>
<?php
		
		while($row = mysqli_fetch_array($result)){
		 //			 echo $row[1] ; 
		
            echo "<tr>" ;
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['acno'] . "</td>";
			 echo "<td>" . date("d-m-Y", strtotime($row["paiddate"])) . "</td>";
			 echo "<td>" . $row['paidmonth'] . "</td>";
			echo "<td>" . $row['paid'] . "</td>";
			echo "<td>" . $row['tbalance'] . "</td>";
		//	 echo "<td>" 
			echo "<td><a href='report8.php?id=".$row['id']."&acno=".$row['acno']." ' target=_blank > Print</a></td>";
			//echo "<td><a href="report1.php> $row['id']</a></td>"; 
			  //echo "<td> <a href="report1.php ?id=$row['id']" >Print  </a>  </td>";
		     echo "</tr>"	;
		}
		echo "</table>" ;
	
	
	


 
		 
		
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
}}
 else{
    echo "Record does not exist " ;
}

// Close connection
mysqli_close($conn);

?>
</head>
</body>
</html>



