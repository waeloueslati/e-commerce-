<?php
   if(isset($_POST['submit'])) {
     $email=$_POST["email"];  
     require_once "dbh.inc.php";
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $query = "SELECT gmail_util FROM utilisateur WHERE gmail_util='$email'";
     $results = mysqli_query($conn, $query);
    if(mysqli_num_rows($results)==1){
        session_start();
        $_SESSION["email"];
        $sql = "INSERT INTO password_reset(email, token) VALUES ('$email', '$token')";
        $results = mysqli_query($conn, $sql);
        $to = $email;
        $subject = "Reset your password on TICDSTORE.com";
        /*$msg = "Hi there, click on this <a href=\"new_pass.php?token=" . $token . "\">link</a> to reset your password on our site";
        $msg = wordwrap($msg,70);*/
       /*$msg="<a href='https://www.google.fr/'>link</a>";*/
       $msg="Hi,"."<br>";
       $msg.="we noticed that you are having problems with loging in to our website"."<br>";
       $msg.="just click the link below and you will be able to change your password"."<br>";
       $msg.="<a href='http://localhost:8080/TICD/password_confirmation.php'>change password</a>"."<br>";
       $msg.="have a nice day ";
       $headers  = 'MIME-Version: 1.0' . "\r\n";
       $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
       $headers .= "From: infoadmin@gmail.com";
       mail($to, $subject, $msg, $headers);
       header('location: ../pending.php?email=' . $email);
    }else if(mysqli_num_rows($results) <= 0) {
        header("location: ../forget_password.php?error=therenoaccountbythisemail");
        exit();
    
   }

}
/*if (isset($_POST['new_password'])) {
  $new_pass = mysqli_real_escape_string($conn, $_POST['password']);
  $new_pass_c = mysqli_real_escape_string($conn, $_POST['rpassword']);

  // Grab to token that came from the email link
  $token = $_SESSION['token'];
  if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
  if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
  if (count($errors) == 0) {
    // select email address of user from the password_reset table 
    $sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
    $results = mysqli_query($conn, $sql);
    $email = mysqli_fetch_assoc($results)['email'];

    if ($email) {
      $sql = "UPDATE utilisateur SET mot_passe='?' WHERE gmail_util='$email'";
      $stmt=mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt,$sql);
      $hashedpwd = password_hash($new_pass,PASSWORD_DEFAULT);
      mysqli_stmt_bind_param($stmt,"s",$hashedpwd);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      header("location: ../password_confirmation.php?error=none");
    }
  }
}
*/