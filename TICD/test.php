<?php
    require_once "includes/dbh.inc.php";
    $requete="select * from categorie";
    $resultat=mysqli_query($conn,$requete);
    while($enreg=mysqli_fetch_array($resultat)){
        if(isset($_POST[$enreg["nom"]])){
           session_start();
           $_SESSION["id"]=$enreg["id"];
           $id=$_SESSION["id"];
           $_SESSION["product"]=$enreg["nom"];
           $product=$_SESSION["product"];
           $sql="select * from produit where id_categorie=$id;";
           $result=mysqli_query($conn,$sql);
           
        }
       
    }
           
?>