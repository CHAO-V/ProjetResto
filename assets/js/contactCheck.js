const Nom = document.querySelector("#Nom");
const Prenom = document.querySelector("#Prenom");
const email = document.querySelector("#email");
const phone = document.querySelector("#phone");
const object = document.querySelector("#object");
const txtArea = document.querySelector("#txtArea");
const button = document.querySelector("#button");
const ContactForm = document.querySelector("#ContactForm");
const errorA = document.querySelector("#errorA");

button.addEventListener("click", function (e) {
  e.preventDefault();
  ValidateContact();
  document.querySelector("#ContactForm").submit();
});

function ValidateContact() {
  if (Nom.value == "") {
    errorA.innerHTML = "Entrez votre Nom";
    Nom.focus();
    button.removeEventListener("click");
    return false;
  }

  if (Prenom.value == "") {
    errorA.innerHTML = "Entrez votre Prénom";
    Prenom.focus();
    button.removeEventListener("click");
    return false;
  }

  if (email.value == "") {
    errorA.innerHTML = "Entrez votre mail";
    email.focus();
    button.removeEventListener("click");
    return false;
  } else {
    errorA.innerHTML = "OK";
  }
  if (phone.value == "") {
    errorA.innerHTML = "Entrez votre mail";
    phone.focus();
    button.removeEventListener("click");
    return false;
  } else {
    errorA.innerHTML = "OK";
  }
  if (object.value == "") {
    errorA.innerHTML = "Entrez l'objet de votre demande";
    object.focus();
    button.removeEventListener("click");
    return false;
  } else {
    errorA.innerHTML = "OK";
  }
  if (txtArea.value == "") {
    errorA.innerHTML = "Entrez votre message";
    txtArea.focus();
    button.removeEventListener("click");
    return false;
  } else {
    errorA.innerHTML = "OK";
  }

  console.log(Nom.value);
}
