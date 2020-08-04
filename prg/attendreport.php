<?php
session_start() ;
//$schoolname = $_SESSION['schoolname'];
//$line1 = $_SESSION['line1'];
//echo $line1 ;

?>
<html>
<head>
<body>
<?php
$startdate =$_POST['startdate'] ;
$enddate = $_POST['enddate'];
$tclass = $_POST['tclass'];
echo $tclass ;
$nstartdate =date("d-m-Y", strtotime($startdate));
$nenddate =date("d-m-Y", strtotime($enddate));
$total=0;
$totbalance=0;
//echo ($startdate) ;
include "../dbconn.php" ;
 
 

// count the size of attendance
$holiday = Array() ;
$sql = "SELECT * FROM  holidays";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){
$holiday[] = date("Y-m-d", strtotime($row['date_of_holiday']));
}
$sizeholi = count($holiday) ;	
$start = date("Y-m-d", strtotime($startdate)) ;
$end = date("Y-m-d", strtotime($enddate)) ;
//echo $end ;
//echo $start ;
$sunday =0 ;
$start=$startdate ;
$totday = 0 ;
$holi=0 ;
while($start <= $end) {
//echo $start . "--";
$count1 =0 ;
while ($count1 < $sizeholi){
	//echo $holiday[$count1];
	//echo $start ;
    if ($holiday[$count1] == $start) 
	{ $holi =$holi +1 ; 
       	}
		$count1 = $count1 +1 ;
   }	   
$checkdate= date('D' ,strtotime($start)) ;
if ($checkdate == "Sun")
	$sunday = $sunday +1 ;
$start1 =  date("Y-m-d", strtotime("$start +1 day"));
$start = $start1 ;
$totday = $totday +1;	
 
 }
// echo $sunday ;
// echo $totday ;
// echo $holi ;
$totday  = $totday - $sunday - $holi ;
// echo $enddate ;
 
 ?>
 <table style="margin-left:250">
 
<!-- <tr>
 <td align="center"   colspan="7" style ="background-color: white;font-size:22" >
<?php// php echo $schoolname?> 
 </td>
  </tr>-->
  <tr>
 <td align="center"   colspan="7" style ="background-color: white;font-size:22" >
 Attendance From  <?php echo $nstartdate?> to <?php echo $nenddate?>
 </td>
 </tr>
	 
 
	<tr>
		<th>A/C NO  </th>
		<th> NAME   </th>
		<th> FATHER'S NAME</th>
		<th>Total Working Days</th>
		<th> Attended Days </th>
		<th> Percentage </th>
		</tr>
 
	<?php
	
 $sql = "SELECT * FROM `student` where class_name = '$tclass' ";
 
//$sql ="SELECT * FROM `student`  " ;
if($result = mysqli_query($conn, $sql)){
    
		while($row = mysqli_fetch_array($result)){
		 //			 echo $row[1] ; 
		 $acno = $row['acno'];
            $sql_query = "select count(*) as totattend from attendance where acno='".$acno."' ";
  $result1 = mysqli_query($conn,$sql_query);
  $row1 = mysqli_fetch_array($result1);

  $count1 = $row1['totattend'];
    $count1 = $totday - $count1 ;
	$percent = $count1/$totday*100 ;
			echo "<tr>" ;
			
			echo "<td>" . $row['acno'] . "</td>";
			// echo "<td>" . date("d-m-Y", strtotime($row["paiddate"])) . "</td>";
			echo "<td>" . $row['name'] . "</td>";			
			echo "<td>" . $row['father_name'] . "</td>";
			echo "<td>" . $totday . "</td>";
			echo "<td>" . $count1 . "</td>";
			echo "<td>" . number_format($percent,2). '%' .  "</td>";
		//	 echo "<td>" 
			// php opening here <a href="report1.php">Print  </a> <?php "</td>";
		     echo "</tr>"	;
			
		 
		}
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