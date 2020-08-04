<?php
$schoolname ="Public School" ;
$line1 = "New Colony, Palwal";
?>
<!Document html>
<html>
<head>
</head>
<style>
.greeting h1 {
  font-family: 'Raleway', sans-serif;
  font-weight: lighter;
  font-size: 60px;
  text-align: center;
  margin-bottom: 0;
}
.greeting h2 {
  font-family: 'Raleway', sans-serif;
  font-weight: lighter;
  font-size: 35px;
  line-height: 0px;
  text-align: center;
  margin-top: 10px;
}
.Title
    {
        display: table-caption;
        text-align: center;
        font-weight: bold;
        
		width : 500px;
		margin-top : 10px;
		line-height: 5px;
		left-margin:0px'
	}
</style>
<body>
<div class="Title">
		<img style align="left" width="90" height="90" id="image" src="<?php echo $logo ?>" alt="logo"  />  
		<h1 class="greeting"> <?php echo $schoolname ?></h1>
		<h2 class="greeting"> <?php echo $line1 ?> </h2>
</body>
</head>
		