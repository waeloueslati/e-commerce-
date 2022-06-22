<?php
  require_once "includes/forget_password_inc.php";
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Reset PHP</title>
	<link rel="stylesheet" href="home.css">
</head>
<body>

	<form class="container" action="" method="post" style="text-align: center; margin-top: 240px;">
		<p>
			We sent an email to  <b><?php echo $_GET["email"] ?></b> to help you recover your account. 
		</p>
	    <p>Please login into your email account and click on the link we sent to reset your password</p>
	</form>
		
</body>
</html>