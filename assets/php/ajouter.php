<?php
  $message ="Veuillez entrer un nom de produit !";

if(isset($_POST['AddProduct'])){

    $productName = strip_tags($_POST['productName']);
    $description = strip_tags($_POST['description']);
    $categorie = strip_tags($_POST['categorie']);
    $prix = strip_tags($_POST['prix']);
    $imageInput=$_FILES["imageInput"];
    // $imageInput = $_POST['imageInput'];

    if(isset($productName) && empty($productName)){

      $message ="Veuillez entrer un nom de produit !";
    }

    if(isset($description) && empty($description)){

      $message ="Veuillez entrer une description !";
    }

    if(isset($categorie) && empty($categorie)){

      $message ="Veuillez entrer une catégorie !";
    }

    if(isset($prix) && empty($prix)){

      $message ="Veuillez entrer un prix!";
    }

    if(isset($imageInput) && empty($imageInput)){

      $message ="Veuillez ajouter une image !";
    }

    

    if(isset($productName) && !empty($productName) && isset($description) && !empty($description)&& isset($categorie) && !empty($categorie)&& isset($prix) && !empty($prix)){

          $fileToUpload = $imageInput;
          $target_file = __DIR__ . '/assets/imageDataBase/' . basename($fileToUpload["name"]);
          // $target_file =  'C:/xampp/htdocs/ProjetResto/assets/imageDataBase/'. basename($fileToUpload["name"]);
          // $target_file = __DIR__ . './../../assets/imageDataBase/'. basename($fileToUpload["name"]);
          $imgPath = 'assets/imageDataBase/' . $fileToUpload["name"];
          $uploadOk = true;
          $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
      var_dump($fileToUpload);
      var_dump($_FILES);
      var_dump($_POST);

          // Check if image file is a actual image or fake image
          if (isset($_POST["AddProduct"])) {
            $check = getimagesize($fileToUpload["tmp_name"]);
            if ($check !== false) {
              echo "le fichier a du contenu - " . $check["mime"] . ".";
            } else {
              echo "le fichier est vide";
              $uploadOk = false;
            }
          }
    
          var_dump($imageInput);
          // var_dump($_FILES);
          // Check if file already exists
          if (file_exists($target_file)) {
            echo "désolé, ce fichier existe deja sur le serveur.";
            $uploadOk = false;
          }
    
          // Check file size
          if ($fileToUpload["size"] > 500000) {
            echo "Désolé, le fichier dépasse la taille maximale autorisé";
            $uploadOk = false;
          }
    
          // Allow certain file formats
          if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "svg"
          ) {
            echo "Sorry, only JPG, JPEG, PNG, GIF & SVG files are allowed.";
            $uploadOk = false;
          }
    
          // Check if $uploadOk is set to 0 by an error
          if (!$uploadOk) {
            echo "Le fichier ne respecte les conditions d'upload";
            // if everything is ok, try to upload file
          } else {
    
            //je déplace mon fichier du dossier temporaire vers son dossier définitif
            // if (move_uploaded_file($fileToUpload["tmp_name"], $target_file)) {
            if (move_uploaded_file($fileToUpload["tmp_name"], $imgPath)) {
              //succès
              // echo "The file " . htmlspecialchars(basename($fileToUpload["name"])) . " has been uploaded.";
              // echo '<a href="../../index.php">Lien de retour</a>';
            } else {
              //erreur
              echo "Erreur : le déplacement du fichier est impossible";
            }
          }

          $resto = "INSERT INTO produits VALUES (null,'$productName', '$description', '$categorie', '$imgPath', '$prix')";
          $pdo->exec($resto);

    }else{
      $message ="Le produit n'a pas pu être ajouté !";
    }
 

}

 
   ?>


