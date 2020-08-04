<?php 
session_start() ;
include "../prg/auth.php" ;
$schoolname = $_SESSION['schoolname'];
$user = $_SESSION['username'] ;
include "../prg/auth.php" ;
if($user=='')
{
    // not logged in
    //header('Location: ../login.php');
    ?><script>
       window.history.replaceState('','','/');
</script>
<?php	exit();
}
?>
 



<html>
<head>
<link rel="stylesheet" href="../css/styles1.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
   #leftbox { 
                float:left;  
                background: #f5f5eb;
                width:430px;
                height:900px; 
				padding :5px;
				margin : auto ;
				border: 3px #80805c solid;
 				
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
                background: #f5edf3; 
                width:650px;
                height:900px; 
				padding :5px;
				border: 2px #e8d5e3 solid;
 			 
            } 
			.field_set{
 border-color:red ;
 border : 0px red solid ;
 margin-left :250px;
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
			margin-left:-500px;
  	margin-top: 325px;
}
</style>
<script type="text/javascript"  src="../js/jquery321.js"> 
<script  type="text/javascript" > 
str=0 ;
$(document).ready(function(){
 $("select.country").change(function(){
	var selectedmonth = $(this).children("option:selected").val();
  	var xx.value = selectedmonth ;
  alert(xx) ;
 
 
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
						document.getElementById("image").src= "/fees/image/tulips.jpg" ;
						document.getElementById("mothername").value = '';
						document.getElementById("gender").value = '';
						//document.getElementById("charges").value = '';
						//document.getElementById("concession1").value ='' ;
						//document.getElementById("tsplconcession").value = '';
					    //document.getElementById("nbalance").value ='' ;
				
				}
				else
				{	document.getElementById("acno").value = columns[0];
						document.getElementById("name").value=columns[1];
						document.getElementById("tclass").value=columns[2];
						document.getElementById("fathername").value=columns[3];
						document.getElementById("mobileno").value=columns[4];
						document.getElementById("image").src= "/fees/image/" +columns[5];
						document.getElementById("mothername").value = columns[6];
						document.getElementById("gender").value = columns[7];
						//document.getElementById("charges").value = columns[8];
						//document.getElementById("concession1").value =columns[9] ;
						//document.getElementById("tsplconcession").value = columns[10];
					    //document.getElementById("nbalance").value = columns[11] ;
						document.getElementById("newold").value =columns[15]; 
					 //alert(columns);
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
  alert(str1);





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
// function to call fee slip month wise
 function gval() {
  var   acno = document.getElementById("acno").value ;
	 
	
	$.ajax({
			url:"gettrans.php",
			method:"post",
			data :{tacno:acno},
			success:function(data)
			{
				
			 $('#result').html(data);
			// alert(data) ;
			 
			// var res = JSON.parse(data);
			// $('#result').html(data);
			 //var mb = data.split(",") ;
			// alert(columns[4]);
			//var mb = $('#result').text();
			// alert(mb.value) ;
			// alert(data) ;	
			
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
	   var n = selmon.includes("NOT");
	   if (n==false)
	   {
		alert(selmon.replace("PAID","") + " fees already paid, select different month");
		 document.getElementById("tuition").value=0;
		  document.getElementById('examcharge').value=0;
		  document.getElementById('net').value=0;
		 
		 return
	   }
	  selind = selind + 1 ;
	  //alert(selind);
	if (selind==1 || selind==2 || selind==3 || selind==5 ||  selind==6 || selind==7 || selind==8 ||  selind==10 ||  selind==11)
	{		document.getElementById("admfee").value= 0 ;
			document.getElementById("annual").value=0;
			document.getElementById("tuition").value=document.getElementById("ttuition").value;
			document.getElementById("bookcharge").value=0;
			document.getElementById("stationarycharge").value=0;
			document.getElementById("diarycharge").value=0;
			document.getElementById("examcharge").value=0;
			document.getElementById("misccharge").value=0;
			document.getElementById("splconcession").value=0 ;
	} else 
		if (selind==9 || selind==12) { 
			
			document.getElementById("admfee").value= 0 ;
			
			
			document.getElementById("annual").value=0;
			
			document.getElementById("tuition").value= document.getElementById("ttuition").value;
			document.getElementById("bookcharge").value=0;
			document.getElementById("stationarycharge").value=0;
			document.getElementById("diarycharge").value=0;
			
			document.getElementById("examcharge").value=document.getElementById("texamcharge").value;
			document.getElementById("misccharge").value=0;
		document.getElementById("splconcession").value=0 ;
		}else if (selind==4){
			
			document.getElementById("admfee").value= document.getElementById("tadmfee").value ;
			
			
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
	 gtotal  = (admfee*1 +annual*1 +tuition*1 + bookcharge*1 + stationarycharge*1 +diarycharge*1 + misccharge*1  ) ;
	 var disc ;
	 disc= 0 ;
	 if (concession1 ==1){  
	 disc = 0 ;}
	 else {
		disc =parseInt((gtotal*concession1*1)/100) ;
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
	 document.getElementById('balance').value=balance ;  
}
		
</script>


<script>
function setnet() { 
	 var net = document.getElementById('net').value;
	 var amtdeposit =document.getElementById('amtdeposit').value ;
	 var balance =document.getElementById('balance').value ;
 	 balance = net*1-amtdeposit*1 ;
	 document.getElementById('balance').value=balance ;  
			} 
	function getDate(){ 
	    var today = new Date();

document.getElementById("edate").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
}	
</script>
<script>
function sel() {
	var selmon= $("#trans :selected").text();
	var mb = (selmon.trim()).split(" ") ;
    document.getElementById("id").value = mb[0];
 //alert(mb[2]);
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
 
  

    <body>  
        <div id = "boxes"> 
<fieldset class="field_set">           
		   <legend style="font-size:28px; color:blue" >Print Fees Slip:</legend>
              
            <div id = "leftbox"> 
	

<!-- <p id='msg' style="color:red; font-size:20" >
<?php echo ($res); ?>
</p>
	---> 
		
		
<form action="report1.php" method ="post"   id="form1"   >
  <label for="SEARCH " style="font-size:18px;color:blue" >Search : Account/Name/Fathername </label> 
  
  <input type="text" name ="search1" id="search1" placeholder="Search" style="height:35;width:280;font-size:18px" onkeyup="gval()" autocomplete="off">

  
<br>
<br>
  <label for="ACCOUNT NO" style="font-size:18px;color:blue;" >ACCOUNT NO </label> <br>
  
  <input type="text" name ="acno" id="acno"  style="height:35;width:280;font-size:18px" >
    
	<label  for="STATUS "   >STATUS </label>
	<input  name="newold" id="newold"  style="font-size:18px;height:35;width:50" />
	
	 <br>
	 <label for="class name" style="font-size:18px;color:blue;" >CLASS </label> <br>
 
<input type="text" name="tclass" id="tclass"  style="font-size:18px;height:35;width:280" READONLY >
	<br>
	<br>
	<label for="Date " style="font-size="18px">DATE  </label>
<br>
<input type="date" name="edate" id="edate"  style="height:35;width:280;font-size:18px ">

<!-- </div id="txtHint"> -->	 
<input type="hidden" id="temp_class" name="temp_class" > 
<br>
<br>			
		
	<img style="border-radius: 50%; width :50px;height :50px" id="image" src='/fees/image/tulips.jpg' alt="your image" />
	 <br>
	<label for="STUDENT NAME" style="font-size="14px";>STUDENT NAME </label> 
<br>
<input type="text" name="name" id="name"  placeholder="STUDENT NAME *" style="height:35;width:280;font-size:18px" value="" READONLY>
<label for="GENDER" style="font-size="18px">GENDER </label> 

<input type="text" name="gender" id="gender" style="height:35;width:60;font-size:18px" value="" READONLY>
  
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
			<label for="SLIP" style="font-size="22px">SELECT SLIP TO PRINT</label>
		<div id="result" style="color:red; font-size="22px"> 
	 </div>	
<input type="hidden" name="id" id="id"  style="height:35;width:280;font-size:18px" READONLY>

     
				
				
            </div> 
              
            <div id = "middlebox"> 
               





 
 
 
 
 
</div>
      
 <!--- <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit1">
</form>
  
<button class="button" type="Submit" name="Submit" id="Submit" value="Submit" onclick="report1.php" >Submit  </button>
-->
	 		 	 




 


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







