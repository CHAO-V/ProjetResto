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
    <link rel="icon" href="./assets/images/logo.jpg">
    <link rel="stylesheet" href="./css/admin.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <title>Liste des produits</title>
    <style>
      .imgObj{
        object-fit: cover;
      }
    </style>
  </head>
      <body class='bg-secondary'>
        <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
        <div class="container-fluid">
          <a class='navbar-brand p-2' href='./ListeProduit.php'
            ><img src='./images/logo.jpg' class="logo" alt='' srcset='' width='150px'
          /></a>
          <button
            class='navbar-toggler'
            type='button'
            data-bs-toggle='collapse'
            data-bs-target='#navbarNav'
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
              <!-- <li class='nav-item'>
              <a class='nav-link' href='./HistoriqueCommande.php'>Historique des commandes</a>
            </li> -->
              <?php
              if(isset($_SESSION['admin']['user'])){
                echo"
                <div class='dropdown'>
                    <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' data-bs-toggle='dropdown'>
                      Bonjour: {$_SESSION['admin']['user']}
                    </button>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                      <a class='dropdown-item' href='./../index.php'>Aller sur le site</a>
                      <a class='dropdown-item' href='./../assets/php/deconnexionAdmin.php'>Déconnexion</a>
                    </div>
                  </div>";
              }
              ?>
            </ul>
          </div>
        </div>
        </nav>
        <section class='container'>
          <h1 class='text-center mt-3'>Liste des produits</h1>
          <div class='row gy'>
          <?php
          if (isset($_SESSION['admin']['user'])){
            foreach ($pdo->query('select * from produits')->fetchAll() as $data => $produits) {
              echo"
                <div class='card mb-3'>
                  <div class='row'>
                    <div class='col-md-8 col-lg-6 col-xl-5'>
                      <img src='./../{$produits['image']}' class='img-responsive imgObj' alt='' width='460' height='345'>
                    </div>
                    <div class='col-md-4 col-lg-6 col-xl-7'>
                      <h1 class='card-title'>{$produits['nom_produit']}</h1>
                      <p class='card-text'>Description: {$produits['description']}</p>
                      <p class='card-text'>Catégorie: {$produits['categorie']}</p>
                      <p class='card-text'>Prix: {$produits['prix']}€</p>
                      <form action='../assets/php/supprimer.php' method='post'>
                          <input type='hidden' name='id' value='{$produits['id_produits']}'>
                          <button type='submit'class='btn text-light bg-dark mb-2'>Supprimer</button>
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
          </div>
    </section>

    <script
      src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js'
      integrity='sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa'
      crossorigin='anonymous'
    ></script>
  </body>
</html>
