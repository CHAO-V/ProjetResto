let nomProduit = [];
let img = [];
let description = [];
let menu = [];
let price = [];
let ficheProduit = "";
let i = [];

function affichageProduits(products) {
  //sélection du DOM
  const resultProduit = document.querySelector("#resultProduit");
  //la boucle pour afficher tous les objets dans la page web
  for (i = 0; i < products.length; i++) {
    //mettre les données dans les variables
    products.forEach((element, i) => {
      nomProduit[i] = element.nomProduit;
      img[i] = element.img;
      description[i] = element.description;
      menu[i] = element.menu;
      price[i] = element.price;
    });
    //afficher tous les objets sur la page
    ficheProduit =
      ficheProduit +
      `<div class="menuCard mix ${menu[i]}">
  <div class="menuImg"><img src="${img[i]}" alt="" srcset=""></div>
  <div class="menuTxt">
    <h4>${nomProduit[i]}</h4>
    <p> ${description[i]}</p>
    <p>${price[i]}€</p>
  </div>
  <div class="menuBtn">
    <button type="submit" id="addProduct">Commander</button>
  </div>
  </div>
  </div>`;

    //injection html
    resultProduit.innerHTML = ficheProduit;

    const addProduct = document.querySelector("#addProduct");

    addProduct.addEventListener("click", function (e) {
      e.preventDefault();
      let foodname = products[1].nomProduit;
      // let price = price[i];
      const titlefood = document.createElement("p");
      const pricefood = document.createElement("p");
      titlefood.innerHTML = foodname;
      pricefood.innerHTML = price + "€";

      resultName.appendChild(titlefood);
      resultPrice.appendChild(pricefood);
    });
  }
}
console.log(products[10].nomProduit);
affichageProduits(products);
