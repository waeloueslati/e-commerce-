<html lang="en">

<head>
  <title>Harvest vase</title>
  <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
<link rel="stylesheet" href="aa.css">

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
        while($show=mysqli_fetch_array($result)){?>
    <a href="home.php" style="color: black; text-decoration: underline;"><h3>GO Back home</h3></a>
    
  <div class="wrapper">
  <form action="" method="post">
    <div class="product-img">
      <img src="pc.jfif" height="420" width="327">
    </div>
    <div class="product-info">
      <div class="product-text">
        <h1><?php echo $show["nom"]; ?></h1>
        <h2>description</h2>
        <p><?php echo $show["descrip"]; ?></p><br>
      </div>
      <?php $prix_promotion=$show["prix_original"]-$show["prix_original"]*($show["promotion"]/100); ?>
      <div class="product-price-btn">
        <p><span><?php echo $prix_promotion." "."DT"; ?></span></p><br><br>
        <button type="submit" name="submit" style="margin-top: 10px; margin-left: 15px;">buy now</button>
      </div>
    </div>
  </div>
  </form>
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
     header("location: product_description.php");
     
   }

?>
</body>

</html>