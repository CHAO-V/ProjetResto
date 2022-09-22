<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <title>Goku Asian Food</title>
  </head>
  <body>
    <header>
      <nav class="navbar">
        <nav class="navbar-center">
          <div class="nav-logo">
            <img
              src="/assets/images/logo-dark-bg-test.jpg"
              alt="logo"
              class="logo"
            />
          </div>
          <div class="nav-links">
            <ul>
              <a href="index.php"><li>Home</li></a>
              <a href="#menu"><li>Menu</li></a>
              <a href=""><li>Contact</li></a>
              <a href=""><li>Feature</li></a>
              <a href=""><li>Gallery</li></a>
            </ul>
          </div>
          <div class="nav-icon">
            <a
              href="https://www.instagram.com/goku.asianfood59/"
              target="_blank"
              ><i class="fa-brands fa-snapchat"></i
            ></a>
            <a href="https://www.snapchat.com/add/gokuasianfood" target="_blank"
              ><i class="fa-brands fa-instagram"></i
            ></a>
            <a
              href="https://www.facebook.com/people/Goku-Asian-Food/100039470687209/"
              target="_blank"
              ><i class="fa-brands fa-facebook"></i>
            </a>
          </div>
        </nav>
      </nav>
      <div class="home-back">
        <div class="home-banner">
          <h1 class="h1-home">Goku Asian Food</h1>
          <p class="p-home">Venez découvrir les saveurs de l'Asie.</p>
          <a href="#menu" class="button-home">Le Menu</a>
        </div>
      </div>
    </header>
    <section class="sectionM">
      <h1>Menu</h1>
      <div class="filter">
        <button data-filter="all">Tous</button>
        <button data-filter=".entrees">entrées</button>
        <button data-filter=".sushis">sushis & makis</button>
        <button data-filter=".nouille">nouille sautées & pad thaï</button>
        <button data-filter=".bowls">rice bowls & poke bowls & salades</button>
        <button data-filter=".extra">accompagnements & extra</button>
        <button data-filter=".desserts">desserts & boissons</button>
        <div class="container mixitup">
          <div id="resultProduit"></div>
        </div>
      </div>
    </section>
    <section class="commandeSection">
      <div class="container">
        <h1>Commander votre repas</h1>
        <form action="" method="post">
          <fieldset>
            <legend>Mes coordonnées</legend>
            <div class="field">
              <label for="lastname">Nom</label>
              <div class="value"><input type="text" id="lastname" /></div>
            </div>
            <div class="field">
              <label for="firstname">Prénom</label>
              <div class="value"><input type="text" id="firstname" /></div>
            </div>
            <div class="field">
              <label for="email">Email</label>
              <div class="value"><input type="email" id="email" /></div>
            </div>
            <div class="field">
              <label for="phone">N°de téléphone</label>
              <div class="value"><input type="text" id="phone" /></div>
            </div>
          </fieldset>
      <fieldset>
        <legend>Récapitulatif de votre commande</legend>
          <table class="recapFood" width="100%">
            <thead>
              <tr>
                <th class="tdName">Produit</th>
                <th>Prix</th>
                
              </tr>
            </thead>
            
  
              <tr>
                <td id="resultName"></td>
                <td class="tdPrice" id="resultPrice"></td>
              </tr>

             
            </tbody>
            <tfoot>
              <tr>
                <td></td>
                <td>Total</td>
                <td id="resultTotalPrice"></td>

              </tr>
            </tfoot>
          </table>
    
         
      </fieldset>
      
    </section>
    <footer>
      <div class="container">
        <div class="flex">
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
    <script src="./assets/js/produit.js"></script>
    <script src="./assets/js/index.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script src="./assets/js/mixitup.min.js"></script>
    <script>
      let mixer = mixitup(".mixitup");
    </script>
  </body>
</html>
