<?php 
// if(isset($_POST['Click'])) 
{
		
		$chgrno =$_POST["chgrno"];
		$file = $_POST['file'];
		$party = $_POST['party'];
		$station= $_POST['station'];
		$truck = $_POST['truck']; 
		//echo $file.$party.$station.$truck ;
		include '../dbconn.php';
	
	 $sql1 ="SELECT * FROM $file WHERE GRNO='$chgrno'" ;
	 //$sql1 = "INSERT INTO  file1 (`DATE`, `GRNO`, `CHALLAN`, `TRUCKNO`, `OWNER`,`QTY`, `PARTYNAME`,`STATION`,`RATE`,`BAG`,`BILLNO`,`SHORT`,`FREIGHT`,`LABOUR`,`TOLL`, `NETAMT`, `ADVANCE`,`PAGE1`, `BALANCE`, `BILTY`, `PAID`,`PAGE2`,`COMM`,`SHORTVAL`,`NETCOMM`,`NETBAG`,`STATION1`) VALUES ('$date',$grno , '$challan' , '$truckno','$self',$qty ,'$party','$station' ,$rate, $bag, $billno, $short1 , $freight, $labour , $toll, $netamt, $advance ,$page1, $balance, $bilty, $paid, $page2, $tcomm,$shortval,$netcomm, $netbag, '$station1')"; 			
	// $sql = "INSERT INTO `file1`(`grno`, `date`, `party`, `station`) VALUES ($grno,'$date','$party','$station')";
	$result = mysqli_query( $conn, $sql1);
	//echo "<select name='partyname'>";
if( !$result ) {
               die('Could not enter data: ' . mysqli_error());
			   // header ("location: editgr.php" ) ;
            }
            
			            // echo "Entered data successfully\n";
            //$message = '<div style="text-align: center;>The username or password you entered are not good.</div>';
            //$message="Record Enter Successfully" ;
			// echo "<script> alert('$message');</script>";
		$Result1    =    mysqli_fetch_array($result);	
		
$grno = $Result1['GRNO'] ;
$date = $Result1['DATE'];
$challan = $Result1['CHALLAN'];
$truckno = $Result1 ['TRUCKNO'];
$panno = $Result1['PANNO'];
$self = $Result1['OWNER'] ;
$qty = $Result1['QTY'];
// echo $qty.$challan ;
$party1 =$Result1['PARTYNAME'];
$station11=$Result1['STATION'] ;
$rate = $Result1['RATE'] ;
$bag = $Result1['BAG']; 
$billno = $Result1['BILLNO'];
$short1 = $Result1['SHORT'];
$spage = $Result1['SPAGE'];
$freight = $Result1['FREIGHT'];
$labour = $Result1['LABOUR'] ;
$lpage = $Result1['LPAGE'];
$toll = $Result1['TOLL'] ;
$netamt =$Result1['NETAMT'];
$advance = $Result1['ADVANCE'] ;
$balance = $Result1['BALANCE'] ;
$page1 = $Result1['PAGE1'] ;
$bilty = $Result1['BILTY']; 
$paid = $Result1['PAID'] ;
$page2 = $Result1['PAGE2'] ;
$tcomm = $Result1['COMM'] ; 
$shortval = $Result1['SHORTVAL'] ;
$netcomm = $Result1['NETCOMM'] ;
$netbag = $Result1['NETBAG'];
$station1 = $Result1['STATION1'];
//echo $billno ;
			mysqli_close($conn);
 //header ("location: editfile.php" ) ;

		// include   'top.php' ;
		include 'menu.php';
		// include 'grno.php'; 
		include 'truck.php';
		include 'party.php';
}		include 'station.php';
	?>
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
	width: 168px;
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
	width: 98px;
	background-color:#72A4D2 ; 
	}		
.button {
	background-color: #008CBA;
	border-radius: 8px;
	color: red;
	position: absolute;
  	top: 135%;
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
  	top: 128%;
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
		alert(x2.value);
	}
	x15.value = ((x14.value*1)/(x2.value*1)).toFixed(2);
     
	}
	function domy()
	{
		alert("hello");
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
	alert(ttt.value);
	
}

</script>
	

<div>
<form action="delfile_1.php" method ="post"  id="form1" name="form1" onload="getDate()" >
<table >
 <tr> 
   <td  align="center"   colspan="8" style ="background-color: #FFFF66"  > 
 DELETING RECORDS 
 </td>
 </tr/
 <tr>
		<th>Date:      </th>
		<th>Gr. No:    </th>
		<th>Challan No:</th>
		<th>Truck No : </th>
		<th>Pan No : </th>
		<th>Owner :</th>
		<th>   Qty :   </th>
		<th> Party Name:</th>
		
		
	</tr>
