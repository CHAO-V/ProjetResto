<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"
            defer></script>
</head>
<body>
<main class="container">
    <h1 class="text-center">Modifier un produit</h1>
    <?php

    try {
        require_once './ConnectBdd.php';

        $id = $_POST['id'] ?? false;
        $id = (int)$id;

        if ($id <= 0) {
            throw new Exception('Erreur lors de la récuperation de l\'produit (id)');
        }
        //je prépare ma requet1e
        $req = $pdo->prepare('select *  from produits where id_produits = :id_produits');
        // je l'execute avec les parametres necessaire
        $req->execute([
            ':id_produits' => $id
        ]);

        $produits = $req->fetch(PDO::FETCH_ASSOC) ?? null;

    } catch (Exception $exception) {
        echo '
            <div class="alert alert-dismissible alert-danger">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              <strong>Erreur!</strong> <a href="#" class="alert-link">Une erreur est survenue : ' . $exception->getMessage() . '
            </a> and try submitting again.
            </div>
            ';
    }

    //on récupere les info du formulaire
    $id = $_POST['id'] ?? false;
    $id = (int)$id;
    $productName = $_POST['productName'] ?? false;
    $description = $_POST['description'] ?? false;
    $categorie = $_POST['categorie'] ?? false;
    $prix = $_POST['prix'] ?? false;


    //on fait qq verif
    if (strlen($productName) > 0 && $description > 0 && $categorie > 0 && $prix > 0) {

        try {
            require_once './ConnectBdd.php';

            //je prépare ma requete
            $req = $pdo->prepare('update produits set nom_produit = :nom_produit, description = :description, categorie = :categorie, prix = :prix where id_produits = :id_produits');
            // je l'execute avec les parametres necessaire
            $req->execute([
                ':id_produits' => $id,
                ':nom_produit' => $productName,
                ':description' => $description,
                ':categorie' => $categorie,
                ':prix' => $prix
            ]);

            echo '
            <div class="alert alert-dismissible alert-success">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              <strong>Bravo!</strong> Article modifier avec succès 
              <a href="./../../admin/ListeProduit.php" class="alert-link"> Voir la liste </a>.
            </div>
            ';

//        } catch (Exception $Exception){
        } catch (PDOException|DomainException $Exception) {
            echo '
            <div class="alert alert-dismissible alert-danger">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              <strong>Erreur!</strong> <a href="#" class="alert-link">Une erreur est survenue : ' . $Exception->getMessage() . '
            </a> and try submitting again.
            </div>
            ';
        }
    }

    ?>
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nom du produit</label>
            <input type="text" class="form-control" id="productName" name="productName" placeholder="Nom du produit"
                   value="<?php echo $produits['nom_produit'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Description"
                   value="<?php echo $produits['description'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Catégorie</label>
            <select class="form-select" aria-label="Default select example" name="categorie" >
                <option selected ><?php echo $produits['categorie'] ?></option>
                <option value="Entrées">Entrées</option>
                <option value="Sushis">Sushis</option>
                <option value="Nouille">Nouille</option>
                <option value="Bowls">Bowls</option>
                <option value="Extra">Extra</option>
                <option value="Desserts">Desserts</option>
              </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Prix</label>
            <input type="text" class="form-control" id="prix" name="prix" placeholder="Prix"
                   value="<?php echo $produits['prix'] ?>">
        </div>
        
        <input type="hidden" name="id" value="<?php echo $produits['id_produits'] ?>">
        <button type="submit" class="btn text-light bg-dark">Modifier</button>
    </form>


</main>
</body>
</html>

 