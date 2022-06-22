<?php
require_once "includes/dbh.inc.php";
$requete="select * from panier";
$resultat=mysqli_query($conn,$requete);
while($show=mysqli_fetch_array($resultat)){
    if(isset($_POST[$show["id"]])){
        session_start();
        $_SESSION["id_panier"]=$show["id"];
        $id=$_SESSION["id_panier"];
        $sql="delete from panier where id='$id'";
        $result=mysqli_query($conn,$sql);
        header("location: panier.php");
    }
}
