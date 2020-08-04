<html>
<head>
<body>
<script type="text/javascript"  src="../js/jquery321.js"> 
<script  type="text/javascript">
$(document).ready(function() {
jQuery('#Export to excel').bind("click", function() {
var target = $(this).attr('id');
switch(target) {
	case 'export-to-excel' :
	$('#hidden-type').val(target);
	//alert($('#hidden-type').val());
	$('#export-form').submit();
	$('#hidden-type').val('');
	break
}
});
    });
</script>
<?php
//$month =$_POST['monthname'] ;
//$tclass = $_POST['classname'];
$month="April" ;
$tclass="LKG";
//echo (month) ;
include "../dbconn.php" ;
 ?>
 <div><a href="javascript:void(0)" id="export-to-excel">Export to excel</a></div>
 <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" id="export-form">
 <table>
 <tr>
 <td align="center"   colspan="5" style ="background-color: white;font-size:22" >
 Fees not deposit for the month of <?php echo $month?>
 </td>
 </tr>
 <tr>
 <td align="center"   colspan="5" style ="background-color: white;font-size:22" >
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
	
 $sql = "SELECT * FROM `student` INNER JOIN `transmonth` ON student.acno=transmonth.acno where $month = 2 && student.class_name='$tclass'";
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
</form>
</body>

</head>
</html>





