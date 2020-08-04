<?php
session_start() ;
$schoolname = $_SESSION['schoolname'] ;
$mail = $_SESSION['email'];
$line1 = $_SESSION['line1'];
$logo = $_SESSION['logo'];
//echo $line1 ;

?>
<!Document html>
<html>
<head>
</head>
<style>
h1 {
  font-family: 'Raleway', sans-serif;
  font-weight: lighter;
  font-size: 25px;
  text-align: center;
  margin-bottom: 0;
}
h2 {
  font-family: 'Raleway', sans-serif;
  font-weight: lighter;
  font-size: 20px;
  line-height: 0px;
  text-align: center;
  margin-top: 10px;
}
.Title
    {
        display: table-caption;
        text-align: center;
        font-weight: bold;
        
		width : 800px;
		margin-top : 10px;
		line-height: 5px;
		left-margin:0px'
	}
</style>
<body>
<div class="Title">
		<img style align="left" width="90" height="90" id="image" src="<?php echo $logo ?>" alt="logo"  />  
		<h1 > <?php echo $schoolname ?></h1>
		<h2>  <?php echo $line1 ?> </h2>
		
</body>
</head>
		