<?php
ob_start() ;
session_start();
//session_start();//session starts here
//define('MY', "hello");

?>
<!DOCTYPE html><html class=''>

        <!-- LOGIN MODULE -->


<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login Page - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href= __DIR__"/bpschool/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/bpschool/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/bpschool/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/bpschool/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/bpschool/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/bpschool/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/bpschool/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/bpschool/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/bpschool/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/bpschool/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="/bpschool/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="/bpschool/app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/bpschool/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="/bpschool/app-assets/images/pages/login.png" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Login</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Welcome back, please login to your account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form role="form" method="post" action="login.php" >
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" id="username1" name="username1" placeholder="Username" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="user-name">Username</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Password" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">Password</label>
                                                    </fieldset>
                                                    <div class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">Remember me</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="text-right"><a href="auth-forgot-password.html" class="card-link">Forgot Password?</a></div>
                                                    </div>
                                                    <a href="auth-register.html" class="btn btn-outline-primary float-left btn-inline">Register</a>
                                                    <button type="submit" class="btn btn-primary float-right btn-inline" id="login" name="login"  onclick="login.php">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="login-footer">
                                            <div class="divider">
                                                <div class="divider-text">OR</div>
                                            </div>
                                            <div class="footer-btn d-inline">
                                                <a href="#" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>
                                                <a href="#" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a>
                                                <a href="#" class="btn btn-google"><span class="fa fa-google"></span></a>
                                                <a href="#" class="btn btn-github"><span class="fa fa-github-alt"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="/bpschool/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/bpschool/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/bpschool/app-assets/js/core/app-menu.js"></script>
    <script src="/bpschool/app-assets/js/core/app.js"></script>
    <script src="/bpschool/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>






<?php

include("dbconn.php");

if(isset($_POST['login'])){
 $uname = $_POST['username1'];
 $password = md5($_POST['pass1']);
 if ($uname != "" && $password != ""){

  $sql_query = "select count(*) as cntUser from users where user_name='".$uname."' and user_pass='".$password."'";
  $result = mysqli_query($conn,$sql_query);
  $row = mysqli_fetch_array($result);

  $count = $row['cntUser'];
$sql_query = "select *from users where user_name='".$uname."' and user_pass='".$password."'";
  $result = mysqli_query($conn,$sql_query);
  $row = mysqli_fetch_array($result);
  $mail = $row['user_email'];
   $usertype = $row['user_type'] ;
  if($count > 0){
   $token = getToken(10);
   $_SESSION['username'] = $uname;
   $_SESSION['token'] = $token;
   $_SESSION['schoolname'] = "TAGORE SHIKSHA NIKETAN SCHOOL" ;
   $_SESSION['line1'] = "Thai Mohalla,Palwal" ;
   $_SESSION['logo'] = "../icon/logo.jpg";
   if ($usertype=='admin')
   $_SESSION['counter'] = 1;
    else
		$_SESSION['counter'] = 2;
   $_SESSION['email'] = $mail ;
   // Update user token
   $result_token = mysqli_query($conn, "select count(*) as allcount from user_token where username='".$uname."'");
   $row_token = mysqli_fetch_assoc($result_token);
   if($row_token['allcount'] > 0){
    mysqli_query($conn,"update user_token set token='".$token."' where username='".$uname."'");
   }else{
    mysqli_query($conn,"insert into user_token(username,token) values('".$uname."','".$token."')");
   }
   mysqli_close($conn);

   header('Location:/bpschool/prg/menu.php');
   exit();
  }else{
   echo "Invalid username and password";
  }

 }
}include("dbconn.php");//make connection here
if(isset($_POST['register']))
{
    $user_name=$_POST['username'];//here getting result from the post array after submitting the form.
    $user_pass=md5($_POST['pass']);//same
    $user_email=$_POST['email'];//same


    if($user_name=='')
    {
        //javascript use for input checking
        echo"<script>alert('Please enter the name')</script>";
exit();//this use if first is not work then other will not show
    }

    if($user_pass=='')
    {
        echo"<script>alert('Please enter the password')</script>";
exit();
    }

    if($user_email=='')
    {
        echo"<script>alert('Please enter the email')</script>";
    exit();
    }
//here query check weather if user already registered so can't register again.
    $check_email_query="select * from users WHERE user_email='$user_email'";
    $run_query=mysqli_query($conn,$check_email_query);

    if(mysqli_num_rows($run_query)>0)
    {
echo "<script>alert('Email $user_email is already exist in our database, Please try another one!')</script>";
exit();
    }
//insert the user into the database.
    $insert_user="insert into users (user_name,user_pass,user_email) VALUE ('$user_name','$user_pass','$user_email')";
    if(mysqli_query($conn,$insert_user))
    {
        echo"<script>window.open('login.php','_self')</script>";
    }
}



// Generate token
function getToken($length){
 $token = "";
 $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
 $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
 $codeAlphabet.= "0123456789";
 $max = strlen($codeAlphabet); // edited

 for ($i=0; $i < $length; $i++) {
  $token .= $codeAlphabet[random_int(0, $max-1)];
 }

 return $token;
}
