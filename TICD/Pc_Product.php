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
    <title>sss</title>
    <link rel="stylesheet" href="hom.css">
</head>
<body>
    <nav class="navbar"></nav>
    <div class="nav">
            <img src="img/js.png" class="brand-logo" alt="">
            <div class="nav-items">
                <div class="search">
                    <input type="text" class="search-box" placeholder="search product">
                    <button class="search-btn">search</button>
                </div>
                <a href="#"><img src="img/user.png" alt=""></a>
                <a href="#"><img src="img/cart.png" alt=""></a>
            </div>
        </div>
        <ul class="links-container">
            <li class="link-item"><a href="#" class="link">Home</a></li>
            <?php  while($enreg=mysqli_fetch_array($resultat)){ ?>
            <li class="link-item"><a href="product.html" class="link"><?php echo $enreg["nom"] ?></a></li>
            <?php }?>
        </ul>
  </div>
  <?php
      require_once "includes/dbh.inc.php"; 
      $sql="select * from produit where id_categorie=1 ;";
      $result=mysqli_query($conn,$sql);

  ?>
    <header class="hero-section">
        <div class="content">
            <img src="img/js.png" class="logo" alt="">
            <p class="sub-heading">THE BEST</p>
        </div>
    </header>
     
    <section class="product">
        <h2 class="product-category">best selling</h2>
        <button class="pre-btn"><img src="img/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="img/arrow.png" alt=""></button>
        
        <div class="product-container">
        <?php  while($enreg=mysqli_fetch_array($result)){ 

            echo "<div class='product-card'>";
            echo  "<div class='product-image' >";
            echo  "<span class='discount-tag'>".$enreg["promotion"]."% off</span>";
            echo  "<img src='img/pc.png' class='product-thumb' alt=''>";
            echo "<button class='card-btn'>add to whislist</button>";
            echo "</div>";
            echo "<div class='product-info'>";
            echo "<h2 class='product-brand'>".$enreg["nom"]."</h2>";
            echo "<p class='product-short-des'>".$enreg["descrip"]."</p>";
            echo  "<span class='price'>$20</span><span class='actual-price'>".$enreg["prix_original"]."</span>";
            echo "</div>";
            echo "</div>";
        }
        ?>
           <!-- <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="img/clavier.png" class="product-thumb" alt="">
                    <button class="card-btn">add to whislist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-des">description..</p>
                    <span class="price">$30</span><span class="actual-price">$60</span>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">60% off</span>
                    <img src="img/casque.png" class="product-thumb" alt="">
                    <button class="card-btn">add to whislist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-des">description..</p>
                    <span class="price">$20</span><span class="actual-price">$60</span>
                </div>
            </div>


            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="img/card1.jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to whislist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-des">description..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>


            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="img/card1.jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to whislist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-des">description..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>


            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">60% off</span>
                    <img src="img/card1.jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to whislist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-des">description..</p>
                    <span class="price">$20</span><span class="actual-price">$50</span>
                </div>
            </div>


            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="img/card1.jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to whislist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-des">description..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>


            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">70% off</span>
                    <img src="img/card1.jpg" class="product-thumb" alt="">
                    <button class="card-btn" >add to whislist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-des">description</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>

        </div>-->
        
    </section>
    
    <section class="collection-container">
        <a href="#" class="collection">
            <img src="img/casque.png" alt="">
            <p class="collection-title">Casque</p>
        </a>
        <a href="#" class="collection">
            <img src="img/clavier.png" alt="">
            <p class="collection-title">Clavier </p>
        </a>
        <a href="#" class="collection">
            <img src="img/pc.png" alt="">
            <p class="collection-title">Pc</p>
        </a>
    </section>
    <footer></footer>

    <script src="hom.js"></script>
    <script src="js/footer.js"></script>
    
</body>
</html>