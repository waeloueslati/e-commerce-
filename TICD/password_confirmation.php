<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Setting</title>
    <link rel="stylesheet" type="text/css" href="log.css">

</head>
<body>
  <form action="includes/password_confirmation_inc.php" method="post">
    <div class="container">
        <img src="img/js.png" class="logo" alt="">
        <div>
            <input type="password" autocomplete="off" id="name" placeholder="password" name="password">
            <input type="password" autocomplete="off" id="password" placeholder="password confirmation" name="rpassword">
            <button class="submit-btn" name="submit">Reset</button>
        </div>
        <a href="login.php" class="link">Log in here</a>

    </div>
</form>
<?php
  if(isset($_GET["error"])){
    if($_GET["error"]=="none"){
        echo "<p style='color: blue; position:absolute; margin-top: 450px; margin-left: -10px;'>Password has been changed successfully</p>"; 
        exit();
    }
}


?>

    

</body>
</html>