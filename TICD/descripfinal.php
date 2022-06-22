<?php
    require_once "includes/dbh.inc.php";
    $requete="select * from categorie";
    $resultat=mysqli_query($conn,$requete);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Product Card </title>
   <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Slab" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="styler.css">
<link rel="stylesheet" href="ne.css">
<link rel="stylesheet" href="no.css">
<link rel="stylesheet" href="nr.css">
<link rel="stylesheet" href="hom.css">
</head>
<body>
<!-- partial:index.partial.html -->
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
            <li class="link-item"><a href="search-products/search-products/searchPCs.html" class="link">Pc</a></li>
            <li class="link-item"><a href="search-products/search-products/searchAudios.html" class="link">Ecouteurs</a></li>
            <li class="link-item"><a href="search-products/search-products/searchDisks.html" class="link">Disque Dur</a></li>
            </div>
          </div>
            </nav>
        </form>
          
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
     
<main class="main">

    <div class="mainWrapper">
        <form action="" method="post">
        <div class="mainBackground clearfix">
            <div class="row">
                <div class="column small-centered">
                    <div class="productCard_block">
                        <div class="row">
                            <div class="small-12 large-6 columns">
                                <div class="productCard_leftSide clearfix">
                                    <div class="productCard_brendBlock">
                                        <a class="productCard_brendBlock__imageBlock" href="#">
                                            <img src="https://github.com/BlackStar1991/CardProduct/blob/master/app/img/brtendsLogos/logo_sennheiser.png?raw=true" alt="sennheiser">
                                        </a>
                                    </div>

                                    <div class="sliderBlock">
                                        <ul class="sliderBlock_items">
                                            <li class="sliderBlock_items__itemPhoto sliderBlock_items__showing">
                                                <img src="<?php echo $show["img_url"];?>" alt="<?php echo $show["nom"]; ?>">
                                            </li>
                                            <li class="sliderBlock_items__itemPhoto">
                                                <img src="<?php echo $show["img_url"];?>"  alt="<?php echo $show["nom"]; ?>">
                                            </li>
                                            <li class="sliderBlock_items__itemPhoto">
                                                <img src="<?php echo $show["img_url"];?>"  alt="<?php echo $show["nom"]; ?>">
                                            </li>
                                            <li class="sliderBlock_items__itemPhoto">
                                                <img src="<?php echo $show["img_url"];?>"  alt="<?php echo $show["nom"]; ?>">
                                            </li>
                                            <li class="sliderBlock_items__itemPhoto">
                                                <img src="<?php echo $show["img_url"];?>"  alt="<?php echo $show["nom"]; ?>">
                                            </li>
                                        </ul>

                                        
                                        <div class="sliderBlock_controls">
                                            <div class="sliderBlock_controls__navigatin">
                                                <div class="sliderBlock_controls__wrapper">
                                                    <div class="sliderBlock_controls__arrow sliderBlock_controls__arrowBackward">
                                                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="sliderBlock_controls__arrow sliderBlock_controls__arrowForward">
                                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <ul class="sliderBlock_positionControls">
                                                <li class="sliderBlock_positionControls__paginatorItem sliderBlock_positionControls__active"></li>
                                                <li class="sliderBlock_positionControls__paginatorItem"></li>
                                                <li class="sliderBlock_positionControls__paginatorItem"></li>
                                                <li class="sliderBlock_positionControls__paginatorItem"></li>
                                                <li class="sliderBlock_positionControls__paginatorItem"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="small-12 large-6 columns">
                                <div class="productCard_rightSide">
                                    <div class="block_specification">
                                        <div class="block_specification__specificationShow">
                                            <i class="fa fa-cog block_specification__button block_specification__button__rotate"
                                               aria-hidden="true"></i>
                                            <span class="block_specification__text">spec</span>
                                        </div>
                                        <div class="block_specification__informationShow hide">
                                            <i class="fa fa-info-circle block_specification__button block_specification__button__jump"
                                               aria-hidden="true"></i>
                                            <span class="block_specification__text">inform</span>
                                        </div>
                                    </div>

                                    <p class="block_model">
                                        
                                    </p>

                                    <div class="block_product">
                                        <h2 class="block_name block_name__mainName"><?php echo $show["nom"]; ?><sup>&reg; </sup></h2>
                                        

                                       

                                        <div class="block_informationAboutDevice">

                                            <div class="block_descriptionCharacteristic block_descriptionCharacteristic__disActive">
                                                <table class="block_specificationInformation_table">
                                                    <tr>
                                                        <th>Characteristic</th>
                                                        <th>Value</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Ear Coupling</td>
                                                        <td>Around Ear</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Transducer Principle</td>
                                                        <td>Dynamic, Closed-back</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Frequency Response</td>
                                                        <td>16Hz – 22kHz</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sound Pressure Level (SPL)</td>
                                                        <td>113 dB (Passive: 1 kHz/1 Vrms)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Harmonic Distortion (THD)</td>
                                                        <td>&lt;0.5% (1 kHz, 100 dB SPL)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Volume Control</td>
                                                        <td>Earcup control when Bluetooth connected</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Microphone Type</td>
                                                        <td>Dual omni-directional microphone <br>(2 mic beam forming
                                                            array)
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cable / Connector</td>
                                                        <td>1.4m (Detachable) / 3.5mm Angled</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Weight</td>
                                                        <td>260g (9.17 oz)</td>
                                                    </tr>
                                                </table>
                                            </div>


                                            <div class="block_descriptionInformation">
                                                <span><?php echo $show["descrip"]; ?> 
                                                </span>
                                            </div>

                                            <div class="block_rating clearfix">
                                                <fieldset class="block_rating__stars">
                                                    <input type="radio" id="star5" name="rating" value="5"/><label
                                                        class="full" for="star5" title="Awesome - 5 stars"></label>
                                                    <input type="radio" id="star4half" name="rating"
                                                           value="4 and a half"/><label class="half" for="star4half"
                                                                                        title="Pretty good - 4.5 stars"></label>
                                                    <input type="radio" id="star4" name="rating" value="4"/><label
                                                        class="full" for="star4" title="Good - 4 stars"></label>
                                                    <input type="radio" id="star3half" name="rating"
                                                           value="3 and a half"/><label class="half" for="star3half"
                                                                                        title="Above average - 3.5 stars"></label>
                                                    <input type="radio" id="star3" name="rating" value="3"/><label
                                                        class="full" for="star3" title="Average - 3 stars"></label>
                                                    <input type="radio" id="star2half" name="rating"
                                                           value="2 and a half"/><label class="half" for="star2half"
                                                                                        title="Kinda bad - 2.5 stars"></label>
                                                    <input type="radio" id="star2" name="rating" value="2"/><label
                                                        class="full" for="star2"
                                                        title="Kinda bad - 2 stars"></label>
                                                    <input type="radio" id="star1half" name="rating"
                                                           value="1 and a half"/><label class="half" for="star1half"
                                                                                        title="Meh - 1.5 stars"></label>
                                                    <input type="radio" id="star1" name="rating" value="1"/><label
                                                        class="full" for="star1"
                                                        title="Sucks big time - 1 star"></label>
                                                    <input type="radio" id="starhalf" name="rating"
                                                           value="half"/><label
                                                        class="half" for="starhalf"
                                                        title="Sucks big time - 0.5 stars"></label>
                                                </fieldset>

                                                <span class="block_rating__avarage">4.25</span>
                                                <span class="block_rating__reviews">(153 reviews)</span>

                                            </div>
                                            <div class="row ">
                                                <div class="large-6 small-12 column left-align">
                                                    <div class="block_price">
                                                    <?php $prix_promotion=$show["prix_original"]-$show["prix_original"]*($show["promotion"]/100); ?>
                                                        <p class="block_price__currency"><?php echo $prix_promotion." "."DT"; ?></p>
                                                        <p class="block_price__shipping">Shipping and taxes extra</p>
                                                    </div>
                                                    <div class="block_quantity clearfix">
                                                       
                                                        <span class="text_specification">Quantity</span>
                                                        <div class="block_quantity__chooseBlock">
                                                            <input class="block_quantity__number" name="qte"
                                                                   type="number" value="1">
                                                            <!--<button class="block_quantity__button block_quantity__up"></button>
                                                            <button class="block_quantity__button block_quantity__down"></button>-->
                                                        </div>
                                                    </div>
                                                </div>
         <div class="large-6 small-12 column end">
                                                    <div class="block_goodColor">
                                                        <span class="text_specification">Choose your colors:</span>
                                                        <div class="block_goodColor__allColors">
                                                            <input type="radio" name="colorOfItem" class="radio_button"
                                                                   id="radioColor" checked/>
                                                            <label for="radioColor"
                                                                   class="block_goodColor__radio block_goodColor__black"></label>
                                                            <input type="radio" name="colorOfItem" class="radio_button"
                                                                   id="radioColor2"/>
                                                            <label for="radioColor2"
                                                                   class="block_goodColor__radio block_goodColor__silver"></label>
                                                        </div>
                                                    </div>
                                                    <form action="" method="post">
                                                    <button class="button button_addToCard" name="submit">
                                                        Add to Cart
                                                    </button>
                                                   </form>
                                                </div>
                                  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</form>
            
</main>
              
            
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

<!-- partial -->
  <script  src="scripter.js"></script>
  <sciprt src="head.js"></script>
  

</body>
</html>
