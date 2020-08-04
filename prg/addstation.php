<?php 

?> 


<!DOCTYPE html>
<html>
<head>
<body onload="getDate()">
 <style>
 thead {color:green;}
tbody {color:blue;}
tfoot {color:red;}

   table,   th, td {
        padding: 10px ;
        border: 2px solid red; 
		border-collapse : collapse ;
		margin-left : 150;
		
		 }
.my
{
	font-size:12pt;
	height:30px;
	border : 1px solid blue;
	width: 85px;
		}	
	.my1
{
	font-size:12pt;
	height:30px;
	border : 1px solid blue;
	width: 200px;
	}	
	 .my2
{
	font-size:12pt;
	height:30px;
	border : 1px solid blue;
	width: 100px;
	}
	.my4
{
	font-size:12pt;
	height:30px;
	border : 1px solid blue;
	width: 70px;
	}	
.my5
{color: RED ;
	font-size:12pt ;
	font-color : blue ;
	font-weight: bold ;
	height:30px;
	border : 1px solid blue;
	width: 85px;
	background-color:#72A4D2 ; 
	}		
.button {
	background-color: brown;
	border-radius: 10px;
	color: white ;
	position: absolute;
	width : 100px;
	height:50px;
  	top: 120%;
  	left: 70%;
	margin-left: -320px;
  	margin-top: -320px;
 
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: larger ;
  
}
.button1 {
	background-color: brown;
	border-radius: 8px;
	color: white;
	position: absolute;
  	top: 133%;
  	left: 70%;
	margin-left: -320px;
  	margin-top: -320px;
  padding: 15px 20px;
  text-align: center;
  text-decoration: none;
   font-size: 16px;
  
div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
  
  
 }
</style>
	
	
<?php
		
		//include   'top.php' ;
		include 'menu.php';
		//include 'grno.php'; 
		//include 'truck.php';
		//include 'party.php';
		//include 'station.php';

?>
<?php
include 'viewtransport.php' ;
?>

<br>
<br>
<a width="300" align="right"  href="delstation.php">  <h6 align="center"> Delete</h6> </a> >
<form action="" method ="post"  id="form1" name="form1" onload="getDate()">

<table align="center" >
 <tr> 
 <td  align="center" colspan="2"   style ="background-color: #ede1e7"  > 
 ADDING STATION RECORDS 
 </td>
 </tr>
 
 <th> Enter Station Name </th>
 
 <td>
 <input type="text" id="station" name="station" value="" maxlength="30" class="my1"  >
 </td>
 </tr>
  <tr> 
<td colspan="2" style ="background-color: #ebb5ce" ></td>
</tr>
 <tr>
 

<th> Enter Charges </th>
<td>
 
 <input type="text" id="rate" name="rate" value="0"     class="my1" >
 </tr>
 
 <button class="button" onclick="" type="submit" form="form1" name="Submit" id="Submit" value="Submit">Submit  </button>
 
</table>
</form>


<!---{function myFunction() {
//	  var x1 = document.getElementById("result");
// var x2 = document.getElementById("fname");
 // x1.value= x2.value/2 ;
//}
 //document.getElementById("result").innerHTML = x1;
 // document.getElementById("result").value =  = "dfsdfsdf";
  // x1.value = x1.value.toUpperCase();
  // alert(x1.value) ;


</script>
-->
</head>
<?php

if (isset($_POST['Submit']))
{
$station1 = $_POST['station'];
$rate= $_POST['rate'];
include '../dbconn.php' ;
			
				$sql1="SELECT * FROM transport WHERE  station='$station1'" ;
				$result=mysqli_query($conn,$sql1);
				$row_cnt = $result->num_rows;
				if  ($row_cnt>0)  
				{ ?> <script>
			     alert("This Record  Alreay Exist !");
				 window.history.back();
				 </script>
				<?php }
					else
		$sql1 = "INSERT INTO  transport (`station`,`charges`) VALUES ('$station1', '$rate')" ;
	 			
	// $sql = "INSERT INTO `file1`(`grno`, `date`, `party`, `station`) VALUES ($grno,'$date','$party','$station')";
	$result = mysqli_query( $conn, $sql1);
	//echo "<select name='partyname'>";
if(! $result ) {
               die('Could not enter data: ' . mysqli_error());
            }
            
			            // echo "Entered data successfully\n";
            //$message = '<div style="text-align: center;>The username or password you entered are not good.</div>';
            $message="Record Enter Successfully" ;
			//echo "<script> alert('$message');</script>";
			mysqli_close($conn);
// header ("location: addtruck.php" ) ;

}

?> 
				

</body>
</html>
