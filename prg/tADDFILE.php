<?php 
session_start() ;
// echo "RAJDHANI EXPRESS ".$_SESSION["company"];
							//$compname = $_SESSION['company'];
							//$fileno =$_SESSION['file'] ;
							//$file ="file". $fileno ;
							//$party ="party".$fileno ;
							//$truck ="truck".$fileno ;
							//$station ="station".$fileno ;

// include 'menu.php' ;
	$class = "classname" ;
	// echo "RAJDHANI EXPRESS               [ ".  $compname. " ]  "  ;
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
		margin : 3px;
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
	width: 95px;
	background-color:#72A4D2 ; 
	}		
}
.button2 {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 14px 22px;
  cursor: pointer;
}
.button1 {
	background-color: #008CBA;
	border-radius: 8px;
	color: blue;
	position: absolute;
  	top: 140%;
  	left: 70%;
	margin-left: -320px;
  	margin-top: -320px;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
   font-size: bold 12px;
}
div {
  border-radius: 5px;
  background-color: light blue;
  padding: 10px;
 }
</style>
	<script  type="text/javascript"  src="/rajdhani/jquery321.js"> </script>
<script  type="text/javascript" > 
 $(document).ready(function(){
 $("select.country").change(function(){
    var selectedRate = $(this).children("option:selected").val();
  var x3 = document.getElementById('trate');
	//	$("#tstation").change(function () 
		//var cntrol = $(this);
		// alert(selectedRate);
		
		//alert(selectedRate.length);
		var i ;
		var pos ; 
		for(i=0; i<selectedRate.length; i++)
		{	// alert(selectedRate.substr(i,1));
	//  alert(selectedRate.substr(1,2));
			if ((selectedRate.substr(i,1)) =="*") 
			var pos=i ;
		 }
		 x3.value =(selectedRate.substr(0,pos))
		// x3.value = (selectedRate.substr(pos+1,selectedRate.length-pos)) ;
		var x4 = document.getElementById('tqty');
		var x5 = document.getElementById('tfreight');
		x5.value =(x3.value*x4.value).toFixed(2) ;
		
		var xxx = document.getElementById('tstation1');
		 //xxx.value = (selectedRate.substr(0,pos))   ;
		 xxx.value = (selectedRate.substr(pos+1,selectedRate.length-pos)) ;
		 dolab();
		 //var ts2 = document.getElementById('tstation1');
		// ts2.value = xxx.value ;
		//ts1.value = selectedRate ;
		});
});
</script>
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
function dochange()
{

var x1 = document.getElementById("tqty");
 
var x2 = document.getElementById("tbag");
x2.value = (x1.value *20).toFixed(2) ; 
}
function dorate()
{
var x3 = document.getElementById('trate');
 x3.value = selectedRate.toFixed(2) ;
}
function dolab()
{ 
var x1 = document.getElementById("tqty");
 
var x2 = document.getElementById("tbag");
x2.value = (x1.value *20).toFixed(2) ; 
var x3 = document.getElementById('trate');
var x6 = document.getElementById('tfreight');
x6.value =(x1.value*x3.value).toFixed(2) ;
	
	var x7 = document.getElementById('labour');
	
	var x8 = document.getElementById('netamt');
	var x9 = document.getElementById('advance');
	var x10 = document.getElementById('balance');
	
	var x11 = document.getElementById('bilty');
	var x12 = document.getElementById('paid');
	
	var x13 = document.getElementById('tcomm');
	var x14 = document.getElementById('netcomm');
	var x15 = document.getElementById('netbag');
	
	x8.value =  (x6.value*1 + x7.value*1).toFixed(2);
	
	x10.value=(x6.value*1 - x9.value*1).toFixed(2);
	x13.value=((x10.value*1) - (x11.value*1)-(x12.value*1)).toFixed(2);
	x14.value = ((x10.value*1) - (x11.value*1)-(x12.value*1)).toFixed(2);
	if (x2.value==0.00 ){
		x15.value =0.00 ;
		// alert(x2.value);
	}
	x15.value = ((x14.value*1)/(x2.value*1)).toFixed(2);
     
	}
	function domy()
	{
		// alert("hello");
	}
	function gohome()
{
window.location.href="../prg/frame.html"
}
function myvalue()
{
	var tt = document.getElementById('ttruckno1');
	var xx = document.getElementById('panno');
	
	var i;
	var pos ;
	var le ;
	var st ;
	var st ;
	st= tt.value ;
	le = tt.value.length ;
	for(i=0 ; i<le ;i++)
	{
		if (tt.value.substr(i,1)=="*")
			pos=i ;
	}
	var ttt = document.getElementById('ttruckno');
	xx.value =tt.value.substr(pos+1,tt.value.length-pos);
	ttt.value = tt.value.substr(0,pos);
	//alert(ttt.value);
	
}
	</script>
	
<?php
		include '../dbconn.php' ;
		//include   'top.php' ;
		include 'menu.php';
		//include 'grno.php'; 
		include 'CLASS.php';
		//include 'party.php';
		//include 'station.php';
       
?>

<div> 
<form action="add.php" method ="post"  id="form1" name="form1" onload="getDate()">
<table >
 <tr> 
 <td  align="center"   colspan="9" style ="background-color: #FFFF66"  > 
 ADDING RECORDS 
 </td>
 </tr/
 <td> 
		<th>CLASS NAME    </th>
		<th>ADMISSION FEES :  </th>
		<th>ANNUAL CHARGES:</th>
		<th>TUITION FEES </th>
		<th> BOOKS CHARGES :</th>
		<th> STATIONARY CHARGES</th>
		<th>DIARY CHARGES</th>
		<th> EXAMINATION FEE</th>
		<th> MISC CHARGES :   </th>
		
		
		
	</tr>
<tr>
<td >

 <select name="tclass" id="tclass"   class ="my1" onchange="myvalue()">
	<option value =" " > Select Class  </option> 
 <?php
	$co1=0 ;
	while ($co1 <count($tclass)){
	?>
	<option value= "<?php echo  $tclass[$co1] ?>" >   <?php echo $tclass[$co1]?> </option>;
	<?php $co1=$co1+1;
	}
?>
	 
</select>
 </td>
 <td> 
<input type="number" name ="admfee" id="admfee"  placeholder="0.00" step="1" min="0" max="100000">
 </td>
	<td> 
<input type="decimal" name ="annualcharge"  placeholder="0.00" step="1" min="0" max="100000">
 
<td> 
<input type="number" name ="tuitionfee"  placeholder="0.00" step="1" min="0" max="100000">
 

 </td>
 <td> 
<input type="number" name ="bookcharge"   placeholder="0.00" step="1" min="0" max="100000">
 </td>
 <td> 
<input type="number" name ="stationary"  placeholder="0.00" step="1" min="0" max="100000">
 </td>
 <td> 
<input type="number" name ="diary"  placeholder="0.00" step="1" min="0" max="100000">
 </td>
 <td> 
<input type="number" name ="examfee"  placeholder="0.00" step="1" min="0" max="100000">
 </td>
 <td> 
<input type="number" name ="misccharge"  placeholder="0.00" step="1" min="0" max="100000">
 </td>
</tr>
<tr>

 </table> 
 <button  class= "button2"  onclick="add.php" type="submit" form="form1" name="Submit" id="Submit" value="Submit">Submit  </button>
 
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
<?php
// include 'viewfee.php'; 
?>
</head>
</body>
</html>
