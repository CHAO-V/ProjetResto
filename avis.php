<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="./assets/images/logo.jpg">
    <link rel="stylesheet" href="./assets/css/contact.css" />
    <link rel="stylesheet" href="./assets/css/reviewsCard.css" />
    <link rel="stylesheet" href="./assets/css/footer.css" />
    <link rel="stylesheet" href="./assets/css/MediaQueries.css" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Avis Client</title>
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
            <a href="./contact.php">Contact</a>
          </li>
        </ul>
      </nav>
    </header>
    <section>
      <h1>Avis Client</h1>
      <div class="container">
        <form action="">
          <fieldset>
            <legend>Avis</legend>
            <div class="field">
              <label for="Nom">Nom</label>
              <div class="value"><input type="text" id="Nom"  /></div>
            </div>
            <div class="field">
              <label for="object">Sujet</label>
              <div class="value">
                <input type="text" id="object" />
              </div>
            </div>
            <textarea
              id="txtArea"
              placeholder="Votre avis..."
            ></textarea>
          </fieldset>
          <div id="errorA"></div>
          <div class="BtnContainer">
            <button type="submit" class="button" id="button">Poster</button>
          </div>
          <input
            type="hidden"
            id="recaptchaResponse"
            name="recaptcha-response"
          />
          </form>
          <div id="result"></div>
          <div class="reviewsCard">
            <div class="reviewsImg"><img src="./assets/avatar/avatar1.png" class="img" alt="" srcset=""></div>
            <div class='reviewsTxt'>
            <h4>Nom 1</h4>
            <p>Excellent restaurant! Quelle surprise, c’est ma fille qui nous a fait découvrir ce tout nouveau restaurant et comptez sur nous pour revenir 👍😋, la décoration est top ainsi que le service, sans parler de la cuisine de qualité !</p>
            <p>Avis posté le 10/09/2022</p>
          </div>
          </div>
          <div class="reviewsCard">
            <div class="reviewsImg"><img src="./assets/avatar/avatar2.png" class="img" alt="" srcset=""></div>
            <div class='reviewsTxt'>
            <h4>Nom 2</h4>
            <p>Super restaurant, je suis venu avec mes 3 enfants et ma femme, rapport qualité prix est au top !! Le bœuf tigre est magnifiquement bon !!</p>
            <p>Avis posté le 01/01/2021</p>
          </div>
          </div>
          <div class="reviewsCard">
            <div class="reviewsImg"><img src="./assets/avatar/avatar3.png" class="img" alt="" srcset=""></div>
            <div class='reviewsTxt'>
            <h4>Nom 3</h4>
            <p>Cuisine de qualité avec de très bons produits frais, je retrouve  la cuisine de mon pays ! Je me suis régalé et le personnels sont très aimable et fort sympathique. Le cadre est magnifique et l'ambiance au rendez-vous !
            Je reviendrai à coup sûr avec Madame !</p>
            <p>Avis posté le 01/03/2020</p>
          </div>
          </div>
          <div class="reviewsCard">
            <div class="reviewsImg"><img src="./assets/avatar/avatar4.png" class="img" alt="" srcset=""></div>
            <div class='reviewsTxt'>
            <h4>Nom 4</h4>
            <p>Super bon ! Endroit agréable et convivial ! Je recommande au max</p>
            <p>Avis posté le 20/12/2020</p>
          </div>
          </div>
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
    <script src="./assets/js/reviews.js"></script>
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
