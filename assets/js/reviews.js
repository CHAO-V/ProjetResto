const Nom = document.querySelector("#Nom");
const object = document.querySelector("#object");
const txtArea = document.querySelector("#txtArea");
const button = document.querySelector("#button");
const result = document.querySelector("#result");

image_array = [
  "avatar5.png",
  "avatar6.png",
  "avatar7.png",
  "avatar8.png",
  "avatar9.png",
  "avatar10.png",
  "avatar11.png",
  "avatar12.png",
  "avatar13.png",
  "avatar14.png",
  "avatar15.png",
  "avatar16.png",
  "avatar17.png",
  "avatar18.png",
  "avatar19.png",
  "avatar20.png",
  "avatar21.png",
  "avatar22.png",
  "avatar23.png",
];

button.addEventListener("click", function (e) {
  e.preventDefault();
  Validate();
  randomImage();
  DateReviews();
  CreateReviews();
});

function randomImage() {
  randomIndex = Math.floor(Math.random() * image_array.length);
  selectedImage = image_array[randomIndex];
  picture = `./assets/avatar/${selectedImage}`;
}

function CreateReviews() {
  const Pnom = document.createElement("h4");
  const div = document.createElement("div");
  const divImg = document.createElement("div");
  const divTxt = document.createElement("div");
  const Img = document.createElement("img");
  const Pobject = document.createElement("p");
  const PtxtArea = document.createElement("p");
  const time = document.createElement("p");
  div.classList.add("reviewsCard");
  divImg.classList.add("reviewsImg");
  divTxt.classList.add("reviewsTxt");
  Img.classList.add("img");
  Img.src = picture;
  Pnom.innerHTML = Nom.value;
  Pobject.innerHTML = object.value;
  PtxtArea.innerHTML = txtArea.value;
  time.innerHTML = currentTime;
  result.appendChild(div);
  div.appendChild(divImg);
  div.appendChild(divTxt);
  divImg.appendChild(Img);
  divTxt.appendChild(Pnom);
  divTxt.appendChild(Pobject);
  divTxt.appendChild(PtxtArea);
  divTxt.appendChild(time);
  errorA.style.color = "green";
  errorA.innerHTML = "Merci pour votre avis !";
}

function DateReviews() {
  const DateTime = new Date();
  currentTime = "Avis posté le" + " " + DateTime.toLocaleDateString("fr-FR");
}

function Validate() {
  if (Nom.value == "") {
    errorA.style.color = "red";
    errorA.innerHTML = "Entrez votre Nom";
    Nom.focus();
    button.removeEventListener("click");
    return false;
  }

  if (object.value == "") {
    errorA.style.color = "red";
    errorA.innerHTML = "Entrez le sujet";
    object.focus();
    button.removeEventListener("click");
    return false;
  }
  if (txtArea.value == "") {
    errorA.style.color = "red";
    errorA.innerHTML = "Entrez votre Avis";
    txtArea.focus();
    button.removeEventListener("click");
    return false;
  }
}
