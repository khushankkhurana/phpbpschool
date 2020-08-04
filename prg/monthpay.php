<?php 
session_start() ;
//if($_SESSION['counter']!=1)
// 	exit("Not Allowed") ;
include "../prg/auth.php" ;
?>
 



<html>
<head>
<link rel="stylesheet" href="../css/styles1.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
   #leftbox { 
                float:left;  
                background: #edf1f2;
                width:500px;
                height:900px; 
				padding :5px;
				margin : auto ;
				border: 1px red solid;
 				
            } 
            #middlebox{ 
                float:left;  
                background: #ede89d; 
                width:300px;
                height:900px; 
				border : auto;
				padding :5px;
				border: 1px red solid;

            } 
            #rightbox{ 
                float:right; 
                background: #ebc07c; 
                width:250px;
                height:900px; 
				padding :5px;
				border: 1px red solid;
 			    
            } 
			.field_set{
 border-color:#b3a707 ;
 border : 0px #b3a707 solid ;
 margin-left : 250 ;
}
            h3{ 
                color:red; 
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
			
			.button1 {
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
  margin-left:-100px;
  margin-top: -30px;
  border-radius : 40% ;
}
input:read-only { 
  background-color: #ede4e6;
  }
label {
  display: flex;
  flex-direction: row;
  justify-content: flex-end;
  text-align: right;
   line-height : 10px;
}
#start {
    display: none;
	
  }
</style>
<script type="text/javascript"  src="../js/jquery321.js"> 
<script  type="text/javascript" > 
str=0 ;
$(document).ready(function(){
 $("select.country").change(function(){
	var selectedmonth = $(this).children("option:selected").val();
  	var xx.value = selectedmonth ;
  //alert(xx) ;
 
 
		});
});

</script>
<script>

$(document).ready(function(){
	load_data();
	function load_data(query)
	{  
	
	$.ajax({
			url:"checkmon.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				//  $("#name").html(data.name);
    // $("#fathername").html(data.fathername);
			// $('p').html(div_data);
			// alert(data) ;
			 var columns = JSON.parse(data);
			// $('#result').html(data);
			 //var mb = data.split(",") ;
			// alert(columns[4]);
			//var mb = $('#result').text();
			// alert(mb.value) ;
			    if(columns=='')
				{document.getElementById("acno").value = '';
				  document.getElementById("name").value='';
						document.getElementById("tclass").value='';
						document.getElementById("fathername").value='';
						document.getElementById("mobileno").value='';
						document.getElementById("image").src= "" ;
						document.getElementById("mothername").value = '';
						document.getElementById("gender").value = '';
						document.getElementById("charges").value = '';
						document.getElementById("concession1").value ='' ;
						document.getElementById("tsplconcession").value = '';
					    document.getElementById("nbalance").value ='' ;
				
				}
				else
				{	document.getElementById("acno").value = columns[0];
						document.getElementById("name").value=columns[1];
						document.getElementById("tclass").value=columns[2];
						document.getElementById("fathername").value=columns[3];
						document.getElementById("mobileno").value=columns[4];
						document.getElementById("image").src= "../image/" +columns[5];
						document.getElementById("mothername").value = columns[6];
						document.getElementById("gender").value = columns[7];
						document.getElementById("charges").value = columns[8];
						document.getElementById("concession1").value =columns[9] ;
						document.getElementById("tsplconcession").value = columns[10];
					    document.getElementById("nbalance").value = columns[11] ;
						document.getElementById("newold").value = columns[15] ;
					 //alert(columns[15]);
			   // alert(check_gender.value) ; 
			// var t_class = document.getElementById("tclass").value ;
			// alert(t_class) ;
			// document.getElementById('image').src='../image/simley.gif' ;
			// alert(t_class) ;
			gval() ;
			}
			}
			
			
		});
	}
	
	$('#search1').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
			
		}
		else
		{
			load_data();			
		}
	});
});
</script>
<script>