<tr>
<td >
		<input readonly  type="date" id="tdate" name="tdate"  value= "<?php echo $date ?>" min="2018-01-01" max="2019-12-31" autofocus="autofocus" class="my1" onload="getDate()">
</td>
<td width ="10px" > 
	<input type"text"  id="grno" name="grno" class="my" value="<?php echo $grno ?>"  autofocus="autofocus" maxlength="6"  readonly />
 </td>
 <td> 
	<input readonly type"text"  id="challan" name="challan" value = "<?php echo $challan ?>" maxlength="6"  class="my"  />
 </td>
 <td> 
 <select readonly  name="ttruckno1" id="ttruckno1"   class ="my1" onchange="myvalue()">
	<option value =" " > Select Truck No  </option> 
 <?php
	$co1=0 ;
	while ($co1 <count($ttruck)){
	 
	 if ($ttruck[$co1]==$truckno) 
	 {?>		 
	<option value= "<?php echo  $ttruck[$co1]."*". $tpanno[$co1] ?>" selected >   <?php echo $ttruck[$co1]?> </option>;
	 <?php } else { ?>
	 <option value= "<?php echo  $ttruck[$co1] ."*". $tpanno[$co1] ?>" >   <?php echo $ttruck[$co1]?> </option>;
	 <?php }
	 $co1=$co1+1;
	}
?>
	 
</select>
 </td>
  
	<input type="hidden"  id="ttruckno" name="ttruckno" value = ""    />
 
 <td> 
	<input type"text"  id="panno" name="panno" value = "<?php echo $panno ?>" maxlength="12"  class="my5" readonly />
 </td>
 <td>
 <select readonly name="tself" id="tself" class="my2">
 <?php if ($self =="SELF") { ?>
 <option value= "SELF"  selected  > SELF  </option> 
 <?php }ELSE  {?>
 <option value= "SELF"  > SELF  </option>
 <?php }?> 
 <?php if ($self =="MARKET") { ?>
 <option value= "MARKET"  selected  > MARKET </option> 
 <?php }ELSE {?>
 <option value= "MARKET"  > MARKET </option>
 <?php }?> 
 </select>
 
 </td>
 
 <td>
 
 <input readonly type="number" id="tqty" name="tqty" value="<?php echo $qty ?>"  min="0.00" step="0.01"   class="my" onkeyup="dolab()" >
 </td>
 
 <td>
  <select class ="my1" name="tparty" id="tparty">
	<option value="">  Select Party Name </option> 
 <?php
	$co1=0 ;
	while ($co1 <count($tparty)){
	 if ($party1==$tparty[$co1]) {?>
	<option value= "<?php echo  $tparty[$co1]  ?>" selected >   <?php echo $tparty[$co1]?> </option>;
	 <?php }else { ?>
	<option value= "<?php echo  $tparty[$co1]  ?>" >   <?php echo $tparty[$co1]?> </option>;
	<?php } 
	$co1=$co1+1;
	}
?>
	 

</tr>
<tr> 
<td    colspan="8" style ="background-color: #FFFF66" ; </td>
</tr>
<tr>
		<th> Station :</th>
		<th>Rate:      </th>
		<th>Bags:    </th>
		<th>Bill No:</th>
		<th>Short : </th>
		<th>Page No: </th>
		<th>FR. Amount :</th>
		<th> Labour  :   </th>
		<th> Page No : </th>
		
		
	</tr>
<tr>
</select>
<td>
<select readonly class="country" name="tstation" id= "tstation"  style= "font-size:12pt;height:30px;border : 1px solid blue;width: 170px;"  >
	<option value="" >  Select Station </option> 
 <?php
	$co2=0 ;
	while ($co2 <count($tstation)){
	if ($station11==$tstation[$co2]){ ?>
	<option value= "<?php echo $trate[$co2] ?>*<?php echo $tstation[$co2]  ?>" selected >   <?php echo $tstation[$co2]?> </option>;
	<?php } else { ?>
	<option value= "<?php echo $trate[$co2] ?>*<?php echo $tstation[$co2]  ?>" >   <?php echo $tstation[$co2]?> </option>;
	<?php } 
	 $co2=$co2+1;
	}
?>
	
</select>
</td>

