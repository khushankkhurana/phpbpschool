<?php 
session_start() ;
// echo "RAJDHANI EXPRESS ".$_SESSION["company"];
$compname = $_SESSION['company'];
// include 'menu.php' ;
?>
<html>
<head>
<body>
<style> 
.button {
	background-color: #008CBA;
	border-radius: 8px;
	color: red;
	position: absolute;
  	top: 13%;
  	left: 20%;
	
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
   cursor: key;
   </style>
<script>
// var comp = "<?php echo $compname ?>" ;
</script>
<h5> <?php echo "RAJDHANI EXPRESS               [ ".  $compname. " ]"?>  </h5> ;
<form name="form2" id ="form2" >

<button class="button" type="Submit" onclick="../rajdhani/prg/addfile.php" form="form2" > RECORD INSERTED SUCCESSFULLY </button>
</form2> 
</body>
</head>
</html>