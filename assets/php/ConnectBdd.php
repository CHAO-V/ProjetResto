<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
try
{
$dsn ='mysql:dbname=resto;host=localhost;port=3306;charset=utf8';
$user='chaoprojet';
$pwd = 'RwcwWC9HmPr.za]i';

$pdo = new PDO($dsn, $user, $pwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]);

}
catch (Exception $e)
{
  
        // die('Erreur : ' . $e->getMessage());
        die('<!DOCTYPE html>
        <html lang="fr">
            <head>
                <meta charset="UTF-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <title>Une erreur est Servenue</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
                <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
                integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
                crossorigin="anonymous"
                referrerpolicy="no-referrer"
              />
            </head>
        
        
            <body class="bg-black">
                <div class="d-flex align-items-center justify-content-center vh-100">
                    <div class="text-center">
                        <h1 class="display-1 fw-bold"></h1>
                        <p class="fs-3 text-light"> <span class="text-danger">Oupps!</span> Une Erreur est survenue sur le site.</p>
                        <p class="fs-3 text-light ">Veuillez réessayer ultérieurement.</p>
                        <a href="https://www.instagram.com/goku.asianfood59/" target="_blank"><i class="fa-2x bi bi-instagram"></i></a>
                        <a href="https://www.snapchat.com/add/gokuasianfood" target="_blank"><i class="fa-2x bi bi-snapchat"></i></a>
                        <a href="https://www.facebook.com/people/Goku-Asian-Food/100039470687209/" target="_blank"><i class="fa-2x bi bi-facebook"></i></a>
                    </div>
                </div>
            </body>
        
        
        </html>');
        
}