function my(){ 
$(document).ready(function(){
	
 $("select.country").change(function(){
	 var selectedClass = $(this).children("option:selected").val();
  	var str1 =   $( "#month option:selected" ).val();
  //alert(str1);





								});
							});
				}
				 function getDate(){ 
	    //var today = new Date();
   // document.getElementById("dateofbirth").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
//alert(dateofbirth);
}
</script>
<script>

 function gval() {
  var   t_class = document.getElementById("tclass").value ;
	 
	
	$.ajax({
			url:"getuser3.php",
			method:"post",
			data :{classname:t_class},
			success:function(data)
			{
				
			// $('p').html(div_data);
			// alert(data) ;
			 
			 var res = JSON.parse(data);
			// $('#result').html(data);
			 //var mb = data.split(",") ;
			// alert(columns[4]);
			//var mb = $('#result').text();
			// alert(mb.value) ;
			// alert(data) ;	
			document.getElementById("tadmfee").value=(res[0]);
			document.getElementById("tannual").value=res[1];
			document.getElementById("ttuition").value=res[2];
			document.getElementById("tbookcharge").value=res[3];
			document.getElementById("tstationarycharge").value=res[4];
			document.getElementById("tdiarycharge").value=res[5];
			document.getElementById("texamcharge").value=res[6];
			document.getElementById("tmisccharge").value=res[7];
			
			
			
			
			// total() ;
			fetch() ;
			getDate() ;
			}
			
			
			
		});
	}
 
 
</script>
<script>
function fetch() {
  var   tacno = document.getElementById("acno").value ;
	 
		
	// alert(t_class) ;
	$.ajax({
			url:"fetchfield.php",
			method:"post",
			data :{acno:tacno},
			success:function(data)
			{
				
			
		// alert (data) ;
			 var res11 = JSON.parse(data);
			 // alert(res11.length) ;
			 var x = document.getElementById("month");
  // var c = document.createElement("option");
  // c.text = res11[2] ;
  // x.options.add(c, 0);
  var i;
    for (i = 0; i < res11.length; i++) {
      var car = new Option(res11[i], i);
      x.options.remove(car);
    }
			var i;
    for (i = 0; i < res11.length; i++) {
      var car = new Option(res11[i], i);
      x.options.add(car);
    }
	
			
			
	}
			
				
		});
	}
	</script>
