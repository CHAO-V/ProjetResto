<?php
 $message ="Veuillez remplir les champs !";
      if(isset($_POST['submit'])){
        include_once('../assets/php/ConnectBdd.php');
        $EmailUser = $_POST['EmailUser'];
        $ClientPassword = $_POST['ClientPassword'];
        $EmailUser = htmlspecialchars($EmailUser);
        $ClientPassword = htmlspecialchars($ClientPassword);

        if(isset($EmailUser) && empty($EmailUser)){

          $message ="Veuillez entrer un nom d'utilisateur !";
        }
    
        if(isset($ClientPassword) && empty($ClientPassword)){
    
          $message ="Veuillez entrer un mot de passe !";
        }
    
        if(isset($EmailUser) && !empty($EmailUser) && isset($ClientPassword) && !empty($ClientPassword)){
          $clientAccount = $pdo->prepare("select * from client where mail = :mail");
            if ($clientAccount->execute([
              ':mail' => $EmailUser
            ])) {
              if ($clientAccount->rowCount() === 1) {
                // je le lie a ma var $Email
                $Email = $clientAccount->fetch();
                //mdp identique?
                if (password_verify($ClientPassword, $Email['password'])) {
                  session_start();
                  $_SESSION['client'] = $Email;
                  // var_dump($_SESSION);

                  header('location: ./../index.php');
                  // $message ="OK";
                  // throw new Exception('OK');
                } else {
                  $message ="Erreur avec le pseudo ou le mot de passe !";
                  
                }
              }
              }
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
    <title>Connexion Client</title>
  </head>
  <body>
  <div class="container">
            <h1 class="text-center">Connexion Client</h1>
            <div class="alert alert-danger" role="alert">
                <?php
                    if(isset($message)) echo $message ;
                ?>
            </div>
            <form method="post">
                <div class="form-group">
                    <label for="Nom Utilisateur">Mail</label>
                    <input type="text" class="form-control" name="EmailUser"  placeholder="Entrer votre mail">
                </div>
                <div class="form-group mt-3">
                    <label for="Mot de passe">Mot de passe</label>
                    <input type="password" class="form-control" name="ClientPassword" placeholder="Mot de passe">
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary mt-3">Connexion</button>
                <a href="./createClient.php" class="btn btn-primary mt-3" role="button">Créer un compte</a>

            </form>
    </div>
  
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
