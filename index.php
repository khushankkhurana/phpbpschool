<?php
session_start();{
//$_SESSION['views'] = 1; 
//$_SESSION['schoolname'] = "Public School"; 
//$_SESSION['line1'] = "Railway Road, Palwal";
}
//echo $_SESSION['username'];
?>

<html>
<head>
<title>User Login</title>
</head>
<body>

<?php
 session_unset();  
 unset($_SESSION);
	
if(isset($_SESSION["username"])) {
	
?>
<?php echo "Welcome" . $_SESSION["username"] . "Click here to" ?>  <a href="logout.php" title="">Logout 
<?php
header("location:../prg/menu.php");
}else 
{//echo "<h1>Please login first .</h1>";

?>
<a Click here to href="login.php" title="Login"> 
<h2>     Click to Login </h2>
<img src="../icon/logo.jpg" alt="Trulli" width="400" height="550 align="center">
<?php
}
?>

</body>
</html>