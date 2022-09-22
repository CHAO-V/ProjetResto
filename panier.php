<?php
  include_once('./assets/php/ConnectBdd.php');
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="./assets/css/panier.css">
</head>
<body>
    <h1>Panier</h1>
    <div class="container">
        <form action='./assets/php/confirmationPanier.php' method='post'>
            <fieldset>
                <legend>Mes coordonnées</legend>
                <div class='field'>
                <label for='lastname'>Nom</label>
                <div class='value'><input type='text' id='lastname' name='lastname' value=<?=$_SESSION['client']['nom']?>></div>
                </div>
                <div class='field'>
                <label for='firstname'>Prénom</label>
                <div class='value'><input type='text' id='firstname' name='firstname' value=<?=$_SESSION['client']['prenom']?>></div>
                </div>
                <div class='field'>
                <label for='email'>Email</label>
                <div class='value'><input type='email' id='email' id='email' value=<?=$_SESSION['client']['mail']?>></div>
                </div>
                <div class='field'>
                <label for='phone'>N°de téléphone</label>
                <div class='value'><input type='text' id='phone' id='phone' value=<?=$_SESSION['client']['telephone']?>></div>
                </div>
            </fieldset>
                
            <fieldset>
                <legend>Récapitulatif de votre commande</legend>
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
                            $quantite=$_SESSION['panier'][$produit['id_produits']];
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
            </fieldset>
                <div class='btn-container'>
                    <button class='btn' type='submit'>Commander</button>
                    <button class='btn' type='submit'><a href="./index.php#menu">Retour</a></button>
                </div>
        </form>
    </div>
</body>
</html>
