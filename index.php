<?php
  include_once('./assets/php/ConnectBdd.php');
  session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/footer.css" />
    <link rel="stylesheet" href="./assets/css/MediaQueries.css" />
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
              src="./assets/images/logo.jpg"
              alt="logo"
              class="logo"
            />
          </div>
          <div class="nav-links">
            <ul>
              <a href="index.php"><li>Home</li></a>
              <a href="#menu"><li>Menu</li></a>
              <a href="#commander"><li>Commander</li></a>
              <a href="./contact.php"><li>Contact</li></a>

              <?php
                if (isset($_SESSION['client']['mail'])){
                echo"
                  <a href='./assets/php/deconnexionClient.php'><li>Déconnexion</li></a>";
                }
                else{
                  echo"
                  <a href='./admin/connectClient.php'><li>Connexion</li></a>";
                }
              ?>
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
    <section class="sectionM" id="menu">
      <div class="container mixitup">
        <h1>Menu</h1>
        <div class="filter">
          <button data-filter="all">Tous</button>
          <button data-filter=".Entrées">entrées</button>
          <button data-filter=".Sushis">sushis & makis</button>
          <button data-filter=".Nouille">nouille sautées & pad thaï</button>
          <button data-filter=".Bowls">
            rice bowls & poke bowls & salades
          </button>
          <button data-filter=".Extra">accompagnements & extra</button>
          <button data-filter=".Desserts">desserts & boissons</button>
        </div>
        <?php    
        if (isset($_SESSION['client']['mail'])){

        foreach ($pdo->query("select * from produits")->fetchAll() as $data => $produits) {
          echo"
          <div class='menuCard mix {$produits['categorie']}'>
          <div class='menuImg'><img src='{$produits['image']}' alt='' srcset=''></div>
          <div class='menuTxt'>
            <h4>{$produits['nom_produit']}</h4>
            <p>{$produits['description']}</p>
            <p>{$produits['prix']}€</p>
          </div>
          <div class='menuBtn'>
              <form action='assets/php/commander.php' method='post'>
                <input type='hidden' name='id-products' value='{$produits['id_produits']}'>
                <button type='submit' id='{$produits['id_produits']}'>Commander</button>
              </form>
          </div>
          </div>
          ";
        }  
      }else{
        foreach ($pdo->query("select * from produits")->fetchAll() as $data => $produits) {
          echo"
          <div class='menuCard mix {$produits['categorie']}'>
          <div class='menuImg'><img src='{$produits['image']}' alt='' srcset=''></div>
          <div class='menuTxt'>
            <h4>{$produits['nom_produit']}</h4>
            <p>{$produits['description']}</p>
            <p>{$produits['prix']}€</p>
          </div>
          <div class='menuBtn'>
            <a href='#commander'><button type='submit'>Commander</button></a>
          </div>
          </div>
          ";

      }
    }
         ?>
      </div>
       
    </section>
    <hr class="separator">
    <section class='commandeSection' id='commander'>
      <div class='container'>
      <h1>Commander votre repas</h1>
    <?php
    if (isset($_SESSION['client']['mail'])){
   echo"
    <p>Pour commander votre repas, veuillez-vous connecter<p>
    <div class='btnContainer'>
    <a href='./panier.php' class='btn'><span><?=array_sum({$_SESSION['panier']})?></span>Panier</a>
    </div>
   ";
      
  }else{
    echo"
    <p>Pour commander votre repas, veuillez-vous connecter<p>
    <div class='btnContainer'>
      <a href='./admin/connectClient.php' class='btn'>Connexion</a>
      <a href='./admin/createClient.php' class='btn'>Créer un compte</a>
    </div>
    ";
  }
    ?>
    </div>
    </section>
    <footer>
      <div class="container">
        <div class="footer-flex ">
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
            <div class="btn-footer-container">
            <a
                href="./contact.php"
                target="_blank" class='btn-footer'
                >Nous Contacter
              </a>
              </div>
          </aside>
        </div>
      </div>
    </footer>
    <!-- <script src="./assets/js/price.js"></script> -->
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
