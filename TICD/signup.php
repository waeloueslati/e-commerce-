<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TICD-STORE.COM</title>
    <link rel="stylesheet" href="log.css">
</head>
<body>
    <img src="img/loader.gif" class="loader" alt="">

    <div class="alert-box">
        <img src="img/error.png" class="alert-img" alt="">
        <!--<p class="alert-msg">Error message</p>-->
    </div>
    
   <form action="includes/signup.inc.php" method="post"> 
    <div class="container">
        <img src="img/js.png" class="logo" alt="">
        <div>
            <input type="text" autocomplete="off" id="name" placeholder="name" name="name">
            <input type="text" autocomplete="off" id="number" placeholder="number" name="number">
            <input type="email" autocomplete="off" id="email" placeholder="email" name="email">
            <input type="text" autocomplete="off" id="email" placeholder="Addresse" name="address">
            <input type="password" autocomplete="off" id="password" placeholder="password" name="password">
            
            <input type="checkbox" checked class="checkbox" id="terms-and-cond">
            <label for="terms-and-cond">agree to our <a href="">terms and conditions</a></label>
            <br>
            <input type="checkbox" class="checkbox" id="notification">
            <label for="notification">recieve upcoming offers and events mails</a></label>
            <button class="submit-btn" name="submit">create account</button>
        </div>
        <a href="login.php" class="link">already have an account? Log in here</a>
    </div>
  </form>
  <?php
    if(isset($_GET["error"])){
       if($_GET["error"]=="none"){
           echo "<p style='color: blue; position:absolute; margin-top: 400px;'>this account has successfully been created</p>"; 
           exit();
       }
    }


  ?>
  <script src="home.js"></script>

        
</body>
</html>