<script>
function cal(){
	var selmon= $("#month :selected").text();
	var selind =($("select")[0].selectedIndex);   
		num=0;
	var n = selmon.includes("NOT");
	   if (n==false)
	   {
		alert(selmon.replace("PAID","") + " fees already paid, select different month");
		 document.getElementById("tuition").value=num.toFixed(2);
		  document.getElementById('examcharge').value=num.toFixed(2);
		  document.getElementById('net').value= num.toFixed(2);
		 document.getElementById('balance').value= num.toFixed(2);
		document.getElementById('total').value= num.toFixed(2);
		return
	   }
	  selind = selind + 1 ;
	  //alert(selind);
	  
	if (selind==1 || selind==2 || selind==3 || selind==5 ||  selind==6 || selind==7 || selind==8 ||  selind==10 ||  selind==11)
	{		document.getElementById("admfee").value= num.toFixed(2) ;
			document.getElementById("annual").value=num.toFixed(2);
			document.getElementById("tuition").value=document.getElementById("ttuition").value;
			document.getElementById("bookcharge").value=num.toFixed(2);
			document.getElementById("stationarycharge").value=num.toFixed(2);
			document.getElementById("diarycharge").value=num.toFixed(2);
			document.getElementById("examcharge").value=num.toFixed(2);
			document.getElementById("misccharge").value=num.toFixed(2);
			document.getElementById("splconcession").value=num.toFixed(2);
	} else 
		if (selind==9 || selind==12) { 
			
			document.getElementById("admfee").value= num.toFixed(2); ;
			
			
			document.getElementById("annual").value=num.toFixed(2);
			
			document.getElementById("tuition").value= document.getElementById("ttuition").value;
			document.getElementById("bookcharge").value=num.toFixed(2);
			document.getElementById("stationarycharge").value=num.toFixed(2);;
			document.getElementById("diarycharge").value=num.toFixed(2);
			
			document.getElementById("examcharge").value=document.getElementById("texamcharge").value;
			document.getElementById("misccharge").value=num.toFixed(2);
		document.getElementById("splconcession").value=num.toFixed(2);
		}else if (selind==4){
			document.getElementById("texamcharge").value= parseFloat(0).toFixed(2)
			var newold=document.getElementById("newold").value ;
				if (newold =="Old") {
				document.getElementById("admfee").value = parseFloat(0).toFixed(2) ;
			}
			else 
			{
			document.getElementById("admfee").value= document.getElementById("tadmfee").value ;
			}
			
			document.getElementById("annual").value= document.getElementById("tannual").value;
			
			document.getElementById("tuition").value= document.getElementById("ttuition").value;
			document.getElementById("bookcharge").value=document.getElementById("tbookcharge").value;
			document.getElementById("stationarycharge").value=document.getElementById("tstationarycharge").value;
			document.getElementById("diarycharge").value=document.getElementById("tdiarycharge").value;
			
			document.getElementById("examcharge").value=document.getElementById("texamcharge").value;
			document.getElementById("misccharge").value=document.getElementById("tmisccharge").value;
		document.getElementById("splconcession").value=document.getElementById("tsplconcession").value ;
		}else
		{
		}
			
			
		
var admfee=document.getElementById('admfee').value ;
var concession1=document.getElementById('concession1').value;
var annual=document.getElementById('annual').value;
var tuition =document.getElementById('tuition').value;
var bookcharge=document.getElementById('bookcharge').value;
var stationarycharge=document.getElementById('stationarycharge').value;
var diarycharge=document.getElementById('diarycharge').value ;
var misccharge=document.getElementById('misccharge').value;
var examcharge =document.getElementById('examcharge').value;
	
var charges =document.getElementById('charges').value ;
var splconcession = document.getElementById("splconcession").value ;
var net =document.getElementById('net').value ;
 var amtdeposit =document.getElementById('amtdeposit').value ;
 var balance =document.getElementById('balance').value ;
 var nbalance =document.getElementById('nbalance').value ;
 
	//splconcession =0 ;
	//splconcession = parseFloat(splconcession).toFixed(2);
	var gtotal  ;
	 var dtotal ;
	 gtotal  = (admfee*1 +annual*1 +tuition*1 + bookcharge*1 + stationarycharge*1 +diarycharge*1 + misccharge*1 + examcharge*1 ) ;
	 dtotal = admfee*1 + annual*1 + tuition * 1 ;
	 var disc ;
	 disc= 0 ;
	 if (concession1 ==1){  
	 disc = 0 ;}
	 else {
		disc =parseInt((dtotal*concession1*1)/100) ;
		// var rdisc=Math.round(disc) ;
		document.getElementById('concession').value = parseFloat(disc).toFixed(2);
		 }
	 gtotal = gtotal  +charges*1 ; 
	 net  = (gtotal+nbalance*1 - (disc + splconcession*1)) ;
	 document.getElementById("total").value = parseFloat(gtotal).toFixed(2);
	 document.getElementById("net").value = parseFloat(net).toFixed(2);
	 document.getElementById('concession').value = disc.toFixed(2) ;
	 //document.getElementById('splconcession').value = splconcession ;
	 balance = net*1-amtdeposit*1 ;
	 document.getElementById('balance').value=parseFloat(balance).toFixed(2) ;  
}
	
</script>


