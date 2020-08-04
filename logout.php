<?php
//include "dbconn.php";

//include "login.php";  // Check user token

// Check user login or not
if(!isset($_SESSION['username'])){
     session_unset();  
 unset($_SESSION);
header('Location:index.php');
}

// logout
//if(isset($_POST['logout'])){

 
 //session_destroy();
 session_unset();  
 unset($_SESSION);
  //echo $_SESSION['username'];
 //sleep(5);
 header('Location:index.php');
//}

// Generate token


?>


<!---  
 
  
session_start();//session is a way to store information (in variables) to be used across multiple pages.  
session_destroy();  
header("Location:/fees/login.php");//use for the redirection to some page  
?> 
 --->