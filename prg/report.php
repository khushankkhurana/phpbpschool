<?php 
session_start() ;
// echo "RAJDHANI EXPRESS ".$_SESSION["company"];
$compname = $_SESSION['company'];
$fileno =$_SESSION['file'] ;
$file ="file". $fileno ;
$party ="party".$fileno ;
$truck ="truck".$fileno ;
$station ="station".$fileno ;

// include 'menu.php' ;
echo "RAJDHANI EXPRESS               [ ".  $compname. " ] . $file "  ;
echo  "<br>" ;

?>
 
</body>
</head>
</html>

<!DOCTYPE html>
<html>
<head>
<body onload="getDate()">
 <style>
   table,   th, td {
        padding: 10px ;
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
	width: 165px;
	}	
	 .my2
{
	font-size:12pt;
	height:30px;
	border : 1px solid blue;
	width: 98px;
	}
	.my4
{
	font-size:12pt;
	height:30px;
	border : 1px solid blue;
	width: 70px;
	}
.my6
{
	font-size:12pt;
	height:30px;
	border : 1px solid blue;
	width: 128px;
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
  	top: 140%;
  	left: 90%;
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
  	top: 140%;
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
 }
</style>
	<script  type="text/javascript"  src="/rajdhani/jquery321.js"> </script>

<script>
var input = document.getElementById("form1");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("Submit").click();
  }
});
</script>
	<script>
	function getDate(){ 
	    var today = new Date();

document.getElementById("tdate").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
}

	</script>
	
<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "master1" ; 
		//include   'top.php' ;
		include 'menu.php';
		//include 'grno.php'; 
		//include 'truck.php';
		//include 'party.php';
		// include 'station.php';
?>
<div>
<form action="report1.php" method ="POST"  id="form1" name="form1" onload="getDate()">
<table >
 <tr> 
 <td  align="center"   colspan="8" style ="background-color: #FFFF66"  > 
 Printing Report 
 </td>
 </tr>
 
<tr>
		<th> Bill No </th> 
		<th> Bill Date </th> 
		</tr>
		<tr>
		<td>
		<input type="text"  id="billno" name="billno" class="my" autofocus="autofocus" maxlength="6"  />

 </td>
		<td >
		<input type="date" id="bdate" name="bdate" 	 min="2018-01-01" max="2030-12-31" autofocus="autofocus" class="my1" onload="getDate()">
</td>
<tr>
<td  align="center"   colspan="2" style ="background-color: #FFFF66"  > 
	</tr>
	<tr>
	
		<th>Start  Date:      </th>
		<th>End Date :    </th>
		
	</tr>
<tr> 
<td >
		<input type="date" id="sdate" name="sdate" 	 min="2018-01-01" max="2030-12-31" autofocus="autofocus" class="my1" onload="getDate()">
</td>
<td >
		<input type="date" id="edate" name="edate" 	 min="2018-01-01" max="2030-12-31" autofocus="autofocus" class="my1" onload="getDate()">
</td>
 <tr>
 <td  align="center"   colspan="2" style ="background-color: #FFFF66"  > 
 	</tr>
	<tr>
	
	<th>Start Gr No</th>
		<th>End Gr No : </th>
		</tr>
		<td>
		<input type="text"  id="sgrno" name="sgrno" class="my" value=""  autofocus="autofocus" maxlength="6"  />
 </td>
 <td>
		<input type="text"  id="egrno" name="egrno" class="my" value=""  autofocus="autofocus" maxlength="6"  />
 </td>
 <tr>
 <td  align="center"   colspan="2" style ="background-color: #FFFF66"  > 
 </tr>
	<td>
	<input type="text"  name="file" id="file"  value="<?php echo $file ?> "   />
 </td>
 </td>
 
 <button class="button" onclick="report1.php" type="submit" form="form1" name="Submit" id="Submit" value="Submit">Submit  </button>
 
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
</html>
