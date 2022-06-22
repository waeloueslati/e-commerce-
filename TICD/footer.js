const createFooter = () => {
    let footer = document.querySelector('footer');

    footer.innerHTML = `
    
    <div class="footer-content">
        <img src="js.png" class="logo" alt="">
        <div class="footer-ul-container">
            <ul class="category">
                <li class="category-title">Informatique</li>
                <li><a href="#" class="footer-link">pc-</a></li>
                <li><a href="#" class="footer-link">laptop</a></li>
                <li><a href="#" class="footer-link">mobile</a></li>
                <li><a href="#" class="footer-link">souris</a></li>
                <li><a href="#" class="footer-link">casque</a></li>
                <li><a href="#" class="footer-link">clavier</a></li>
            </ul>
            <ul class="category">
                <li class="category-title">Game</li>
                <li><a href="#" class="footer-link">pc gamer</a></li>
                <li><a href="#" class="footer-link">casque gamer</a></li>
                <li><a href="#" class="footer-link">manette</a></li>
                <li><a href="#" class="footer-link">cd</a></li>
                <li><a href="#" class="footer-link">carte graphique</a></li>
                
                
            </ul>
        </div>
    </div>




    <p class="footer-title">about company</p>
   
    <p class="info">support emails - help@vente.com, customersupport@vente.com</p>
    <p class="info">telephone +216 58 498 592 </p>
    <div class="footer-social-container">
        <div>
            <a href="#" class="social-link">terms & services</a>
            <a href="#" class="social-link">privacy page</a>
        </div>
        <div>
            <a href="#" class="social-link">instagram</a>
            <a href="#" class="social-link">facebook</a>
            <a href="#" class="social-link">twitter</a>
        </div>
    </div>
    <p class="footer-credit">THE BEST </p>
    `;
}

createFooter();
