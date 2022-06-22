<?php
 if(isset($_POST["signout-btn"])){
  session_start();
  session_unset();
  session_destroy();
  header("location: login.php");
 }