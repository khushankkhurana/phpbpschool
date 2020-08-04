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
?>
 



<html>
<head>
<script> 

    $(document).ready(function() {
        var response = '';
        $.ajax({
            type: "GET",
            url: "getuser1.php",
            async: false,
            success: function(text) {
                response = text;
            }
        });

        alert(response);
    });
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
<div class="form-row" >
 <div >
<select class="" name="tclass" id="tclass" onchange="showUser(this.value)" > 

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
<div class="column-half"><input type="number" name="tannual" id="tannual" value= "<?php echo $tannual ?>"  >  </div>
</div>


<div class="form-row">
<div class="column-full">Your message  [textarea your-message]</div>
</div>

<div class="form-row">

</div>

</div><!--end responsive-form-->
</form>
<div
><b>Person info will be listed here.</b></div>
</div>



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


<?php
//include 'viewfee.php'; 
?>
</head>
</body>
</html>
