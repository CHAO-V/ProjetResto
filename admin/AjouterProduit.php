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
    <title>Ajouter Produit</title>
  </head>
    <body class='bg-secondary'>
      <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
        <a class='navbar-brand p-2' href='./AjouterProduit.php'
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
            <li class='nav-item active'>
              <a class='nav-link' href='./AjouterProduit.php'
                >Ajouter un produit</a
              >
            </li>
            <li class='nav-item'>
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
      <h1 class='text-center mt-3'>Ajouter un produit</h1>
      <div class="alert alert-danger" role="alert">
          <?php
            if(isset($message)) echo $message ;
           ?>
        </div>
      <?php
  if (isset($_SESSION['admin']['user'])){
    echo"
        <form action='' method='POST' enctype='multipart/form-data'>
          <div class='input-group mb-3 mt-3'>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='basic-addon1'>Nom produit</span>
            </div>
            <input
              type='text'
              class='form-control'
              name='productName'
              placeholder='Nom produit'
              aria-label='Nom produit'
              aria-describedby='basic-addon1'
            />
          </div>
          <div class='input-group mb-3'>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='basic-addon1'>Description</span>
            </div>
            <input
              type='text'
              class='form-control'
              name='description'
              placeholder='Description'
              aria-label='Description'
              aria-describedby='basic-addon1'
            />
          </div>
          <div class='input-group mb-3'>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='basic-addon1'>Catégorie</span>
            </div>
            <select
              class='form-select'
              aria-label='Default select example'
              name='categorie'
            >
              <option selected>Choisir catégorie</option>
              <option value='Entrées'>Entrées</option>
              <option value='Sushis'>Sushis</option>
              <option value='Nouille'>Nouille</option>
              <option value='Bowls'>Bowls</option>
              <option value='Extra'>Extra</option>
              <option value='Desserts'>Desserts</option>
            </select>
          </div>
          <div class='input-group mb-3'>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='basic-addon1'>Prix</span>
            </div>
            <input
              type='text'
              class='form-control'
              name='prix'
              placeholder='Prix'
              aria-label='Prix'
              aria-describedby='basic-addon1'
            />
          </div>
          <div class='input-group mb-3'>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='basic-addon1'>Image</span>
            </div>
            <input
              type='file'
              class='form-control'
              id='imageInput'
              name='imageInput'
              placeholder='image'
              aria-label='image'
              aria-describedby='basic-addon1'
              accept='image/jpeg, image/png, image/jpg'
            />
          </div>
          <button type='submit' name='AddProduct' class='btn text-light bg-dark'>
            Ajouter produit
          </button>
        </form>";
      
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
