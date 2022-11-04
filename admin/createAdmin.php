<?php
      $message ="Veuillez remplir les champs !";


      if(isset($_POST['submit'])){
        include_once('../assets/php/ConnectBdd.php');

        $AdminUser = $_POST['AdminUser'];
        $AdminPassword = $_POST['AdminPassword'];
        $AdminPassword = htmlspecialchars($AdminPassword);
        $AdminRepassword = $_POST['AdminRepassword'];
        $AdminRepassword = htmlspecialchars($AdminRepassword);

        if(isset($AdminUser) && empty($AdminUser)){

          $message ="Veuillez entrer un nom d'utilisateur !";
        }
    
        if(isset($AdminPassword) && empty($AdminPassword) && isset($AdminRepassword) && empty($AdminRepassword)){
    
          $message ="Veuillez entrer un mot de passe !";
        }
    
        if($AdminPassword != $AdminRepassword){
    
          $message ="Les mots de passes ne correspondent pas !";
        }

        if(isset($AdminUser) && !empty($AdminUser) && isset($AdminPassword) && !empty($AdminPassword)&& isset($AdminRepassword) && !empty($AdminRepassword)){
                  $adminAccount = $pdo->prepare("INSERT INTO admin VALUES (null,:user, :password)");
                  $res = $adminAccount->execute([
                    ':user' => $AdminUser,
                    ':password' => password_hash($AdminPassword, PASSWORD_ARGON2I)
                  ]);
                  $message ="Inscription réussi ! Vous allez être rediriger sur la page de connexion";
                  header( "refresh:3;url=connectAdmin.php" );
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
    <title>Inscription Administrateur</title>
  </head>
  <body class="bg-black">
    <div class="container">
            <h1 class="text-center text-light mb-3">Inscription Administrateur</h1>
            <div class="alert alert-danger" role="alert">
                <?php
                    if(isset($message)) echo $message ;
                ?>
            </div>
            <form method="post">
                <div class="form-group">
                    <label for="Nom Utilisateur" class="text-light">Nom Utilisateur</label>
                    <input type="text" class="form-control" name="AdminUser"  placeholder="Entrer un nom utilisateur">
                </div>
                <div class="form-group mt-3">
                    <label for="Mot de passe" class="text-light">Mot de passe</label>
                    <input type="password" class="form-control" name="AdminPassword" placeholder="Mot de passe">
                </div>
                <div class="form-group mt-3">
                    <label for="Confirmation Mot de passe" class="text-light">Confirmation du mot de passe</label>
                    <input type="password" class="form-control" name="AdminRepassword" placeholder="Confirmation du mot de passe">
                </div>
                
                <button type="submit" name="submit" class="btn text-light bg-dark mt-3">S'inscrire</button>
                <a href="./connectAdmin.php" class="btn text-light bg-dark mt-3">Retour</a>

            </form>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>
    
  </body>
</html>
