
<?php 
session_start() ;
// echo "RAJDHANI EXPRESS ".$_SESSION["company"];
$compname = $_SESSION['company'];
$fileno =$_SESSION['file'] ;
$file="file".$fileno ;
$party ="party".$fileno ;
$truck ="truck".$fileno ;
$station ="station".$fileno ;

// include 'menu.php' ;
?>
<html>
<head>
<body>
<?php echo nl2br ("RAJDHANI EXPRESS               [ ".  $compname. " ]."); 
echo  "<br>" ; ?> 
<?php 
include 'menu.php';
?> 
</body>
</head>
</html>
