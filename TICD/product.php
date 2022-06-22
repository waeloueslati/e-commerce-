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
    <title>Product</title>
    <link rel="stylesheet" href="./hom.css">
</head>
<body>
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
                <?php session_start(); ?>
                <a href="#" style="color: inherit; text-decoration: none;"><img src="img/user.png" alt=""><span><?php echo $_SESSION["name"]; ?><span></a>
                <div class="dropdown-content">
                <form action="signout.php" method="post">
                <li class="link-item" name="signout-btn"><a href="#" class="link" style="color: inherit; text-decoration: none;"><button name="signout-btn" style="background: trasnparent; border: none; cursor: pointer;">Sign-out</button></a></li>
                </form>
               </div>
                <a href="panier.php"><img src="img/cart.png" alt=""></a>
              </div>
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
            <li class="link-item"><a href="search-products/search-products/searchPCs.html" class="link">Pc</a></li>
            <li class="link-item"><a href="search-products/search-products/searchAudios.html" class="link">Ecouteurs</a></li>
            <li class="link-item"><a href="search-products/search-products/searchDisks.html" class="link">Disque Dur</a></li>
            </div>
          </div>
          </ul>
        </form>
          
          

       
  </div>
  
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
      <?php 
       require_once "includes/dbh.inc.php";
       $requete="select * from categorie";
       $resultat=mysqli_query($conn,$requete);
        while($show=mysqli_fetch_array($resultat)){
           
           if(isset($_POST[$show["id"]])){
             $_SESSION["id_product"]=$show["id"];
             $id=$_SESSION["id_product"];
             $sql="select * from produit where id_categorie=$id;";
             $result=mysqli_query($conn,$sql);            
             while($show=mysqli_fetch_array($result)){?>
               <div class='product-card'>
               <div class='product-image' >
               <span class='discount-tag'><?php echo $show["promotion"]."% off" ?></span>
               <img src='img/pc.png' class='product-thumb' alt=''>
               <form action="descripfinal.php" method="post">
               <button class='card-btn' name="<?php echo $show["id"]; ?>">view description</button>";
               </form>
               </div>
               <div class='product-info'>
               <h2 class='product-brand'><?php echo $show["nom"]; ?></h2>
               <?php $prix_promotion=$show["prix_original"]-$show["prix_original"]*($show["promotion"]/100); ?>
               <span class='price'><?php echo $prix_promotion." "."DT" ?></span><span class='actual-price'><?php echo $show["prix_original"]." "."DT" ?></span>
               </div>
               </div>
            <?php
               
              
                
                
            }
            }
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
    
    <footer>
    <div class="footer-content">
        <img src="img/js.png" class="logo" alt="">
        <div class="footer-ul-container">
            <ul class="category">
                <li class="category-title"> Home </li>
                <li><a href="#" class="footer-link">pc</a></li>
                <li><a href="#" class="footer-link">casque </a></li>
                <li><a href="#" class="footer-link">souris</a></li>
                <li><a href="#" class="footer-link">clavier</a></li>
                <li><a href="#" class="footer-link">jeux video </a></li>
              
            </ul>
        </div>
    </div>
    <p class="footer-title">about company</p>
    <p class="info">support emails - help@vente.com, customersupport@vente.com</p>
    <p class="info">telephone +216 58 498 592 , +216 99 229 175</p>
    <div class="footer-social-container">
        <div>
            <a href="#" class="social-link">terms & services</a>
            <a href="#" class="social-link">privacy page</a>
        </div>
        <div>
            <a href="#" class="social-link">instagram</a>
            <a href="#" class="social-link">faceb ook</a>
            <a href="#" class="social-link">twitter</a>
        </div>
    </div>
    <p class="footer-credit">THE BEST OF THE BEST </p>
    </footer>
    
    

    
    
</body>
</html>
 