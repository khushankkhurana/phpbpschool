<html>
<head>
<body>
<?php 
session_start() ;

?>
 




<link rel="stylesheet" href="../css/styles1.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}

a:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #f1f1f1;
  color: black;
}

.next {
  background-color: #4CAF50;
  color: white;
}

.round {
  border-radius: 50%;
}
.starthidden {
    display: none;
	margin-left:250;
  }
</style>
   

<script type="text/javascript"  src="../js/jquery321.js"> </script>
<script  type="text/javascript" > </script>
<script>
function attrep() {
   
   var startdate = document.getElementById("startdate").value ;
   var enddate = document.getElementById("enddate").value ;
	var tclass= document.getElementById("tclass1").value;
	
	//alert("hello");
	 $.ajax({
			url:"attendreport.php",
			method:"post",
			data :{startdate:startdate , enddate:enddate , tclass:tclass},
			success:function(data)
			{
				
			// $('p').html(div_data);
			 //alert(data) ;
			 
			 //var res JSON.parse(data);
			 $('#result').html(data);
			 //var mb = data.split(",") ;
			
			
			}
			
			
			
		});
	}
 function calend() {
   //document.getElementById("mdate").style.display =block ;
   var month = document.getElementById("month").value ;
   var year = document.getElementById("year").value ;
	var tclass= document.getElementById("tclass").value;
	
	//alert("hello");
	 $.ajax({
			url:"calendar1.php",
			method:"post",
			data :{year:year , month:month ,tclass:tclass},
			success:function(data)
			{
				
			// $('p').html(div_data);
			 //alert(data) ;
			 
			 //var res JSON.parse(data);
			 $('#result').html(data);
			 //var mb = data.split(",") ;
			
			
			}
			
			
			
		});
	}
 function mon() {
	  var month=document.getElementById("month").value ;
	   var year=document.getElementById("year").value ;

	  month = month*1 +1 ;
	  if (month==13)
	  {month=1 ;
        year=year*1+1 ;
	  }
	  document.getElementById("month").value=month ;
	  document.getElementById("year").value=year ;
	  calend();
 }
 function mon1() {
	  var month=document.getElementById("month").value ;
	   var year=document.getElementById("year").value ;

	  month = month*1 -1 ;
	  if (month==0)
	  {month=12 ;
        year=year*1-1 ;
	  }
	  document.getElementById("month").value=month ;
	  document.getElementById("year").value=year ;
	  calend();
 }
 function button(click) {
	 document.getElementById(click).value="A";
	 var x =click;
	  var acno=x.split(".");
	acno = acno[0] ;
	//alert(acno);
	var date= document.getElementById("date").value;
	//alert(date);
	$.ajax({
			url:"insertattend.php",
			method:"post",
			data :{acno:acno , date:date},
			success:function(data)
			{
				
			// $('p').html(div_data);
			 //alert(data) ;
			 
			 //var res JSON.parse(data);
			 // $('#result').html(data);
			 //var mb = data.split(",") ;
			
			
			}
			
			
			
		});
	}
	function dispdate(){
		document.getElementById("mdate").style.display="block";
	}
 
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
<body onload="SetDate()">


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
// function to get current year and month value
$mon = date('m')  ;
$year = date('Y');
//	   $mon="6" ;
//	   $year="2020" ;
	   ?>
	   <br>
	   
<input type="hidden" id="month" value=<?php echo $mon ?> />
<input type="hidden" id="year" value=<?php echo $year ?> />
<input type="hidden" id="date" name="date" />
<select  name="tclass" id="tclass"  onclick="calend()" style="font-size:18px;height:35;width:250;margin-left:250" required >

	<option value="" disabled selected>Choose Class Name</option>
 <?php
	$co1=0 ;
	while ($co1 <count($tclass1)){
	?>
	<option value= "<?php echo $tclass1[$co1] ?>" >   <?php echo $tclass1[$co1] ?> </option>;
	<?php $co1=$co1+1;
	}
?>
</select>
<!--<a href='javascript: calend()' > Attendance </a>
--->
<a href='javascript: mon1()' class="previous">&laquo; Previous</a>
<a href='javascript: mon()' class="next">Next &raquo;</a>
<a href='javascript: dispdate()' >Report &raquo;</a>
<!---
<a href='javascript: mon1()' class="previous round">&#8249;</a>
<a href='javascript: mon()' class="next round">&#8250;</a> 
 <br>
 -->
 
 
  
  
   <div class="starthidden" id="mdate">
 <br>
 <table>
  <tr>
   <th style="width:200;height:40;font-size:18"> From Date </th>
   <th style="width:200;height:40;font-size:18"> To Date </th>
<th style="width:200;height:40;font-size:18"> Select Class </th>

</tr>
   <tr>
<td>   
 <input style="width:180;height:40;font-size:18" type="date" name="startdate" id="startdate" onchange="attrep()" />
</td>
<td>

<input style="width:200;height:40;font-size:18" type="date" name="enddate" id="enddate" onchange="attrep()"/>
</td>
<td>
<select  name="tclass1" id="tclass1"  onclick="attrep()" style="font-size:18px;height:35;width:250" required >

	<option value="" disabled selected>Choose Class Name</option>
 <?php
	$co1=0 ;
	while ($co1 <count($tclass1)){
	?>
	<option value= "<?php echo $tclass1[$co1] ?>" >   <?php echo $tclass1[$co1] ?> </option>;
	<?php $co1=$co1+1;
	}
?>
</select>
</td>
</tr>
</table>
</div> 
<br>
<br>
  <div id="result">
  </div>      
</head>

</body>
</html>







