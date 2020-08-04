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

$tannual= "347438" ;
?>
 



<html>
<head>
<link rel="stylesheet" href="../css/styles.css">
<body>


<script type="text/javascript"  src="/fees/jquery321.js"> 
<script  type="text/javascript" > 

$("#tclass1").changefunction() {
 $.ajax({
    type: "GET",
    url: 'test3.php',
    dataType: "json",
    success: function(response) {
       item=JSON.parse(response);
        console.log(item);
        alert(item.num1);
    }
});

</script>




<?php
		include '../dbconn.php' ;
		//include   'top.php' ;
		include 'menu.php';
		//include 'grno.php'; 
		include 'class.php';
		//include 'party.php';
		//include 'station.php';
       
?>





<form class="form-style-5"   id="form1" name="form1" onload="getDate()">
<table >
 

 <!--- <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit1">
</form>
 --->    
<div id="responsive-form" class="clearfix">
<legend><span class="number">1</span> STUDENT INFO</legend>
<div class="form-row">
<div class="column-full"> <select name="tclass" id="tclass1"  >


	 
 <?php
	$co1=0 ;
	while ($co1 <count($tclass)){
	?>
	<option value= "<?php echo  $tclass[$co1] ?>" >   <?php echo $tclass[$co1]?> </option>;
	<?php $co1=$co1+1;
	}
?>
	 

</select>
 
<div class="form-row">
<div class="column-half"> <input type="number" name ="acno" placeholder="ACCOUNT NO"></div>
<div class="column-half"><input type="text" name="name" placeholder="STUDENT NAME *"></div>
<div>
<div class="form-row">
<div class="column-half"><label for="date of birth">DATE OF BIRTH</label>
<input type="date" name="dateofbirth" placeholder="DATE OF BIRTH "></div>
<div class="column-half"><label for="date of JOINING">DATE OF JOINING</label>
<input type="date" name="dateofjoining" placeholder="DATE OF JOINING "></div>
</div>

<div class="form-row">
<div class="column-half"><input type="text" name="fathername" placeholder="FATHER'S NAME"></div>
<div class="column-half"><input type="text" name="mothername" placeholder="MOTHER'S NAME"></div>
</div>

<div class="form-row">
<div class="column-half"><input type="number" name="mobileno" placeholder="MOBILE NUMBER"></div>
<div class="column-half"><input type="number" name="tannual" id="tannual" value= "<?php echo $tannual ?>" >  </div>
</div>
<div class="form-row">
<div class="column-full">Subject [text* your-subject]</div>
</div>

<div class="form-row">
<div class="column-full">Your message  [textarea your-message]</div>
</div>

<div class="form-row">
<div class="column-full"><button  class="form-style-5"    type="Submit" name="Submit" id="Submited" value="Submit">Submit  </button>
 </div>
</div>

</div><!--end responsive-form-->




</td>
</tr>


  
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


<?php
//include 'viewfee.php'; 
?>
</head>
</body>
</html>