<script>
function setnet() { 
	 var net = document.getElementById('net').value;
	 var amtdeposit =document.getElementById('amtdeposit').value ;
	 var balance =document.getElementById('balance').value ;
 	 balance = net*1-amtdeposit*1 ;
	 document.getElementById('balance').value=parseFloat(balance).toFixed(2) ;  
	 
		} 
	function getDate(){ 
	    var today = new Date();

document.getElementById("edate").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
}
function bank() {
var chcb =document.getElementById("cash").value ;
if (chcb=="Cash")
{	document.getElementById("start").style.display="none" ;
	document.getElementById("chno").required = false;
    document.getElementById("bankname").required = false ;
}else {
document.getElementById("start").style.display="block" ;
document.getElementById("chno").required = true;
document.getElementById("bankname").required = true ;
}
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
	 //	include 'fetchfield.php' ;
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
 
  

    <body>  
        <div id = "boxes"> 
<fieldset class="field_set">           
		   <legend style="font-size:28px; color:blue" >Monthly Fees :</legend>
              
            <div id = "leftbox"> 
	

<!-- <p id='msg' style="color:red; font-size:20" >
<?php echo ($res); ?>
</p>
	---> 
		
		
<form action="monthpost.php" method ="post"   id="form1"   >
  <label for="SEARCH " style="font-size:18px;color:blue" >Search : Account/Name/Fathername </label> 
  
  <input type="text" name ="search1" id="search1" placeholder="Search" style="height:35;width:280;font-size:18px" onkeyup="gval()" autocomplete="off">
<br>
<br>
<label for="SELECT MONTH " style="font-size:18px;color:blue;text-align:right ;"> FEE MONTH  </label> <br>
  
   <select  name="month" id="month"  style="font-size:18px;height:35;width:280;color:red;"  onchange="cal()" required >

</select>
<br>
<br>
  <label for="ACCOUNT NO" style="font-size:18px;color:blue;" >ACCOUNT NO </label> <br>
  
  <input type="text" name ="acno" id="acno"  style="height:35;width:280;font-size:18px" readonly >
   <label for="NEWOLD" style="font-size:18px;color:blue;" >STATUS </label> 
  <input type="text" name ="newold" id="newold"  style="height:35;width:100;font-size:18px" readonly >

   <div id="result" style="color :red; font-size="22" > 
	 </div>
	 <br>
	 <label for="class name" style="font-size:18px;color:blue;" >CLASS </label> <br>
 
<input type="text" name="tclass" id="tclass"  style="font-size:18px;height:35;width:280" READONLY >
	<br>
	<br>
	<label for="Date " style="font-size="18px">DATE  </label>
<br>
<input type="date" name="edate" id="edate"  style="height:35;width:280;font-size:18px " readonly>

<!-- </div id="txtHint"> -->	 
<input type="hidden" id="temp_class" name="temp_class" > 
<br>
<br>			
		
	<img style="border-radius: 50%; width :50px;height :50px" id="image" src='' alt="your image" />
	 <br>
	<label for="STUDENT NAME" style="font-size="14px"; ";>STUDENT NAME </label> 
<br>
<input type="text" name="name" id="name"  placeholder="STUDENT NAME *" style="height:35;width:280;font-size:18px" value="" READONLY>
<label for="GENDER" style="font-size="18px">GENDER </label> 

<input type="text" name="gender" id="gender" style="height:35;width:100;font-size:18px" value="" READONLY>
  
<br>
<br>
<label for="FATHER'S NAME" style="font-size="14px">FATHER'S NAME</label>

<br>
<input type="text" name="fathername" id="fathername" placeholder="FATHER'S NAME" style="height:35;width:280;font-size:18px" value="" readonly >

<br>
<br>

<label for="MOTHER'S NAME" style="font-size="14px">MOTHER'S NAME</label>
<br>
<input type="text" name="mothername" id="mothername" style="height:35;width:280;font-size:18px" READONLY >
<br>
<br>
<label for="MOBILE NO" style="font-size="14px">MOBILE NUMBER</label>
<br>
<input type="text" name="mobileno" id="mobileno"  style="height:35;width:280;font-size:18px" READONLY>
	
            </div>  
              
            <div id = "rightbox"> 
			
<label for="ADMISSION FEE" >ADMISSION FEE</label>
<br>
<input type="text" name="admfee" id="admfee" value="0.00" min="0.00" max="999999.99" step="0.01" style="height:35;width:200;color:red;font-size:22;" readonly > 
<br>
<br>
<label for="ANNUAL CHARGE" >ANNUAL CHARGES </label>
<br>
<input type="text"   name="annual" id="annual" value= "0.00" style="height:35;width:200;color:red;font-size:22;" readonly >
<br>
<br>
<label for="TUITION FEE" >TUITION FEE</label>
<br>
<input type="text" name="tuition" id="tuition" value= "0.00" style="height:35;width:200;color:red;font-size:22;" readonly >
<br>
<br>
<label for="BOOK CHARGES" >BOOK CHARGES</label>
<br>
<input type="text" name="bookcharge" id="bookcharge" value= "0.00"style="height:35;width:200;color:red;font-size:22;" readonly  >
<br>
<br>
<label for="STATIONARY CHARGES" >STATIONARY CHARGES</label>
<br>
<input type="text" name="stationarycharge" id="stationarycharge" value= "0.00" style="height:35;width:200;color:red;font-size:22;" readonly >
<br>
<br>
<label for="DIARY CHARGES" >DIARY CHARGES</label>
<br>
<input type="text" name="diarycharge" id="diarycharge" min="0.00" max="0.00" value= "0.00" style="height:35;width:200;color:red;font-size:22;" readonly >
<br>
<br>
<label for="EXAM FEES" >EXAM FEES</label>
<br>

<input type="text" name="examcharge" id="examcharge" value= "0.00" style="height:35;width:200;color:red;font-size:22;" readonlY >
<br>
<br>
<label for="MISC CHARGES" >MISC CHARGES</label>
<br>
<input type="text" name="misccharge" id="misccharge" value= "0.00" style="height:35;width:200;color:red;font-size:22;" readonlY >
	 		 	 

     
				
				
            </div> 
              
            <div id = "middlebox"> 
               
<label for="TRANSPORT CHARGES" >TRANSPORT CHARGES</label>
<br>
<input  type="text" name="charges" id="charges" value= "0.00" style="height:35;width:280;font-size:22;" readonly >
<br>
<br>
<label for="TOTAL" >TOTAL</label>
<br>
<input  type="text" name="total" id="total" value= "0.00" style="height:35;width:280;color:red;font-size:28;" readonly >
<br> 
<br> 
  
<label for="CONCESSION" >B/S/STAFF CONCESSION:</label>
<br>
<input  type="text" name="concession" id="concession" value= "0.00" style="height:35;width:280;font-size:22;" readonly >
<input type="hidden" name="concession1" id="concession1" value="0.00" >
<br>
<br>  
<label for="CONCESSION" >SPECIAL CONCESSION:</label>
<br>
<input  type="text" name="splconcession" id="splconcession" value="0.00" PLACEHOLDER ="" style="height:35;width:280;font-size:22;align:left" readonly >
<br>
<br>  
<label for="BALANCE" >PREVIOUS BALANCE:</label>
<br>
<input  type="text" name="nbalance" id="nbalance" value="0.00" PLACEHOLDER ="" style="height:35;width:280;font-size:22;align:left" readonly >
<br>
<label for="net" >NET PAYABLE</label>
<br>
<input type="hidden" name="file" id="file" >
<input  type="text" name="net" id="net" value= "0.00" style="height:35;width:280;color:red;font-size:28;" readonly >
<br>
<br>
<label for="amt" >AMOUNT DEPOSIT </label>
<label style="margin-left:40px" for="Cash/Cheque" >Cash/Cheque </label>

<input type="text" name="amtdeposit" id="amtdeposit" placeholder="0.00" style="height:35;width:140;color:blue;font-size:28;"  autocomplete="off" required onkeyup="setnet()">
<select id="cash" name="cash" style="height:35;width:130;font-size:22px;margin-left:10px" required onclick="bank()">
	<option selected > Cash	</option>
	<option> Cheque   </option>
	</select>
<div class="starthidden" id="start" >

<br>
<label for="cheque" >Cheque No </label>
<label style="margin-left:40px" for="Cash/Cheque" >Bank Name </label>

<input type="text" name="chno" id="chno" placeholder="Cheque No" style="height:35;width:100;color:blue;font-size:18;"  autocomplete="off">
<input type="text" name="bankname" id="bankname" placeholder="Bank Name" style="height:35;width:180;color:blue;font-size:18;"  autocomplete="off" >

</div>
<br>
<br>
<label for="balance" >BALANCE </label>
<br>
<input  type="number" name="balance" id="balance" value= "0.00" style="height:35;width:280;color:red;font-size:28;" readonly > 
<!--  end -->



<input type="hidden" name="tadmfee" id="tadmfee" value="0.00" min="0.00" max="999999.99" step="0.01" readonly > 
<input type="hidden" name="tannual" id="tannual" value= "0.00"  readonly >
<input type="hidden" name="ttuition" id="ttuition" value= "0.00"  readonly >
<input type="hidden" name="tbookcharge" id="tbookcharge" value= "0.00"  readonly  >
<input type="hidden" name="tstationarycharge" id="tstationarycharge" value= "0.00"  readonly >
<input type="hidden" name="tdiarycharge" id="tdiarycharge" min="0.00" max="0.00" value= "0.00"  readonly >
<input type="hidden" name="texamcharge" id="texamcharge" value= "0.00"  readonlY >
<input type="hidden" name="tmisccharge" id="tmisccharge" value= "0.00"  readonlY >
<input type="hidden" name="tsplconcession" id="tsplconcession" value= "0.00"  readonlY >

 
 
 
 
 
</div>
      
 <!--- <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit1">
</form>
 --->  
<button class="button1" type="Submit" name="Submit" id="Submit" value="Submit" onclick="monthpost.php" >Submit  </button>

	 		 	 




 


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


<?php
//include 'viewfee.php'; 
?>
</head>
</body>
</html>







