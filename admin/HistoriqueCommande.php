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
    <title>Historique des commandes</title>
  </head>
    <body class='bg-secondary'>
      <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
      <div class="container-fluid">
        <a class='navbar-brand p-2' href='./AjouterProduit.php'
          ><img src='./images/logo.jpg' class='logo' alt='' srcset='' width='150px'
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
            <li class='nav-item active'>
              <a class='nav-link' href='./AjouterProduit.php'
                >Ajouter un produit</a
              >
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='./ListeProduit.php'>Liste des produits</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='./HistoriqueCommande.php'>Historique des commandes</a>
            </li>
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
          <h1 class='text-center mt-3'>Historique des commandes</h1>
        <?php
                        $panier = $pdo->query("SELECT panier FROM commandes");
                      
                        foreach($panier as $commande):
                          $panierImplode=(implode(',' , $commande));
                          $panierExplode=(explode(',' , $panierImplode));
                          var_dump($panierExplode)
            

                        ?>
                        <tr>
                        </tr>
                        
                    <?php endforeach ; ?>
    </section>
      <script
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa'
        crossorigin='anonymous'
      ></script>
    </body>
</html>
