<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TICD-STORE.COM</title>
    <link rel="stylesheet" type="text/css" href="log.css">

</head>
<body>
  <form action="includes/login.inc.php" method="post">
    <div class="container">
        <img src="img/js.png" class="logo" alt="">
        <div>
            <input type="text" autocomplete="off" id="name" placeholder="email" name="email">
            <input type="password" autocomplete="off" id="password" placeholder="password" name="password">
            <button class="submit-btn" name="submit">Login</button>
            <a href="forget_password.php" style="margin-top: 15px; margin-left: 80px;">forget password ?</a>
            <a href="signup.php" class="link" style="margin-top: 10px; position: absolute;">you Don't have an account ? Signup here</a>
        </div>
    </div>
 </form>
<?php
 if(isset($_GET["error"])){
     if($_GET["error"]=="incorrectepassword"){
         echo "<p style='color: red; position:absolute; margin-top: 450px; margin-left: -10px;'>password is not correct</p>"; 
         exit();
     }
     else if($_GET["error"]=="therenoaccountbythisname"){
        echo "<p style='color: red; position:absolute; margin-top: 450px; margin-left: -10px;'>there no account by this email</p>";
        exit();
    }
    
    
}


?>
    

</body>
</html>