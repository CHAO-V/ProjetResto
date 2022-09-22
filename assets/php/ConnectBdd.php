<?php
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
        die('Erreur : ' . $e->getMessage());
}