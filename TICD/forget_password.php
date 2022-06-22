<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="log.css">

</head>
<body>
 <form action="includes/forget_password_inc.php" method="post">
    <div class="container">
        <img src="img/js.png" class="logo" alt="">
        <div>
            <input type="text" autocomplete="off" id="name" placeholder="email" name="email">
            <button class="submit-btn" name="submit">Envoyer</button>
        </div>
    </div>
</form>
<?php
 if(isset($_GET["error"])){
     if($_GET["error"]=="therenoaccountbythisemail"){
         echo "<p style='color: red; position:absolute; margin-top: 350px; margin-left: -10px;'>there no account by this email</p>"; 
         exit();
     }
     
    
    
}


?>

</body>
</html>