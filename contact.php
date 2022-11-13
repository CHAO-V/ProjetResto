<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="./assets/images/logo.jpg">
    <link rel="stylesheet" href="./assets/css/contact.css" />
    <link rel="stylesheet" href="./assets/css/footer.css" />
    <link rel="stylesheet" href="./assets/css/MediaQueries.css" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Contact</title>
  </head>
  <body>
    <header>
      <nav class="navbar">
        <ul class="nav-list">
          <li class="nav-links">
            <a href="./index.php"
              ><img
                src="./assets/images/logo.jpg"
                class="logo"
                alt=""
                srcset=""
            /></a>
          </li>
          <li class="nav-links">
            <a href="./index.php">Accueil</a>
          </li>
          <li class="nav-links">
            <a href="./index.php#menu">Menu</a>
          </li>
          <li class="nav-links">
            <a href="./avis.php">Avis</a>
          </li>
        </ul>
      </nav>
    </header>
    <section>
      <h1>Formulaire de contact</h1>
      <div class="container">
        <form
          action="./assets/php/SendMail.php"
          method="post"
          id="ContactForm"
        >
          <fieldset>
            <legend>Mes coordonnées</legend>
            <div class="field">
              <label for="Nom">Nom</label>
              <div class="value"><input type="text" id="Nom" name="Nom" /></div>
            </div>
            <div class="field">
              <label for="Prénom">Prénom</label>
              <div class="value">
                <input type="text" id="Prenom" name="Prenom" />
              </div>
            </div>
            <div class="field">
              <label for="email">Email</label>
              <div class="value">
                <input type="email" id="email" name="email" />
              </div>
            </div>
            <div class="field">
              <label for="phone">N°de téléphone</label>
              <div class="value">
                <input type="text" id="phone" name="phone" />
              </div>
            </div>
          </fieldset>
          <fieldset>
            <legend>Ma demande</legend>
            <div class="field">
              <label for="object">Objet de la demande</label>
              <div class="value">
                <input type="text" id="object" name="object" />
              </div>
            </div>
            <textarea
              name="txtArea"
              id="txtArea"
              placeholder="Votre message..."
            ></textarea>
          </fieldset>
          <div id="errorA"></div>
          <div class="BtnContainer">
            <button type="submit" class="button" id="button">Envoyer</button>
          </div>
          <input
            type="hidden"
            id="recaptchaResponse"
            name="recaptcha-response"
          />
        </form>
      </div>
    </section>
    <footer>
      <div class="container">
        <div class="footer-flex">
          <aside>
            <h4>Heure d'ouverture</h4>
            <ul>
              <li>Lundi : 12h00-14h30</li>
              <li>Mardi : Fermé</li>
              <li>Mercredi : 12h00-14h30, 18h30-22h30</li>
              <li>Jeudi : 12h00-14h30, 18h30-22h30</li>
              <li>Vendredi : 18h30-00h00</li>
              <li>Samedi : 18h30-00h00</li>
              <li>Dimanche : 11h30-15h00, 19h00-00h00</li>
            </ul>
          </aside>
          <aside>
            <h4>Adresse</h4>
            <ul>
              <li>Adresse : 223bis Av. Gustave Delory, 59100 Roubaix</li>
              <li>Téléphone : 00 00 00 00 00</li>
            </ul>
          </aside>
          <aside>
            <h4>Réseaux Sociaux</h4>
            <div class="reseaux">
              <a
                href="https://www.instagram.com/goku.asianfood59/"
                target="_blank"
                ><i class="fa-brands fa-snapchat"></i
              ></a>
              <a
                href="https://www.snapchat.com/add/gokuasianfood"
                target="_blank"
                ><i class="fa-brands fa-instagram"></i
              ></a>
              <a
                href="https://www.facebook.com/people/Goku-Asian-Food/100039470687209/"
                target="_blank"
                ><i class="fa-brands fa-facebook"></i>
              </a>
            </div>
          </aside>
        </div>
      </div>
    </footer>
    <script src="./assets/js/contactCheck.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6Ld1oKIgAAAAAIAy1Y7C3YvcZXAD8lxZ-dJaMyPn"></script>
  <script>
    grecaptcha.ready(function() {
      grecaptcha.execute('6Ld1oKIgAAAAAIAy1Y7C3YvcZXAD8lxZ-dJaMyPn', {
        action: 'homepage'
      }).then(function(token) {
        document.getElementById('recaptchaResponse').value = token
      });
    });
  </script>
  </body>
</html>
