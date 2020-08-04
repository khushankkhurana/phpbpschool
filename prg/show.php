<?php 
session_start() ;

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
		font-size : 14px ;
		margin-left:300px;
}

td {
  padding: 10px;
  border: 1px solid blue ;
  
}

th {
  padding: 10px;
  border: 1px solid grey ;
  font-size: 14px  ;
  
text-align : left ;
}
</style>
<script>
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
						
						
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		</script>
<?php
include 'menu.php';
$path = "/image/"  ;
//echo getcwd() ;
				//chdir("..\image");
	//			echo getcwd() ;
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include '../dbconn.php' ;
$sql = "SELECT * FROM student";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
?>    
<table >
 <tr> 
   <td   align="center"  colspan="27"   style ="background-color: #e8e1e6; font-size:20px"  > 
 SHOWING RECORDS 
 </td>
 </tr>
 <tr>
		<th>A/C No. </th>
		<th>NAME    </th>
		<th>FATHER'S NAME</th>
		<th >MOTHER'S NAME </th>
		<th>DATE OF BIRTH </th>
		<th> CLASS  </th>
		<th> MOBILE NO </th>
		<th>PHOTO  </th>
		
		
		</tr>
      <?php     
  $x=0	  ;
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['acno'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['father_name'] . "</td>";
				echo "<td>" . $row['mother_name'] . "</td>";
				echo "<td>" . date("d/m/Y", strtotime($row['date_of_birth'])) . "</td>";
                echo "<td>" . $row['class_name'] . "</td>";
				echo "<td>" . $row['mobile_no'] . "</td>";
				$pic =  $row['filename'] ;
				 $pic = "../image/".$pic;
			//$pic ="fees/image/smiley.gif" ;
				//echo ($pic) ;
				//chdir("..\image");
				//echo getcwd(); 	
		///echo "<td>". <img src= echo  $pic ;  >  . "</td>" ;
				echo "<td>". '<img src="'.$pic.'" alt="ADADS" width="20";height="20" />'  ."</td>";
				
				//echo '<img src= $pic  >'; 
				
				
				  
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

// <div>
// <img src="/fees/image/penguins.jpg" alt="ddfsfds" width="50" height="50"/>

// </div>
?>

</body>

</head>
</html>
