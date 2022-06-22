<?php
    require_once "includes/dbh.inc.php";
    $requete="select * from categorie";
    $resultat=mysqli_query($conn,$requete);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Description</title>
    <link rel="stylesheet" href="hom.css">

    <link rel="stylesheet" href="prd.css">
</head>
<body>

    <nav class="navbar">
    <div class="nav">
            <img src="img/js.png" class="brand-logo" alt="">
            <div class="nav-items">
             <form action="search_home.php" method="post">
                <div class="search">
                    <input type="text" class="search-box" placeholder="search product" name="name">
                    <button class="search-btn" name="search">search</button>
                </div>
            </form>
                <div class="dropdown">
                <?php session_start() ?>
                <a href="#" style="color: inherit; text-decoration: none;"><img src="img/user.png" alt=""><span><?php echo $_SESSION["name"]; ?><span></a>
                <div class="dropdown-content">
                <form action="signout.php" method="post">
                <li class="link-item" name="signout-btn"><a href="#" class="link" style="color: inherit; text-decoration: none;"><button name="signout-btn" style="background: trasnparent; border: none; cursor: pointer;">Sign-out</button></a></li>
            </form>
</div>    </div>
              
                <a href="panier.php"><img src="img/cart.png" alt=""></a>
              
            </div>
        </div>
        <form action="product.php" method="post">
        <ul class="links-container">
            <li class="link-item"><a href="home.php" class="link">Home</a></li>
            <?php  while($enreg=mysqli_fetch_array($resultat)){ ?>
            <li class="link-item"><a href="" class="link" ><button style="background: transparent; border: none; cursor: pointer;" name="<?php echo $enreg["id"]; ?>"><?php echo $enreg["nom"]; ?></button></a></li>
            <?php }?>
            <div class="dropdown">
            <span>Autre website</span>
            <div class="dropdown-content">
            <li class="link-item"><a href="#" class="link">Pc</a></li>
            <li class="link-item"><a href="#" class="link">Ecouteurs</a></li>
            <li class="link-item"><a href="#" class="link">Disque Dur</a></li>
            </div>
          </div>
        </form>
          
          

        </ul>
    
    </nav>
    <?php
       require_once "includes/dbh.inc.php";
       $requete="select * from produit";
       $resultat=mysqli_query($conn,$requete);
       while($show=mysqli_fetch_array($resultat)){
          
          if(isset($_POST[$show["id"]])){
              
              $_SESSION["product_id"]=$show["id"];
              $product_id=$_SESSION["product_id"];
              $sql="select * from produit where id='$product_id'";
              $result=mysqli_query($conn,$sql);
              while($show=mysqli_fetch_array($result)){
                
              
        ?>
    

    <div id="container">  
  
        <!-- Start  Product details -->
          <div class="product-details">
        <form action="" method="post">    
            <!--  Product Name -->
          <h1><?php echo $show["nom"]; ?></h1>
        <!--    <span class="hint new">New</span> -->
        <!--    <span class="hint free-shipping">Free Shipping</span> -->
        <!--    the Product rating -->
          <span class="hint-star star">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
          </span>
            
          
        <!-- The most important information about the product -->
            
            <p class="information"><label> purchase quantity: </label><input type="number" value="1" name="qte"></p>
        
            
            
        <!--    Control -->
        <div class="control" style="margin-top:">
          
        <!-- Start Button buying -->
          <button class="btn" name="submit">
        <!--    the Price -->
        <?php $prix_promotion=$show["prix_original"]-$show["prix_original"]*($show["promotion"]/100); ?>
           <span class="price"><?php echo $prix_promotion." "."DT"; ?></span>
        <!--    shopping cart icon-->
           <span class="shopping-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
        <!--    Buy Now / ADD to Cart-->
           <span class="buy" name="submit">Buy Now</span>
         </button>
          <!-- End Button buying -->
          
        </div>
              
        </div>
          
        <!--  End Product details   -->
          
          
          
        <!--  Start product image & Information -->
          
        <div class="product-image">
          
          <img src="<?php echo $show["img_url"]; ?>" alt="product image">
          
        <!--  product Information-->
        <div class="info">
          <h2>The Description</h2>
          <ul>
            <?php echo $show["descrip"]; ?>
            <li><strong>quantity in stock : </strong><?php echo $show["qte_disponible"]; ?></li>
            <li><strong>original price: </strong><?php echo $show["prix_original"]; ?></li>
            <li><strong>promotion: </strong><?php echo $show["promotion"]." "."%" ?></li>
            <?php $prix_promotion=$show["prix_original"]-$show["prix_original"]*($show["promotion"]/100); ?>
            <li><strong>price after promotion: </strong><?php echo $prix_promotion." "."DT"; ?></li>
          </ul>
        </div>
        </div>
  </form>

        <script src="hom.js"></script>
        <?php
               $_SESSION["product_name"]=$show["nom"];
               $_SESSION["price"]=$prix_promotion;
              }
            }
        }
?>
<?php
   
   if(isset($_POST["submit"])){
     $qte=$_POST["qte"];
     $product_name=$_SESSION["product_name"];
     $product_id=$_SESSION["product_id"];
     $id_user=$_SESSION["id"];
     $price=$_SESSION["price"];
     $sql="insert into panier(id_user,id_product,qte,price,product_name) values('$id_user','$product_id','$qte','$price','$product_name')";
     $result=mysqli_query($conn,$sql);
     header("location: panier.php");
     
   }

?>


</body>

</html>