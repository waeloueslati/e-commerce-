<?php
 if (isset($_POST['submit'])) {
    require_once "dbh.inc.php";
    /*require_once "forget_password_inc.php";*/
    session_start();
    $email=$_SESSION["email"];
    $new_pass = mysqli_real_escape_string($conn, $_POST['password']);
    $new_pass_c = mysqli_real_escape_string($conn, $_POST['rpassword']);
  
    // Grab to token that came from the email link
    /*$token = $_SESSION['token'];
    if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
    if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
    if (count($errors) == 0) {*/
      // select email address of user from the password_reset table 
      /*$sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
      $results = mysqli_query($conn, $sql);
      $email = mysqli_fetch_assoc($results)['email'];
  
      /*if ($email) {*/
    $sql = "UPDATE utilisateur SET mot_passe=? WHERE gmail_util='$email'";
    $stmt=mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql);
    $hashedpwd = password_hash($new_pass,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"s",$hashedpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../password_confirmation.php?error=none");
}

  