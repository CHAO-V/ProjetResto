<?php
try{
//inclure la page de connexion
 include_once "./ConnectBdd.php";
 //verifier si une session existe
 if(!isset($_SESSION)){
    //si non demarer la session
    session_start();
 }
 //creer la session
 if(!isset($_SESSION['panier'])){
    //s'il nexiste pas une session on créer une et on mets un tableau a l'intérieur 
    $_SESSION['panier'] = array();
 }
   $id = $_POST['id-products'];
   $id = (int)$id;

    if ($id <= 0) {
       throw new Exception('Erreur lors de la récuperation de l\'produit (id)');
   }
    //j
 //récupération de l'id dans le lien
//si un id a été envoyé alors :
  

    //verifier grace a l'id si le produit existe dans la base de  données
    $req = $pdo->prepare("SELECT * FROM produits WHERE id_produits = :id_produits");
    $req->execute([
        ':id_produits' => $id
    ]);
    $produits = $req->fetch(PDO::FETCH_ASSOC) ?? null;
    var_dump($produits);

    if(empty($produits)){
        //si ce produit n'existe pas
        die("Ce produit n'existe pas");
    }
    //ajouter le produit dans le panier ( Le tableau)

    if(isset($_SESSION['panier'][$id])){// si le produit est déjà dans le panier
        $_SESSION['panier'][$id]++; //Représente la quantité 
    }else {
        //si non on ajoute le produit
        $_SESSION['panier'][$id]= 1 ;
    }
//    //redirection vers la page index.php
   header("Location:./../../index.php#commander");



  }catch (Exception $exception) {
    echo '
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong>Erreur!</strong> <a href="#" class="alert-link">Une erreur est survenue : ' . $exception->getMessage() . '
        </a> and try submitting again.
        </div>
        ';
}
