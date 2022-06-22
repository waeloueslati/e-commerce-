<?php
    require_once "includes/dbh.inc.php";
    $requete="select * from commande";
    $resultat=mysqli_query($conn,$requete);
    while($show=mysqli_fetch_array($resultat)){
        if(isset($_POST[$show["id_comm"]])){
            session_start();
            $_SESSION["id_comm"]=$show["id_comm"];
            $id=$_SESSION["id_comm"];
            $sql="delete from commande where id_comm='$id'";
            $result=mysqli_query($conn,$sql);
            header("location: commande.php");
        }
    }
   