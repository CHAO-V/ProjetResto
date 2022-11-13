const plats = document.querySelectorAll(".menuCard");
const addProduct = document.querySelector("#addProduct");
const resultName = document.querySelector("#resultName");
const resultPrice = document.querySelector("#resultPrice");
const resultTotalPrice = document.querySelector("#resultTotalPrice");

plats.forEach((addProduct) => {
  addProduct.addEventListener("click", function (e) {
    e.preventDefault();
    let foodname = this.dataset.name;
    let price = this.dataset.price;
    const titlefood = document.createElement("p");
    const pricefood = document.createElement("p");
    titlefood.innerHTML = foodname;
    pricefood.innerHTML = price + "€";

    resultName.appendChild(titlefood);
    resultPrice.appendChild(pricefood);
  });
});
