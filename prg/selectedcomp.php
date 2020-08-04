 
<?php 
session_start() ;
// echo "RAJDHANI EXPRESS ".$_SESSION["company"];
$compname = $_SESSION['company'];
// include 'menu.php' ;
?>
<html>
<head>
<body>
<script>
// var comp = "<?php echo $compname ?>" ;
</script>
<h5> <?php echo "RAJDHANI EXPRESS               [ ".  $compname. " ]"?>  </h5> ;
<?php 
include 'addfile.php';
?> 
</body>
</head>
</html>
