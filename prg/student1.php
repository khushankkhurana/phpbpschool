<?php 
session_start() ;
// echo "RAJDHANI EXPRESS ".$_SESSION["company"];
				// $compname = $_SESSION['company'];
				//$fileno =$_SESSION['file'] ;
				// $file ="file". $fileno ;
				//$party ="party".$fileno ;
				//$truck ="truck".$fileno ;
				// $station ="station".$fileno ;

// include 'menu.php' ;
//echo "RAJDHANI EXPRESS               [ ".  $compname. " ]  "  ;
// echo  "<br>" ;

$tannual= "" ;
//$value = array(5,3,1,2)
// $value[0] ="111" ; 
?>
 



<html>
<head>
<script  type="text/javascript"  src="/rajdhani/jquery321.js"> </script>
<script  type="text/javascript" > 
function txtHint(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(response) {
    if (this.readyState == 4 && this.status == 200) {
		
	document.getElementById("txtHint").innerHTML = this.responseText;
  var xx =document.getElementById("txtHint").innerText = this.responseText;
  var xxx =to_json(document.getElementById("txtHint").innerText = this.responseText)  ;
alert(xxx); 
   
    }
  };
  xhttp.open("GET", "getuser1.php?q="+str, true);
  xhttp.send();
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





<form    id="form1" name="form1" ">
<table >
 

 <!--- <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit1">
</form>
 --->    
<div >
<legend><span class="number">1</span> STUDENT INFO</legend>

<div >
<select class="" name="tclass" id="tclass" onchange="txtHint(this.value)" > 
<!-- onchange="showUser(this.value)" -->
<option>  SELECT CLASS  </OPTION> 
 <?php
	$co1=0 ;
	while ($co1 <count($tclass)){
	?>
	<option value= "<?php echo $tclass[($co1)] ?>" >   <?php echo $tclass[$co1]?> </option>;
	<?php $co1=$co1+1;
	}
?>
	 

</select>
 <div id="txtHint" >
 </div>
 
<div class= "" <input type="number" name="tannual" id="tannual" value="enter" "<?php echo $tannual ?>"  >  </div>
</form>

<div >
   <table id="userTable" border="1" >
      <thead>
        <tr>
          <th width="5%">adm_fee</th>
          <th width="20%">annual_charge</th>
          <th width="20%">tuition_fee</th>
          <th width="30%">adm_fee</th>
        </tr>
      </thead>
      <tbody></tbody>
   </table>
</div>
<!--end responsive-form-->






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