<td>
 
 <input type="number" id="trate" name="trate" value ="<?php echo $rate ?>"  step="0.01"   class="my5"  readonly>
 </td>
 <td>
 
 <input type="number" id="tbag" name="tbag"  value="<?php echo $bag ?>" class="my5" readonly>
 </td>
  <td>
 
 <input readonly type="text" id="tbill" name="tbill" value="<?php echo $billno ?>"   class="my" >
 </td>
 <td>
  <input readonly type="number" id="short1" name="short1"  value="<?php echo $short1 ?>"   class="my" >
 </td>
 <td>
 <input readonly type="text" id="spage" name="spage" value="<?php echo $spage ?>" maxlength="4" class="my" >
 </td>
 <td>
 
 <input type="number" id="tfreight" name="tfreight"  value="<?php echo $freight ?>" class="my5" readonly>
 </td>
 <td>
 
 <input readonly type="number" id="labour" name="labour" oninput="setTwoNumberDecimal(this)" value="<?php echo $labour ?>" class="my" onkeyup="dolab()">
 </td>
 <td>
 <input readonly type="text" id="lpage" name="lpage" value="<?php echo $lpage ?>" maxlength="4" class="my" >
 </td>
 
 <tr> 
<td colspan="8" style ="background-color: #FFFF66";</td>
</tr>
<tr>
		<th> Toll Tax:</th>
		<th> Net Amount:</th>
		<th>Advance:      </th>
		<th>Page No:    </th>
		<th>Balance:</th>
		<th>Bilty Charges : </th>
		<th>Paid :</th>
		<th> Page No :   </th>
		
		</tr>
<tr>
<td>
 <input readonly type="number" id="toll" name="toll"  oninput="setTwoNumberDecimal(this)" value="<?php echo $toll ?>" class="my" >
 </td>
 <td>
 
 <input type="number" id="netamt" name="netamt"  value="<?php echo $netamt ?>" class="my5" readonly>
 </td>
<td>
  <input readonly type="number" id="advance" name="advance" oninput="setTwoNumberDecimal(this)" value="<?php echo $advance ?>"   class="my2" onkeyup="dolab()">
 </td>
 <td>
 
 <input readonly type="text" id="page1" name="page1" value ="<?php echo $page1 ?>" maxlength="4"  class="my" >
 </td>
 <td>
 
 <input type="number" id="balance" name="balance"  value="<?php echo $balance ?>"  class="my5" readonly>
 </td>
 <td>
 
 <input readonly type="number" id="bilty" name="bilty" oninput="setTwoNumberDecimal(this)" value="<?php echo $bilty ?>"   class="my" onkeyup="dolab()" >
 </td>
 <td>
 
 <input readonly type="number" id="paid" name="paid"  oninput="setTwoNumberDecimal(this)" value="<?php echo $paid ?>"   class="my" onkeyup="dolab()" >
 </td>
 <td>
 
 <input readonly type="text" id="page2" name="page2" value="<?php echo $page2 ?>" maxlength="4" class="my" >
 </td>
 
 <tr> 
<td colspan="8" style ="background-color: #FFFF66";</td>
</tr>
<tr>
		<th> Commission:</th>
		<th> Short Value:</th>
		<th>Net Commission:      </th>
		<th>Net Bag:    </th>
		<th>Station:</th>
		
		
</tr>
<tr>
<td>
 
 <input type="number" id="tcomm" name="tcomm"  oninput="setTwoNumberDecimal(this)" value="<?php echo $tcomm ?>"  class="my5" readonly >
 
 </td>
<td>
 
 <input readonly type="number" id="tshort" name="tshort"  oninput="setTwoNumberDecimal(this)" value="<?php echo $shortval ?>"  class="my" >
 </td>
<td>
  <input type="number" id="netcomm" name="netcomm" oninput="setTwoNumberDecimal(this)" value="<?php echo $netcomm ?>"  class="my5" readonly >
 
 </td>
<td>
  <input type="number" id="netbag" name="netbag" oninput="setTwoNumberDecimal(this)" value="<?php echo $netbag ?>"  class="my5" readonly >
 
 </td>
 <td>
  <input type="text" id="tstation1" name="tstation1" value="<?php echo $station1 ?>"  class="my5"  readonly >
 
 </td>
 
 <input type="hidden" id="file" name="file" value="<?php echo $file ?>"  class="my5"  readonly >
 
 <button class="button" onclick="" type="submit" form="form1" name="Submit" id="Submit" value="Submit">Submit  </button>
 
</table>
</form>
</div>

</head>
</body>
</html>
