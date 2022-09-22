<?php
try{
    include_once('./ConnectBdd.php');
    session_start();

    // var_dump($_SESSION);
    $elements=$_SESSION['panier'];
    var_dump($elements);
    $client=$_SESSION['client']['id_client'];
    // echo"ID du client: ".$client;


    // $commandes = [
    //     'id_commandes' => $idcommandes,
    //     'elements' => $elements,
    //     'id_facture' => $idFacture,
    //     'id_client' => $idclient
    // ];
    // var_dump($commandes);
    $panier="";
    foreach($elements as $key => $value){
        $panier.="$key,$value,";
    }
   $req = $pdo->prepare("INSERT INTO commandes VALUES (null,:panier,null,:id_client)");
    $req->execute([
        'panier' => $panier,
        'id_client' =>  $client,
    ]);
    if($req){
        $user= $req->fetch();
        echo"Commande OK";
    }


}catch (PDOException $pdoE){
    echo "<br>Erreur PDO:<br>".$pdoE -> getMessage();
}

