<?php 
//session_start() ;
// echo "RAJDHANI EXPRESS ".$_SESSION["company"];
//$compname = $_SESSION['company'];
//$fileno =$_SESSION[/'file'] ;
//$file="file".$fileno ;
//$party ="party".$fileno ;
//$truck ="truck".$fileno ;
//$station ="station".$fileno ;
// include 'menu.php' ;
//echo "RAJDHANI EXPRESS               [ ".  $compname. " ]"  ;
// echo  "<br>" ;
$res = "" ;
?> 


<!DOCTYPE html>
<html>
<head>
<body>
 <style>
 thead {color:green;}
tbody {color:blue;}
tfoot {color:red;}

   table,   th, td {
        padding: 20px ;
        border: 2px solid red; 
		border-collapse : collapse ;
		left-margin :100px;
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
	background-color: #f54295;
	border-radius: 8px;
	color: white;
	position: absolute;
  	top: 100%;
  	left: 70%;
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
<script type="text/javascript"  src="/fees/jquery321.js"> </script>
	<script>
	$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
	function dele() {
  var   tstation = document.getElementById("station").value ;
	 
	
	$.ajax({
			url:"delstation1.php",
			method:"post",
			data :{station:tstation},
			success:function(data)
			{
				
					 
			 //var res = JSON.parse(data);
			// $('#result').html(data);
			
			}
			
			
			
		});
	}
 </script>
 
	
<?php
		include 'menu.php';
		//include 'grno.php'; 
		//include 'truck.php';
		// include 'party.php';
		include 'transport.php'; 
?>
<div>
<form action="" method ="post"  id="form1" name="form1" >
<table align="center" >
 <tr> 
 <td  align="center" colspan="2"   style ="background-color: #ede1e7"  > 
 DELETING STATION RECORDS 
 </td>
 </tr>
  
  <th> Select Station Name </th>
 <td>
  <select class ="my1" name="station" id="station"  >
	
 <?php
   // echo $res ; 
	$co1=0 ;
	while ($co1 <count($tstation)){
	  ?>
	<option value= "<?php echo  $tstation[$co1]  ?>"  selected >  <?php echo $tstation[$co1] ?> </option>;
	  
	  <?php  $co1=$co1+1;
	
	}
?>
	 
</td>
	</tr>

  <button class="button" onclick="dele()" type="submit" form="form1" name="Submit" id="Submit" value="Submit">Delete  </button>
</table>
</form>
</div>




</head>



</body>
</head>
</html>
