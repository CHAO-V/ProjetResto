<?php

try {
    require_once './ConnectBdd.php';

    //je recupere l'id posté
    $id = $_POST['id'] ?? false;
    $id = (int)$id;

    //si il n'est pas valide, je declenche une erreur (met fin a l'execution)
    if ($id <= 0) {
        throw new Exception('Erreur lors de la suppression de l\'produit (id)');
    }

    //je prépare ma requete
    $resto = $pdo->query('select * from produits where id_produits =' . $id)->fetch();
    $resto = $pdo->prepare('delete from produits where id_produits= :id_produits');
  

    $resto->execute([
        ':id_produits' => $id
    ]);
    
    header("Location:../../admin/ListeProduit.php");
   
} catch (Exception $exception) {
    echo 'erreur';
}
