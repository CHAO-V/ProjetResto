<?php
      $message ="Veuillez remplir les champs !";

      if(isset($_POST['submit'])){
        include_once('../assets/php/ConnectBdd.php');

        $Nom = $_POST['Nom'];
        $Prenom = $_POST['Prenom'];
        $Email = $_POST['Email'];
        $number = $_POST['number'];
        $clientPassword = $_POST['clientPassword'];
        $clientRepassword = $_POST['clientRepassword'];

        if(isset($Nom) && empty($Nom)){

          $message ="Veuillez entrer votre nom !";
        }
        if(isset($Prenom) && empty($Prenom)){

          $message ="Veuillez entrer votre prénom !";
        }
        if(isset($Email) && empty($Email)){
          $message ="Veuillez entrer votre email !";

        }

        if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
          $message ="$Email valide";
        } else {
          $message ="$Email non valide";
        }

        if(isset($number) && empty($number)){

          $message ="Veuillez entrer votre N° de téléphone !";
        }
        if(isset($clientPassword) && empty($clientPassword)){

          $message ="Veuillez entrer un mot de passe !";
        }
    
        if(isset($clientPassword) && empty($clientPassword) && isset($clientRepassword) && empty($clientRepassword)){
    
          $message ="Veuillez entrer un mot de passe !";
        }
    
        if($clientPassword != $clientRepassword){
    
          $message ="Les mots de passes ne correspondent pas !";
        }

        if(isset($Nom) && !empty($Nom) && isset($Prenom) && !empty($Prenom) && isset($Email) && !empty($Email) &&  isset($number) && !empty($number) &&  isset($clientPassword) && !empty($clientPassword)&& isset($clientRepassword) && !empty($clientRepassword)){
                  $clientAccount = $pdo->prepare("INSERT INTO client VALUES (null,:nom,:prenom,:email,:telephone,:passwordClient)");
                  $res = $clientAccount->execute([
                    ':nom' => $Nom,
                    ':prenom' => $Prenom,
                    ':email' => $Email,
                    ':telephone' => $number,
                    ':passwordClient' => password_hash($clientPassword, PASSWORD_ARGON2I),
                  ]);
                  $message ="Inscription réussi ! Vous allez être rediriger sur la page de connexion";
                  header( "refresh:3;url=connectClient.php" );
                }

      }

    ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <title>Inscription Client</title>
  </head>
  <body class="bg-black">
    <div class="container">
            <h1 class="text-center text-light mb-3">Inscription Client</h1>
            <div class="alert alert-danger" role="alert">
                <?php
                    if(isset($message)) echo $message ;
                ?>
            </div>
            <form method="post">
                <div class="form-group">
                    <label for="Nom" class="text-light">Nom</label>
                    <input type="text" class="form-control" name="Nom"  placeholder="Entrer un nom utilisateur">
                </div>
                <div class="form-group">
                    <label for="Prénom" class="text-light">Prénom</label>
                    <input type="text" class="form-control" name="Prenom"  placeholder="Entrer un nom utilisateur">
                </div>
                <div class="form-group mt-3">
                    <label for="Email" class="text-light">Email</label>
                    <input type="email" class="form-control" name="Email" placeholder="Entrer un Email">
                </div>
                <div class="form-group mt-3">
                    <label for="téléphone" class="text-light">N°de téléphone</label>
                    <input type="text" class="form-control" name="number" placeholder="Entrer un N°de téléphone">
                </div>
                <div class="form-group mt-3">
                    <label for="Mot de passe" class="text-light">Mot de passe</label>
                    <input type="password" class="form-control" name="clientPassword" placeholder="Entrer un Mot de passe">
                </div>
                <div class="form-group mt-3">
                    <label for=" Confirmation Mot de passe" class="text-light">Confirmation du mot de passe</label>
                    <input type="password" class="form-control" name="clientRepassword" placeholder="Confirmation du Mot de passe">
                </div>
                
                <button type="submit" name="submit" class="btn text-light bg-dark mt-3">S'inscrire</button> 
                <a href="./connectClient.php" class="btn text-light bg-dark mt-3">Retour</a>

            </form>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>
    
  </body>
</html>
