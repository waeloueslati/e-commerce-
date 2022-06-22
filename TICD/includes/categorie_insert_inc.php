<?php
 if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["submit"])){
        require_once "dbh.inc.php";
        $name=$_POST["name"];
        $desc=$_POST["desc"];
        $sql="INSERT INTO categorie(nom,descrip) VALUES('$name','$desc')";
        $result=mysqli_query($conn,$sql);
        if($result){
            header("location: ../categorie_insert.php?error=insertsuccess");
            exit();
        }else{
            header("location: ../categorie_insert.php?error=notinsert");
            exit();
        }
    
    }
 }