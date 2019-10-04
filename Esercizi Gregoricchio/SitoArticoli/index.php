<?php

require 'vendor/autoload.php';
use League\Plates\Engine;

$templates = new Engine('./templates');
$dsn = 'mysql:dbname=articles;host=127.0.0.1';
$user = 'marco';
$password = 'its2019';

$today = new DateTime();
$t = $today->format('Ymd');
$sql = 'Select * from Articolo where data_art = :date;';
try{
    $pdo = new PDO($dsn, $user, $password);
    $set = $pdo->prepare($sql);
    $set->bindParam(':date', $t);
    $set->execute();
    $dataToCheck = $set->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e){
    setcookie('message', $value="Errore di connessione al database.");
    header("Location: ../index.php");
    http_response_code(401);
    exit;
}

//print_r ($dataToCheck);return;
echo $templates->render('_articlesgallery', ['data' => $dataToCheck]);


 ?>
