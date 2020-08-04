<?php 
session_start() ;


?>
 



<html>
<head>
<link rel="stylesheet" href="../css/styles1.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
   #leftbox { 
                float:left;  
                background:  #e3e3cf;
                width:1000px;
                height:600px; 
				padding :5px;
				margin : auto ;
				border: 0px #e0d12d solid;
 				overflow: scroll;
            } 
            #middlebox{ 
                float:left;  
                background: orange; 
                width:0px;
                height:0px; 
				border : auto;
				padding :0px;
				border: 0px red solid;

            } 
            #rightbox{ 
                float:right; 
                background: #fffdfa; 
                width:800px;
                height:750px; 
				padding :5px;
				border: 1px #36c79d solid;
 			 overflow: scroll;
            } 
			.field_set{
 border-color:red ;
 border : 0px red solid ;
 margin-left :250px;
}
            h3{ 
                color:black; 
                text-align:center; 
            } 
			#col{
				font-size: 18pt; 
				height: 50px; 
				width: 280px;
				align : left ;
			}
			#col1{
				font-size: 16pt; 
				height: 40px; 
				width:280px;
				margin : 10pt,10pt ;
				align :right ;
			}
			.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 114px 2px;
  background-color: #008CBA;
  margin-left:-900px;
  margin-top: 200px;
}
.starthidden {
    display: none;
	
  }
</style>
<script type="text/javascript"  src="../js/jquery321.js"> 
<script  type="text/javascript" > 

$(document).ready(function(){
document.getElementById("dmonth").style.visibility = "hidden";
});
</script>
<script>
function fee() {
  var   tclass = $("#tclass1 option:selected").text();;
	 document.getElementById("tclass2").value =tclass ;
	 var ttclass = ($('#tclass2').val()).trim();
	 //alert (ttclass);
	
	 var ttmonth = $('#tmonth').val();
	//alert(month) ;
	$.ajax({
			url:"feenot.php",
			method:"post",
			data :{monthname:ttmonth,classname:ttclass } ,
			success:function(data)
			{
			// $('p').html(div_data);
			// alert(data) ;
			 
			 //var res = JSON.parse(data);
			//alert(res) ;
			$('#result').html(data);
				}
			
			
			
		});
	}
	
</script>
<script>
function feexl() {
  var   tclass = $("#tclass1 option:selected").text();;
	 document.getElementById("tclass2").value =tclass ;
	 var ttclass = ($('#tclass2').val()).trim();
	 //alert (ttclass);
	
	 var ttmonth = $('#tmonth').val();
	//alert(month) ;
	$.ajax({
			url:"feenotxl.php",
			method:"post",
			data :{monthname:ttmonth,classname:ttclass } ,
			success:function(data)
			{
			// $('p').html(div_data);
			// alert(data) ;
			 
			 //var res = JSON.parse(data);
			//alert(res) ;
			//$('#result').html(data);
				}
			
			
			
		});
	}
	</script>
<script>


	function tempfee() {
  var   tclass = $("#tclass1 option:selected").text();;
	 document.getElementById("tclass2").value =tclass ;
	 var ttclass = ($('#tclass2').val()).trim();
	 //alert (ttclass);
	
	 //var ttmonth = $('#tmonth').val();
	//alert(month) ;
	$.ajax({
			url:"balance.php",
			method:"post",
			data :{classname:ttclass } ,
			success:function(data)
			{
			// $('p').html(div_data);
			// alert(data) ;
			 
			 //var res = JSON.parse(data);
			//alert(res) ;
			$('#result').html(data);
				}
			
			
			
		});
	}
</script>
<script>
function datecol() {
  var   startdate  = document.getElementById("startdate").value ;
	 var   enddate  = document.getElementById("enddate").value ;
	
	 var ttmonth = $('#tmonth').val();
	//alert(month) ;
	$.ajax({
			url:"datecollection.php",
			method:"post",
			data :{startdate:startdate,enddate:enddate } ,
			success:function(data)
			{
			// $('p').html(div_data);
			// alert(data) ;
			 
			 //var res = JSON.parse(data);
			//alert(res) ;
			$('#result').html(data);
				}
			
			
			
		});
	}
	
</script>

