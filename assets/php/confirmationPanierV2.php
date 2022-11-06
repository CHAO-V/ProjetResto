<?php
  include_once('./ConnectBdd.php');
  session_start();
  $_SESSION['panier'];
  $ids = array_keys($_SESSION['panier']);
$products = $pdo->query("SELECT * FROM produits WHERE id_produits IN (".implode(',', $ids).")");

foreach($products as $produit):
    $nomProduit=$produit['nom_produit'];
endforeach;
var_dump($nomProduit);

$id_commandes="";
$panier = $pdo->prepare("INSERT INTO commandes VALUES (null,:panier,null,:id_client)");
  $panier->execute([
        ':panier' => $nomProduit
      ]);

    
?>