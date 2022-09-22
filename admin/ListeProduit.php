<?php
  include_once('../assets/php/ConnectBdd.php');

  session_start();

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="/assets/css/admin.css"> -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <title>Liste des produits</title>
  </head>
      <body class='bg-secondary'>
        <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
          <a class='navbar-brand p-2' href='./ListeProduit.php'
            ><img src='./images/logo.jpg' alt='' srcset='' width='150px'
          /></a>
          <button
            class='navbar-toggler'
            type='button'
            data-toggle='collapse'
            data-target='#navbarNav'
            aria-controls='navbarNav'
            aria-expanded='false'
            aria-label='Toggle navigation'
          >
            <span class='navbar-toggler-icon'></span>
          </button>
          <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav'>
              <li class='nav-item'>
                <a class='nav-link' href='./AjouterProduit.php'
                  >Ajouter un produit</a
                >
              </li>
              <li class='nav-item active'>
                <a class='nav-link' href='./ListeProduit.php'>Liste des produits</a>
              </li>
              <li class='nav-item'>
              <a class='nav-link' href='#'><?php
              if (isset($_SESSION['admin']['user'])) echo "Bonjour: {$_SESSION['admin']['user']}";
              ?></a>
              </li>
              <li class='nav-item'>
                <a class='nav-link' href='./../assets/php/deconnexionAdmin.php'>Déconnexion</a>
              </li>
            </ul>
          </div>
        </nav>
        <section class='container'>
          <h1 class='text-center mt-3'>Liste des produits</h1>
          <?php
          if (isset($_SESSION['admin']['user'])){
            foreach ($pdo->query('select * from produits')->fetchAll() as $data => $produits) {
              echo"
                  <div class='text-center'>
                  <div class='card w-100 mb-3 ' >
                    <div class='card-body'>
                      <h2 class='card-title text-center'>{$produits['nom_produit']}</h2>
                      <img class='card-img-left' src='{$produits['image']}'>
                      <p class='card-text'>Description: {$produits['description']}</p>
                      <p class='card-text'>Catégorie: {$produits['categorie']}</p>
                      <p class='card-text'>Prix: {$produits['prix']}€</p>
                      <form action='../assets/php/supprimer.php' method='post'>
                      <input type='hidden' name='id' value='{$produits['id_produits']}'>
                      <button type='submit'class='btn text-light bg-dark'>Supprimer</button>
                    </form>
                      <form action='../assets/php/modifier.php' method='post'>
                      <input type='hidden' name='id' value='{$produits['id_produits']}'>
                      <button type='submit'class='btn text-light bg-dark'>Modifier</button>
                    </form>
                    </div>
                  </div>
                  </div>";
            }
          }else{
            echo"
            <div class='alert alert-danger' role='alert'>
              Vous n'êtes pas connecté ! Vous allez être rediriger sur la page de connexion Admin
            </div>";
            header( "refresh:3;url=connectAdmin.php" );
           }
              ?>
    </section>

    <script
      src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js'
      integrity='sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa'
      crossorigin='anonymous'
    ></script>
  </body>
</html>
