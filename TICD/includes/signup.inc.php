<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(isset($_POST["submit"])){
        $name=$_POST["name"];
        $phone=$_POST["number"];
        $email=$_POST["email"];
        $address=$_POST["address"];
        $pwd=$_POST["password"];
        require_once "dbh.inc.php";
        function createUser($conn,$name,$phone,$email,$address,$pwd){
            $sql="INSERT INTO utilisateur(nom_util,tel_util,gmail_util,addresse_util,mot_passe) VALUES(?,?,?,?,?);";
            $stmt=mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt,$sql);
            $hashedpwd = password_hash($pwd,PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt,"sisss",$name,$phone,$email,$address,$hashedpwd);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location: ../signup.php?error=none");
        
        }
        createUser($conn,$name,$phone,$email,$address,$pwd);
        

    }
}
