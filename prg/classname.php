<?php 
session_start() ;
//  code to enter class name 

?>
 

<!DOCTYPE html>
<html>
<head>

 <style>
 #leftbox { 
                float:left;  
                background: #ebe2da;
                width:460px;
                height:250px; 
				padding :1px;
				margin-left : 10px ;
				margin-top : 0px;
				border: 1px red solid;
 				
            } 
            #middlebox{ 
                float:left;  
                background: #ddebf0; 
                width:300px;
                height:900px; 
				border : auto;
				padding :1px;
				border: 1px red solid;
				
            } 
            #rightbox{ 
                float:right; 
                background: #e7f0dd; 
                width:300px;
                height:900px; 
				padding :1px;
				border: 1px red solid;
 			 
            } 
			.field_set{
 border-color:#F00;
 margin-top :20px;
 margin-left : 250px;
 
}
   table,   th, td {
        padding: 10px ;
        border: 2px solid red; 
		border-collapse : collapse ;
		margin : 3px;
		
  		 }
.my
{
	font-size:18pt;
	height:30px;
	border : 1px solid blue;
	width: 200px;
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
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  position: relative;
  	top: 45%;
  	left: 40%;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button1 {
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
}
div {
  border-radius: 5px;
  background-color: light blue;
  padding: 10px;
  
 }
</style>
	<script  type="text/javascript"  src="../js/jquery321.js"> </script>
<script  type="text/javascript" > 
 
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



	function gohome()
{
window.location.href="../prg/frame.html"
}

	</script>
	
<?php
		include '../dbconn.php' ;
		//include   'top.php' ;
		include 'menu.php';
		//include 'grno.php'; 
		include 'class.php';
		include 'class1.php'
		//include 'party.php';
		//include 'station.php';
        
?>
<?php
include 'viewclass.php';
?>
 <body >
 <div id="boxes">
<fieldset class="field_set" >
<legend style="font-size:28px; color:blue" >Adding Class Name</legend>
             
	<div  id="leftbox">
	<form action="classadd.php" method ="post"  id="form1" name="form1" onload="getDate()">
<table >
 <tr> 
 <td  align="center"   colspan="2" style ="background-color: #FFFF66"  > 
 ADDING RECORDS 
 </td>
 </tr>
 <tr>
 
		<th>CLASS NAME    </th>
		<th> POSIITION </th>
		
		
		
	</tr>
<tr>
<td>
<input class="my" type="text" id="classname" name ="classname" >
 </td>
 <td>
 <input class="my" type="text" id="position" name ="position" >
 </td>
	 

 
 
</tr>

</table>
 
 <button  class= "button"  onclick="classadd.php" type="submit" form="form1" name="Submit" id="Submit" value="Submit">Submit  </button>
 </div>
 </fieldset>
</form>




</head>
</body>
</html>
