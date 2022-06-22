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
    <title>Commande</title>
    <link rel="stylesheet" href="commade.css">
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
            <li class="link-item"><a href="search-products/search-products/searchPCs.html" class="link">Pc</a></li>
            <li class="link-item"><a href="search-products/search-products/searchAudios.html" class="link">Ecouteurs</a></li>
            <li class="link-item"><a href="search-products/search-products/searchDisks.html" class="link">Disque Dur</a></li>
            </div>
          </div>
        </form>
          
          

        </ul>
  </div>
  <?php
    require_once "includes/dbh.inc.php";
    $id=$_SESSION["id"];
    $sql="select * from commande where id_client='$id'";
    $result=mysqli_query($conn,$sql);
    $total_price=0;
    

 ?>

    <div class="document active">
        <div class="spreadSheetGroup">
      
      
          <hr style="visibility:hidden" />
      
          </table>
      
          <table class="proposedWork" width="100%" style="margin-top:20px">
            <thead>
              <th>QTY</th>
              <th>ID Client</th>
              <th>product Name</th>
              <th>ID product</th>
              
              
              <th class="amountColumn">TOTAL</th>
              
            </thead>
            <tbody>
            <?php $total_price=0; ?>
            <?php while($enreg=mysqli_fetch_array($result)){ 
               $price=$enreg["prix_total"];
               $qte=$enreg["qte"];
              ?>
              <tr>
                <td contenteditable="true"><?php echo $enreg["qte"]; ?></td>
                <td class="unit" contenteditable="true"><?php echo $enreg["id_client"]; ?></td>
                <td contenteditable="true" class="description"><?php echo $enreg["description"]; ?></td>
                <td class="amount" contenteditable="true"><?php echo $enreg["id_product"]; ?></td>
                <td class="amount amountColumn rowTotal" contenteditable="true"><?php echo $enreg["prix_total"]." "."DT"; ?></td>
                <form action="delete_commande.php" method="post">
                <td class="docEdit tdDelete"><button style="background: transparent; border: none; cursor: pointer;" name="<?php echo $enreg["id_comm"]; ?>">X</button></td>
                </form>
                <?php $total_price+=$price*$qte; ?>
              </tr>
            <?php }?>
            </tbody>
            <tfoot>
              
              <tr>
                <td style="border:none"></td>
                <td style="border:none"></td>
                <td style="border:none"></td>
                <td style="border:none;text-align:right;white-space:nowrap">SHIPPING & HANDLING:</td>
                <td class="amount" contenteditable="true">0.00</td>
                <td class="docEdit"></td>
              </tr>
              <tr>
                <td style="border:none"></td>
                <td style="border:none"></td>
                <td style="border:none"></td>
                <td style="border:none;text-align:right">TOTAL:</td>
                <td class="total amount" contenteditable="true"><?php echo $total_price." "."DT"; ?></td>
              <td class=" docEdit"></td>
              </tr>
            </tfoot>
          </table>
      
          <table width="100%">
            <tbody>
              <tr>
                <td  style="vertical-align:top">
                  <table style="width:100%">
                    <tbody>
                      <tr>
                        <td style="text-align:left">
                          <p style="padding-left:20px">tunisie
                            <br />
                            ariana
                            <br />
                            rue newtoon
                            <br />
                            Phone +216 58 498 592
                          </p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
                <td style="padding-left:40px; width:50%; vertical-align:top">
                  <table style="width:100%">
                    <tbody>
                      <tr>
                        <td style="text-align:left">
                          <strong>COMMENTS:</strong>
                        </td>
                      </tr>
                      <tr>
                        <td contenteditable="true" style="text-align:left;border: 1px solid #000">Please ship all goods to our office using our UPS account #1234</td>
                      </tr>
                      <tr>
                        <td style="padding-top:60px">
                          Authorized by: TICD-STORE 
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
      
        </div>
      </div> 
      <footer>
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
      </footer>
 


</body>
</html>