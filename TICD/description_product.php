<!DOCTYPE html>
<html lang="an">
    <head>
         <link rel="stylesheet" type="text/css" href="home.css">
         <title>sss</title>
    </head>
    
<body>
<?php
       require_once "includes/dbh.inc.php";
       $requete="select * from produit";
       $resultat=mysqli_query($conn,$requete);
       while($show=mysqli_fetch_array($resultat)){
          
          if(isset($_POST[$show["id"]])){
              session_start();
              $_SESSION["product_id"]=$show["id"];
              $product_id=$_SESSION["product_id"];
              $sql="select * from produit where id='$product_id'";
              $result=mysqli_query($conn,$sql);
              while($show=mysqli_fetch_array($result)){
                
              
        ?>
    <form action="" method="post"> 
    <div style="float: left; margin-left: 25px;">
       <img src="<?php echo $show["image_url"]; ?>" float="left" width="300px" height="300px">
       
    </div>
    <div style="float: right; margin-right: 25px; margin-left: 25px;">
        <h3><?php echo $show["nom"]; ?></h3>
        <p><?php echo $show["descrip"]; ?></p>
        <?php $prix_promotion=$show["prix_original"]-$show["prix_original"]*($show["promotion"]/100); ?>
        <strong>price after promotion: <p><?php echo $prix_promotion." "."DT"; ?></p></strong>
        <strong>original price: <p><?php echo $show["prix_original"]." "."DT"; ?></p></strong>

    </div>
    <div style="margin-top: 500px; margin-right: 200px; position: absolute;">
      
        <button type="submit" name="submit">Ajouter au carte</button>
      
    </div>
    </form>
    </section>
    <footer></footer>
    <script src="hom.js"></script>
    <script src="js/footer.js"></script>
<?php
               $_SESSION["product_name"]=$show["nom"];
               $_SESSION["price"]=$prix_promotion;
              }
            }
        }
?>
 
<?php
   
   if(isset($_POST["submit"])){
     session_start();
     $product_name=$_SESSION["product_name"];
     $product_id=$_SESSION["product_id"];
     $id_user=$_SESSION["id"];
     $price=$_SESSION["price"];
     $sql="insert into panier(id_user,id_product,qte,price,product_name) values('$id_user','$product_id',1,'$price','$product_name')";
     $result=mysqli_query($conn,$sql);
     header("location: description_product.php");
     
   }

?>
</body>
</html>