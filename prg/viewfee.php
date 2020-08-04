<!DOCTYPE html>
<html>
<title>SMSP</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<button class="w3-button w3-blue w3-display-topright"  onclick="document.getElementById('id01').style.display='block'">Show Records 

</button>  


<?php
include "../dbconn.php" ;
$sql = "SELECT * FROM class_wise ORDER BY POSITION ASC";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
?>    
<div id="id01"  style="display:none">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-blue w3-display-topright">x</span>
   	
<table>		

 <tr> 
 <td  align="center"   colspan="9" style ="background-color:#a5baf0 "  > 
 SHOWING RECORDS 
 </td>
 </tr>
 <tr>
 		<th>CLASS NAME    </th>
		<th>ADMISSION FEES </th>
		<th>ANNUAL CHARGES</th>
		<th>TUITION FEES </th>
		<th> BOOKS CHARGES</th>
		<th> STATIONARY CHARGES</th>
		<th>DIARY CHARGES</th>
		<th> EXAMINATION FEE</th>
		<th> MISC CHARGES</th>
	
	</tr>

      <?php      
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                
            //  echo $row[1] ; 
             echo "<td>" . $row['class_name'] . "</td>";
			 echo "<td>" . $row['adm_fee'] . "</td>";
			 echo "<td>" . $row['annual_charge'] . "</td>";
			echo "<td>" . $row['tuition_fee'] . "</td>";
			echo "<td>" . $row['book_charge'] . "</td>";
			echo "<td>" . $row['stationary_charge'] . "</td>";
			echo "<td>" . $row['diary_charge'] . "</td>";
			echo "<td>" . $row['exam_charge'] . "</td>";
			echo "<td>" . $row['misc_charge'] . "</td>";     
		}
					 
       
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($conn);
?>
</table>
</div>
</body>
</html>