<script>
	function month() {
	var selind =($("select")[0].selectedIndex);
	var   month = $("#month option:selected").text();;
	 document.getElementById("tmonth").value =month ;
	if (selind==0) {
		
	}
			else {
			
}
		}
		
		</script>
		<script>
		function stat() {
	var selind =($("select")[0].selectedIndex);
	// 0. fee not deposit
	// 1. for class wise listing 
	// 2. for class wise balance
	// 3 for all balance 
	// 4. for  date wise collection 
	if (selind==0) { 
	fee() ;
		//alert (tclass2);
	}
			else if (selind==1){
			tempfee() ;
			
}
         else if (selind==2){
			tempfee() ;
		
		}
		else if (selind==3){
			
			tempfee();
			} else 
			{
			
			}
			SetDate();
		}
</script>
<script>			
		function SetDate()
{
var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = year + "-" + month + "-" + day;


document.getElementById('startdate').value = today;
document.getElementById('enddate').value = today;
}
</script>
</head>



<?php
		include '../dbconn.php' ;
		//include   'top.php' ;
		include 'menu.php';
		//include 'grno.php'; 
		include 'class.php';
		// include 'getuser1.php';
		//include 'party.php';
		include 'transport.php';
		include 'concession.php';
		//include 'fetchfield.php' ;
      // $tclass1="" ;
	   $temp="" ;
	   $res="" ;
	   ?>
<?php
// $tclass1 = fopen("file.txt", "r") or die("Unable to open file!");
// $temp = fread($tclass1,filesize("file.txt"));
//  fclose($tclass1);
// echo $temp;
?>
 
  

    <body onload="SetDate()">  
        <div id = "boxes"> 
<fieldset class="field_set">           
		   <legend style="font-size:28px; color:blue" >Query </legend>
              
           
	
	
	
<br>
<table style="border:0px;">
<tr>
<td width="150px">
 <select  name="query" id="query"  style="font-size:18px;height:35;width:250" onclick="stat()" >

<?php
	
	?>
	<option value= 1>Fee Not Deposit </option>;
	<option value=2> Class wise Listing </option>
	<option value=3>Class Wise Balance </option>
	<option value=4> All Balance </option>
	<option value=5>Date Wise Collection </option>
	<?php
	
	
?>
</select> 
</td>
<td>

<select  name="month" id="month"  style="font-size:18px;height:35;width:250" onclick="month()" >

<?php
	
	?>
	<option value=''>--Select Month--</option>
    <option selected value='1'>January</option>
    <option value='2'>February</option>
    <option value='3'>March</option>
    <option value='4'>April</option>
    <option value='5'>May</option>
    <option value='6'>June</option>
    <option value='7'>July</option>
    <option value='8'>August</option>
    <option value='9'>September</option>
    <option value='10'>October</option>
    <option value='11'>November</option>
    <option value='12'>December</option>
	<?php
	
	
?>
</select> 
</td>

<td>
<select  name="tclass1" id="tclass1"   style="font-size:18px;height:35;width:250" onclick="stat()" >

	<option  value="">All  </option> 
 <?php
	$co1=0 ;
	while ($co1 <count($tclass1)){
	?>
	<option value= "<?php echo $tclass1[$co1] ?>"  >   <?php echo $tclass1[$co1] ?> </option>;
	<?php 
	$co1 = $co1+1 ;
	}
?>
</select>

</td>
<input type="hidden" name="tmonth" id="tmonth" />
<input type="text" name="tclass2" id="tclass2" />
<input type="hidden" name="tempclass2" id="tempclass2" />


<td>
<input style="height:40;font-size:18" type="date" name="startdate" id="startdate" onchange="datecol()" />

<br>
<input style="height:40;font-size:18" type="date" name="enddate" id="enddate" onchange="datecol()"/>
</td>
</table>

 <div id = "leftbox"> 
         
              
            
			
		<div id="result" style="color:red; font-size="22px"> 
	 </div>	
<input type="hidden" name="id" id="id"  style="height:35;width:280;font-size:18px" READONLY>

     
				
				
            </div> 
              
            
               





 
 
 
 
 
      
 <!--- <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit1">
</form>
 --->  

	 		 	 




 


<!--end responsive-form-->

</div>
  
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
-->

<?php
//include 'viewfee.php'; 
// <a href = "javascript:;" onclick = "this.href='feenotxl.php?classname=' + document.getElementById('tclass2').value+ ',' +document.getElementById('tmonth').value ">Export to Excel</a>

?>
</head>
</body >
</html>







