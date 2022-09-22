<?php
  include_once('../assets/php/ConnectBdd.php');
  // include_once('../ajoutev2.php')
  include_once('../assets/php/ajouter.php');
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
    <link rel="stylesheet" href="./css/admin.css">
    <title>Gestion de Produit</title>
    
  </head>
  <body class="bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="d-flex">
        <img src="./images/logo.jpg" alt="" class="logo">
        <h1 class="navbar-text">Gestion de produit</h1>
        <div class="dropdown">
      <img alt="Logo Goku Asian Food" src="./images/logo.jpg" width="48" />

        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php
              if (isset($_SESSION['admin']['user'])) echo "Bienvenue: {$_SESSION['admin']['user']}";
              ?>
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="./../index.php">Aller sur le site</a></li>
          <li><a class="dropdown-item" href='./../assets/php/deconnexionAdmin.php'>Déconnexion</a></li>
        </ul>
      </div>
      </div>
    </nav>
    <div class="container">
     
                <div class='m-4'>
                  <div class='card text-center'>
                    <div class='card-header'>
                      <ul class='nav nav-tabs card-header-tabs' id='myTab'>
                        <li class='nav-item'>
                          <a href='#ListProduct' class='nav-link active' data-bs-toggle='tab'
                            >Liste des produits</a>
                        </li>
                        <li class='nav-item'>
                          <a href='#Product' class='nav-link' data-bs-toggle='tab'>Ajouter un produit</a>
                        </li>
                        <li class='nav-item'>
                          <a href='#messages' class='nav-link' data-bs-toggle='tab'
                            >Historique des commandes</a
                          >
                        </li>
                      </ul>
                    </div>
                    <div class='card-body'>
                      <div class='tab-content'>
                        <div class='tab-pane fade show active' id='ListProduct'>
                    <?php

                    foreach ($pdo->query('select * from produits')->fetchAll() as $data => $produits) {
                      echo"
                
                          <div class='text-center'>
                          <div class='card w-75 mb-3 ' >
                            <div class='card-body'>
                              <h2 class='card-title text-center'>{$produits['nom_produit']}</h2>
                              <img class='card-img-left' src='{$produits['image']}'>
                              <p class='card-text'>Description: {$produits['description']}</p>
                              <p class='card-text'>Catégorie: {$produits['categorie']}</p>
                              <p class='card-text'>Prix: {$produits['prix']}€</p>
                              <form action='../assets/php/supprimer.php' method='post'>
                              <input type='hidden' name='id' value='{$produits['id_produits']}'>
                              <button type='submit'class='btn btn-primary'>Supprimer</button>
                            </form>
                              <form action='../assets/php/modifier.php' method='post'>
                              <input type='hidden' name='id' value='{$produits['id_produits']}'>
                              <button type='submit'class='btn btn-primary'>Modifier</button>
                            </form>
                            </div>
                          </div>
                          </div>";
                    }
                       ?>
                <!-- <div class='container'>
                  <h1 class='text-center mt-3'>Connectez-vous avec vos identifiants !</h1>
                  <div class='text-center'>
                  <a href='./connectAdmin.php' class='btn btn-primary mt-3' role='button'>Connexion</a>
                  <a href='./createAdmin.php' class='btn btn-primary mt-3' role='button'>Créer un compte</a>
                  </div>
                </div>
      
              </div> -->
           
              <div class='tab-pane fade' id='Product' >
              <form action='' method='POST'  enctype='multipart/form-data'>
                  <div class='input-group mb-3 mt-3'>
                  <div class='input-group-prepend'>
                  <span class='input-group-text' id='basic-addon1'>Nom produit</span>
                </div>
                <input type='text' class='form-control'   name="productName" placeholder='Nom produit' aria-label='Nom produit' aria-describedby='basic-addon1'>
              </div>
              <div class='input-group mb-3'>
                <div class='input-group-prepend'>
                  <span class='input-group-text' id='basic-addon1'>Description</span>
                </div>
                <input type='text' class='form-control' name='description' placeholder='Description' aria-label='Description' aria-describedby='basic-addon1'>
              </div>
              <div class='input-group mb-3'>
                <div class='input-group-prepend'>
                  <span class='input-group-text' id='basic-addon1'>Catégorie</span>
                </div>
                <select class='form-select' aria-label='Default select example' name="categorie">
                <option selected>Choisir catégorie</option>
                <option value='entrees'>Entrées</option>
                <option value='sushis'>Sushis</option>
                <option value='nouille'>Nouille</option>
              </select>
              </div>
              <div class='input-group mb-3'>
                <div class='input-group-prepend'>
                  <span class='input-group-text'  id='basic-addon1'>Prix</span>
                </div>
                <input type='text' class='form-control'  name='prix' placeholder='Prix' aria-label='Prix' aria-describedby='basic-addon1'>
              </div>
              <div class='input-group mb-3'>
              <div class='input-group-prepend'>
              <span class='input-group-text' id='basic-addon1'>Image</span>
              </div>
                <input type='hidden' name='MAX_FILE_SIZE' value='10000000' />
                <input type='file' class='form-control' id='image' name='image' placeholder='image' aria-label='image' aria-describedby='basic-addon1'  accept='image/jpeg, image/png, image/jpg'>
              </div>
              <button type='submit'  name='AddProduct' class='btn btn-secondary'>Ajouter produit</button>
                </form>
              </div>
              <div class='tab-pane fade' id='messages'>
                <h5 class='card-title'>Messages tab content</h5>
                <p class='card-text'>
                  Here is some example text to make up the tab's content.
                  Replace it with your own text anytime.
                </p>
                <a href='#' class='btn btn-primary'>Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>    
  </body>
</html>

