async function getProducts() {
  await fetch("http://127.0.0.1:5000/audio")
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      formedData = "";
      for (let i = 0; i < data.length; i++) {
        formedData += `
              <div class="store-product pc">
              <img src="${data[i].image_url}" alt="" class="product-img" />
              <div class="product-details">
                <h2>${data[i].name}</h2>
                <p>${data[i].price}</p>
                <img  src="${
                  data[i].source == "https://www.jumia.com.tn"
                    ? "./img/Jumia-Logo.png"
                    : data[i].source == "https://www.tunisianet.com.tn"
                    ? "./img/Tunisianet-Logo.jpg"
                    : "./img/Mytek-Logo.png"
                }" alt="" class="logo-img" />
                <br/>
                <a href="${
                  data[i].product_url
                }" target="_blank">Go to product</a>
              </div>
            </div>
              `;
        document.getElementById("store-products").innerHTML = formedData;
      }
      console.log(data);
    });
}

getProducts();
