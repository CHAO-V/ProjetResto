<?php
  include_once('./../assets/php/ConnectBdd.php');
  session_start();
  if(isset($_GET['del'])){
    $id_del = $_GET['del'] ;
    //suppression
    unset($_SESSION['panier'][$id_del]);
   }

?>
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
  <section>
        <table>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>
            <?php 
              $total = 0 ;
              // liste des produits
              //récupérer les clés du tableau session
              $ids = array_keys($_SESSION['panier']);
              //s'il n'y a aucune clé dans le tableau
              if(empty($ids)){
                echo "Votre panier est vide";
              }else {
                //si oui 
                $products = $pdo->query("SELECT * FROM produits WHERE id_produits IN (".implode(',', $ids).")");

                //lise des produit avec une boucle foreach
                foreach($products as $produit):
                    //calculer le total ( prix unitaire * quantité) 
                    //et aditionner chaque résutats a chaque tour de boucle
                    $total = $total + $produit['prix'] * $_SESSION['panier'][$produit['id_produits']];
                ?>
                <tr>
                    <td><?=$produit['nom_produit']?></td>
                    <td><?=$produit['prix']?>€</td>
                    <td><?=$_SESSION['panier'][$produit['id_produits']] // Quantité?></td>
                    <td><a href="panier.php?del=<?=$produit['id_produits']?>"><img src="delete.png"></a></td>
                </tr>

            <?php endforeach ;} ?>

            <tr class="total">
                <th>Total : <?=$total?>€</th>
            </tr>
        </table>
    </section>
  </body>
</html>



<div class='text-center'>
                  <div class='card w-100 mb-3 ' >
                    <div class='card-body'>
                      <h2 class='card-title text-center'>{$produits['nom_produit']}</h2>
                      <img class='card-img-left' src='./../{$produits['image']}'>
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




<!-- vertical card -->
                  <div class='col-sm-6 col-md-4 col-lg-3'>
                    <div class='card'>
                      <img src='./../{$produits['image']}' class='card-img-top image-fluid img-thumbnail' alt='...'>
                      <div class='card-body'>
                        <h5 class='card-title'>{$produits['nom_produit']}</h5>
                        <p class='card-text'>Description: {$produits['description']}</p>
                        <p class='card-text'>Catégorie: {$produits['categorie']}</p>
                        <p class='card-text'>Prix: {$produits['prix']}€</p>
                        <div class='text-center'>
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
                    </div>
                  </div>";



                  <?php
          if (isset($_SESSION['admin']['user'])){
            foreach ($pdo->query('select panier from commandes')->fetchAll() as $data => $commandes) {
              echo"
                  <div class='text-center'>
                  <div class='card w-100 mb-3 ' >
                    <div class='card-body'>
                      <h2 class='card-title text-center'>{$commandes['panier']}</h2>
                      <h2 class='card-title text-center'>{$commandes['id_client']}</h2>
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