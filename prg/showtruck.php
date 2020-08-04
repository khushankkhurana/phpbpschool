<?php 
session_start() ;
// echo "RAJDHANI EXPRESS ".$_SESSION["company"];
$compname = $_SESSION['company'];
//$file = $_SESSION['file']  ;
$fileno =$_SESSION['file'] ;
$file="file".$fileno ;
$party ="party".$fileno ;
$truck ="truck".$fileno ;
$station ="station".$fileno ;
// include 'menu.php' ;
echo "RAJDHANI EXPRESS               [ ".  $compname. " ]  " .$file  ;
echo  "<br>" ;
?> 
<html>
<head>
<body>
<style>
table,   th, td {
		
        padding: 10px ;
        border: 1px solid red; 
		border-collapse : collapse ;
		margin : 20px;
		table-layout : fixed;
}

td {
  padding: 10px;
  border: 2px solid blue ;
  
}

th {
  padding: 10px;
  border: 2px solid blue ;
  font-size: 20px  ;
  
text-align : left ;
}
</style>
<?php
include 'menu.php';
include '../dbconn.php'; 
$sql = "SELECT * FROM $truck";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
?>    
<table >
 <tr> 
   <td   align="center"  colspan="27"   style ="background-color: #FFFF66; font-size:30px"  > 
 SHOWING RECORDS 
 </td>
 </tr>
 <tr>
		<th>TRUCK  No. </th>
		<th>PARTY NAME     </th>
		<th>PAN NUMBER</th>
		
		</tr>
      <?php      
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['truckno'] . "</td>";
               
             echo "<td>" . $row['partyname'] . "</td>";
			 echo "<td>" . $row['panno'] . "</td>";
			         }
       
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
?>
</body>
</head>
</html>
