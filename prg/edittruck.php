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
$res = "" ;
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
  padding: 11px 25px;
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
  	top: 125%;
  	left: 50%;
	margin-left: -320px;
  	margin-top: -320px;
  padding: 11px 25px;
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
	<script>
	var input = document.getElementById("form1");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("Submit").click();
  }
});
</script>
	
<?php
		if (isset($_POST['Click'])){
		$truckno1 =$_POST['ttruckno'];
		$truck = $_POST['truck'] ;
		// echo $grno ;
		include '../dbconn.php' ;
	
	 $sql1 ="SELECT * FROM $truck WHERE truckno='$truckno1'" ;
	 //$sql1 = "INSERT INTO  file1 (`DATE`, `GRNO`, `CHALLAN`, `TRUCKNO`, `OWNER`,`QTY`, `PARTYNAME`,`STATION`,`RATE`,`BAG`,`BILLNO`,`SHORT`,`FREIGHT`,`LABOUR`,`TOLL`, `NETAMT`, `ADVANCE`,`PAGE1`, `BALANCE`, `BILTY`, `PAID`,`PAGE2`,`COMM`,`SHORTVAL`,`NETCOMM`,`NETBAG`,`STATION1`) VALUES ('$date',$grno , '$challan' , '$truckno','$self',$qty ,'$party','$station' ,$rate, $bag, $billno, $short1 , $freight, $labour , $toll, $netamt, $advance ,$page1, $balance, $bilty, $paid, $page2, $tcomm,$shortval,$netcomm, $netbag, '$station1')"; 			
	// $sql = "INSERT INTO `file1`(`grno`, `date`, `party`, `station`) VALUES ($grno,'$date','$party','$station')";
	$result = mysqli_query( $conn, $sql1);
	//echo "<select name='partyname'>";
if(! $result ) {
               die('Could not enter data: ' . mysqli_error());
            }
            
			            // echo "Entered data successfully\n";
            //$message = '<div style="text-align: center;>The username or password you entered are not good.</div>';
            //$message="Record Enter Successfully" ;
			// echo "<script> alert('$message');</script>";
		$Result1    =    mysqli_fetch_array($result);	
$party1 = $Result1['partyname'] ;
$panno = $Result1['panno'];
$truckno1=$Result1['truckno'] ;		
		mysqli_close($conn); }
		//include   'top.php' ;
		include 'menu.php';
		//include 'grno.php'; 
		include 'truck.php';
		include 'party.php';
		//include 'station.php'; 
?>
<div>
<form action="edittruck_2.php" method ="post"  id="form1" name="form1" onload="getDate()">
<table align="left|right|center" >
 <tr> 
 <td  align="center" colspan="2"   style ="background-color: #FFFF66"  > 
 EDITING TRUCK RECORDS 
 </td>
 </tr>
  
 <th> Enter Truck No </th>
 <td>
 <input type="text" id="truckno" name="truckno" value="<?php echo $truckno1 ?>" maxlength="12"   class="my1" readonly >
 </td>
 <tr>
 <th> Enter Party Name </th>
 <td>
  <select class ="my1" name="tparty" id="tparty"  >
	<option value="">  Select Party Name </option> 
 <?php
   echo $res ; 
	$co1=0 ;
	while ($co1 <count($tparty)){
	  if ( $tparty[$co1]== $party1 ) {?>
	<option value= "<?php echo  $tparty[$co1]  ?>"  selected >  <?php echo $tparty[$co1]?> </option>;
	  <?php } else { ?>  
	
		<option value= "<?php echo  $tparty[$co1]  ?>"   >  <?php echo $tparty[$co1]?> </option>;
	  <?php } $co1=$co1+1;
	
	}
?>
	 
</td>
	</tr>

<tr>
<th> Enter Pan No </th>
<td>
 
 <input type="text" id="panno" name="panno" value="<?php echo $panno ?>" maxlength="12"   class="my1" >
 </tr>
  
  <input type="hidden" id="truck1" name="truck1" value="<?php echo $truckno1 ?>" maxlength="12"   class="my1" >
  
  <input type="hidden" id="truck" name="truck" value="<?php echo $truck ?>"    class="my1" >
  
  <button class="button" onclick="edittruck_2.php" type="submit" form="form1" name="Submit" id="Submit" value="Submit">Update  </button>
  <button class="button1" onclick="edittruck_2.php" type="submit" form="form1" name="del" id="del" value="del">Delete  </button>
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

			


</body>
</head>
</html>
