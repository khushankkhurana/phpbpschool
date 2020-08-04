<html>
<head>
<body>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse :collapse;
  font-size:18;
  margin-left:50;
  margin-top :50 ;
  
}
td{
	height :80 ;
}

@page { size: auto;  margin: 20mm; }
 @media print
        {
            tbody {
                page-break-inside: avoid;
            }
            thead {
                display: table-header-group;
                margin-top: 50px;
            }
        }
</style>


<?php
$token=$_GET['start'];
$ar=Array();
$token = strtok($token, ",");
$ar[]=$token ; 
while ($token !== false)
   {
   //echo "$token<br>";
   $token = strtok(",");
   $ar[]=$token ; 
   }
$startdate =$ar[0] ;
$enddate = $ar[1];
$nstartdate =date("d-m-Y", strtotime($startdate));
$nenddate =date("d-m-Y", strtotime($enddate));

$total=0;
$totbalance=0;
//echo ($startdate) ;
include "../dbconn.php" ;

/* 
Basic instantiation and usage 
*/ 



?> 
<?php include "header.php"  ?>
 <div id="canvas" >
 <table width="750px" >
 
  <tr>
 <td align="center"   colspan="7" style ="background-color: white;font-size:22" >
 Fees collection From  <?php echo $nstartdate?> to <?php echo $nenddate?>
 </td>
 </tr>

 
	<thead> 
 
	<tr>
		<th>A/C NO  </th>
		<th> NAME   </th>
		<th> FATHER'S NAME</th>
		<th>Paid Date   </th>
		<th> Paid Month </th>
		<th> Paid Amount </th>
		<th> Balance </th>
		</tr>
 </thead>
	<?php
	
 $sql = "SELECT * FROM `student` INNER JOIN `transaction` ON student.acno=transaction.acno WHERE `paiddate` >= '$nstartdate' && `paiddate` <= '$nenddate' ";
 
//$sql ="SELECT * FROM `student` " ;
if($result = mysqli_query($conn, $sql)){
    
		while($row = mysqli_fetch_array($result)){
		 //			 echo $row[1] ; 
            echo "<tr>" ;
			
			echo "<td >" . $row['acno'] . "</td>";
			// echo "<td>" . date("d-m-Y", strtotime($row["paiddate"])) . "</td>";
			echo "<td>" . $row['name'] . "</td>";			
			echo "<td>" . $row['father_name'] . "</td>";
			echo "<td>" .date("d-m-Y", strtotime($row['paiddate'])) . "</td>";
			echo "<td>" . $row['paidmonth'] . "</td>";
			echo "<td style='text-align:right'>" . $row['paid'] . "</td>";
			echo "<td style='text-align:right'>" . $row['balance'] . "</td>";
		//	 echo "<td>" 
			// php opening here <a href="report1.php">Print  </a> <?php "</td>";
		     echo "</tr>"	;
			$total=$total + $row['paid'] ;
			$totbalance = $totbalance + $row['balance'] ;
		 
		}
		echo "<tr>" ;
		echo "<td align='right' colspan='5' >  TOTAL </td>";
		echo "<td style='text-align:right'>"  .number_format($total,2).  "</td>";
		echo "<td style='text-align:right'>"  .number_format($totbalance,2).  "</td>";
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
</div>
<!--<Input type="button" onclick="btnExportToPDF" id="btnExportToPDF" />
-->
<script> 
// document.title = "my title "; window.print(); 
</script>
</body>
</head>
</html>
