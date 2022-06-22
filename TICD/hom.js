/*const createNav = () => {
    let nav = document.querySelector('.navbar');

    nav.innerHTML = `
        <div class="nav">
            <img src="img/js.png" class="brand-logo" alt="">
            <div class="nav-items">
                <div class="search">
                    <input type="text" class="search-box" placeholder="search product">
                    <button class="search-btn">search</button>
                </div>
                <div class="dropdown">

                <a href="#"><img src="img/user.png" alt=""><span> se connecter <span></a>
                <div class="dropdown-content">
                <li class="link-item"><a href="#" class="link">deconnecter</a></li>
</div>    </div>
                <a href="#"><img src="img/cart.png" alt=""></a>
            </div>
        </div>
        <ul class="links-container">
            <li class="link-item"><a href="#" class="link">Home</a></li>
            <li class="link-item"><a href="#" class="link">PC</a></li>
            <li class="link-item"><a href="#" class="link">Souris</a></li>
            <li class="link-item"><a href="#" class="link">Casque</a></li>
            <li class="link-item"><a href="#" class="link">Clavier</a></li>
            <div class="dropdown">
            <span>Autre website</span>
            <div class="dropdown-content">
            <li class="link-item"><a href="#" class="link">Pc</a></li>
            <li class="link-item"><a href="#" class="link">Ecouteurs</a></li>
            <li class="link-item"><a href="#" class="link">Disque Dur</a></li>
            </div>
          </div>
          
          

        </ul>
        
    `;
}

createNav();*/


const productContainers = [...document.querySelectorAll('.product-container')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

productContainers.forEach((item, i) => {
    let containerDimenstions = item.getBoundingClientRect();
    let containerWidth = containerDimenstions.width;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
})


const createFooter = () => {
    let footer = document.querySelector('footer');

    footer.innerHTML = `
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
    <p class="info">description lel site </p>
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
    `;
}

createFooter();


