<?php 
session_start() ;
// echo "RAJDHANI EXPRESS ".$_SESSION["company"];
$compname = $_SESSION['company'];
$fileno =$_SESSION['file'] ;
$file="file".$fileno ;
$party ="party".$fileno ;
$truck ="truck".$fileno ;
$station ="station".$fileno ;
// include 'menu.php' ;
echo "RAJDHANI EXPRESS               [ ".  $compname. " ]"  ;
echo  "<br>" ;
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
        padding: 20px ;
        border: 2px solid red; 
		border-collapse : collapse ;
		margin : 30px;
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
	background-color: #008CBA;
	border-radius: 8px;
	color: red;
	position: absolute;
  	top: 125%;
  	left: 35%;
	margin-left: -320px;
  	margin-top: -320px;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
   cursor: key;
}.button1 {
	background-color: #008CBA;
	border-radius: 8px;
	color: red;
	position: absolute;
  	top: 133%;
  	left: 70%;
	margin-left: -320px;
  	margin-top: -320px;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
   font-size: 16px;
  
div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
  margin-top:70%;
  margin-left:50%;
 }
</style>
	
	
<?php
		
		//include   'top.php' ;
		include 'menu.php';
		//include 'grno.php'; 
		//include 'truck.php';
		include 'party.php';
		//include 'station.php';
?>
<div>
<form action="" method ="POST"  id="form1" name="form1" onload="getDate()">
<table align="left|right|center" >
 <tr> 
 <td  align="center" colspan="2"   style ="background-color: #FFFF66"  > 
 ADDING PARTY RECORDS 
 </td>
 </tr>
 
 <th> Enter Party Name  </th>
 
 <td>
 <input type="text" id="tparty" name="tparty" value="" maxlength="30" class="my1"  autofocus >
 </td>
 </tr>
  <tr> 
<td colspan="2" style ="background-color: #FFFF66" ></td>
</tr>
 


 
 <button class="button" onclick="" type="submit" form="form1" name="Submit" id="Submit" value="Submit">Submit  </button>
 
</table>
</form>
</div>

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
		
$partyname = $_POST['tparty'];
include '../dbconn.php' ;


				
				$sql1="SELECT * FROM $party WHERE  partyname='$partyname'" ;
				$result=mysqli_query($conn,$sql1);
				$row_cnt = $result->num_rows;
				if  ($row_cnt>0)  
				{ ?> <script>
			     alert("This Party No  no Alreay Exist !");
				 window.history.back();
				 </script>
				<?php }
					else
		$sql1 = "INSERT INTO  $party (`partyname`) VALUES ('$partyname')" ;
	 			
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
