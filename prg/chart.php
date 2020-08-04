<?php
 
$dataPoints1 = array( 
	array("label" => "20+ years",  "y" => 70.89 ),
	array("label" => "30+ years", "y" => 72.80 ),
	array("label" => "40+ years", "y" => 75 ),
	array("label" => "50+ years",  "y" => 68 )
);
 
$dataPoints2 = array( 
	array("label" => "20+ years",  "y" => array(74.43, 67.35)),
	array("label" => "30+ years", "y" => array(76.40, 69.2)),
	array("label" => "40+ years", "y" => array(78.75, 71.25)),
	array("label" => "50+ years",  "y" => array(71.4, 64.6))
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title: {
		text: "Average Resting Heart Rate by Age"
	},
	subtitles: [{
		text: "BPM = Beats Per Minute"
	}],
	axisX: {
		title: "Age Group"
	},
	axisY: {
		title: "Resting Heart Beat (in BPM)",
		gridThickness: 0,
		lineThickness: 1,
		includeZero: false
	},
	toolTip: {
		shared: true
	},
	data: [{
		type: "column",
		name: "Mean Heart Rate",
		yValueFormatString: "#,##0.00 BPM",
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "error",
		name: "Acceptable Variation",
		yValueFormatString: "#,##0.00 BPM",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                    