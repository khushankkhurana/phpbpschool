<?php
include "../dbconn.php" ;
$class=Array() ;
$sql="SELECT * FROM class_wise ";
//$annual=88273;  
$result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($result))  {
  
  $class[] =  $row['class_name'];
  //echo $row['class_name'];
  }
  $value=Array();
  $co1=0 ;
  $tval=0;
				while ($co1 <count($class)){
			
  $sql="SELECT sum(paid) $tval FROM transaction where tclass_name='$class[$co1]' ";
   $value[$co1]=$tval ;
   //echo $tval ;   
	$co1=$co1+1 ;			}  
Mysqli_close($conn);
//$x=3000;
 //$ed="Education";
$co1=0 ;
				while ($co1 <count($class)){

 
$dataPoints = array(
	array("label"=> $class[$co1], "y"=> $value[$co1]),
);			
$co1=$co1+1 ;		
	}
	
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Top 10 Google Play Categories - till 2017"
	},
	axisY: {
		title: "Number of Apps",
		includeZero: false
	},
	data: [{
		type: "column",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script type="text/javascript" src="../js/canvasjs.min.js"></script>
</body>
</html>                      