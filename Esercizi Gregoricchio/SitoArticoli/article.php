<?php

require 'vendor/autoload.php';
use League\Plates\Engine;

$templates = new Engine('./templates');
$dsn = 'mysql:dbname=articles;host=127.0.0.1';
$user = 'marco';
$password = 'its2019';

$id  = $_GET['id'];
$sql = 'Select * from Articolo where id = :id;';
try{
    $pdo = new PDO($dsn, $user, $password);
    $set = $pdo->prepare($sql);
    $set->bindParam(':id', $id);
    $set->execute();
    $dataToCheck = $set->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e){
    setcookie('message', $value="Errore di connessione al database.");
    header("Location: ../index.php");
    http_response_code(401);
    exit;
}
echo $templates->render('_singlearticle', ['data' => $dataToCheck]);


 ?>
