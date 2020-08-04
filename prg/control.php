<?php
  session_start();

  if(!(isset($_SESSION["login"]) && $_SESSION["logged"] == "OK")) {
    header("Location: /fees/login.php");
    exit;
}
?>