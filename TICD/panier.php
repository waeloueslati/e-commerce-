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
    <link rel="stylesheet" href="panier.css">
    <title>Panier</title>
    <link rel="stylesheet" href="hom.css">
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
                <?php session_start() ?>
                <a href="#" style="color: inherit; text-decoration: none;"><img src="img/user.png" alt=""><span><?php echo $_SESSION["name"]; ?><span></a>
                <div class="dropdown-content">
                <form action="signout.php" method="post">
                <li class="link-item" name="signout-btn"><a href="#" class="link" style="color: inherit; text-decoration: none;"><button name="signout-btn" style="background: trasnparent; border: none; cursor: pointer;">Sign-out</button></a></li>
            </form>
</div>    </div>
                <a href="#"><img src="img/cart.png" alt=""></a>
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
        </form>
          
          

        </ul>
  </div>

<!-- id addresse sommetot numtel productsList(quantite, price)     -->
<div>

</div>

<?php
    require_once "includes/dbh.inc.php";
    $id=$_SESSION["id"];
    $sql="select * from panier where id_user='$id'";
    $result=mysqli_query($conn,$sql);
    $total_price=0;
    

 ?>
<div class="main-container" style="margin-top: 70px;">
    <div class="current-balance">

      <h2><span>Current Balance</span></h2>
    </div>
    <div class="content-container">
    
      <table class="purchase-history" style="margin-left: -29px;">
        <thead>
          <tr>
            <td>product</td>
            <td>qte</td>
            <td>Price</td>
            <td>remove</td>
          </tr>
        </thead>
        <tbody>
          <?php $total_price=0; ?>
         <?php while($enreg=mysqli_fetch_array($result)){ 
           ?>
          <tr>
            <td><?php echo $enreg["product_name"]; ?></td>
            <?php $qte=$enreg["qte"]; 
                  $price=$enreg["price"];
            ?>
            <td><label><?php echo $enreg["qte"]; ?></label></td>
            <td><?php echo $enreg["price"]." "."DT"; ?></td>
            <?php $total_price+=$price*$qte; ?>
            <form action="remove_panier.php" method="post">
            <td><button name="<?php echo $enreg["id"]; ?>" style="cursor: pointer;">remove</button></td>
            </form>
            
            
          </tr>
          <!--<tr>
            <td>Mar 12</td>
            <td><input type="number" style="width: 5em"></td>
            <td>1900 dt</td>
            <td><button>remove</button></td>
          </tr>
          <tr>
            <td>Mar 12</td>
            <td><input type="number" style="width: 5em"></td>
            <td>1900 dt</td>
            <td><button>remove</button></td>
          </tr>
          <tr>
            <td>Mar 12</td>
            <td><input type="number" style="width: 5em"></td>
            <td>1900 dt</td>
            <td><button>remove</button></td>
          </tr>
          <tr>
            <td>Mar 12</td>
            <td><input type="number" style="width: 5em"></td>
            <td>1900 dt</td>
            <td><button>remove</button></td>
          </tr>-->
        <?php }
          
        ?>
        <tr>
          <td>total price:</td>
          <td><?php echo $total_price." "."DT"; ?>
        </tbody>          

     </table>
      <form action="panier.php" method="post">
      <div style="text-align:center; margin-top: 17px;">
        <button name="submit" style="cursor: pointer;">command</button>
      
      </div>
         </form>
         
    </div>
  </div>
  <footer></footer>
  <script src="nav.js"></script>
  
  <?php
     
    if(isset($_POST["submit"])){
      require_once "includes/dbh.inc.php";
      $id_user=$_SESSION["id"];
      $sql="select * from panier where id_user='$id_user'";
      $reso=mysqli_query($conn,$sql);
      while($enreg=mysqli_fetch_array($reso)){
         $id_product=$enreg["id_product"];
         $product_name=$enreg["product_name"];
         $prix=$enreg["price"];
         $qte=$enreg["qte"];
         $sql="insert into commande(id_product,id_client,qte,description,prix_total) values('$id_product','$id_user','$qte','$product_name','$prix')";
         $res=mysqli_query($conn,$sql);
         
      }
      $sqldel="delete from panier where id_user='$id_user'";
      $res_del=mysqli_query($conn,$sqldel);
      header("location: commande.php");

    }


  ?>
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

