<?php
  if($_SERVER["REQUEST_METHOD"]=="POST"){
   $login=false;
   $showError=false;
   $row=false;
   if(isset($_POST["submit"])){
       $email=$_POST["email"];
       $pwd=$_POST["password"];
       require_once "dbh.inc.php";
       /*require_once "function.inc.php";*/
       
       /*if(loginUser($conn,$email,$pwd)!==false){
         header("location: ../home.php?error=motdepasseincorrecte");
         exit();
       }else{
         header("location: ../home_after_login.php");
         exit();
      }*/
      function loginUser($conn,$email,$pwd){
        $sql="SELECT * FROM utilisateur WHERE gmail_util='$email';";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num===1){
            while($row=mysqli_fetch_assoc($result)){
                if(password_verify($pwd,$row['mot_passe'])){
                    $login=true;
                    session_start();
                    $_SESSION["login"]=true;
                    $_SESSION["email"]=$email;
                    $_SESSION["id"]=$row["id_util"];
                    $_SESSION["name"]=$row["nom_util"];
                    header("location: ../home.php");
                    exit();
    
                }else{
                  header("location: ../login.php?error=incorrectepassword");
                  exit();
                }
                
    
            }
        }else{
            header("location: ../login.php?error=therenoaccountbythisname");
            exit();
        }
    }
    loginUser($conn,$email,$pwd);  

       
 }
}

