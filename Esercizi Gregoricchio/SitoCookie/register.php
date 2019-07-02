<?php
session_start();
$post = $_POST;


if (filter_var($post['mail'], FILTER_VALIDATE_EMAIL) && strlen($post['pwd'])>8){ 
    $dati['PHPSESSID'] = $_COOKIE['PHPSESSID'];   
    $dati['email'] = $post["mail"];
    $pwd = password_hash($post['pwd'], PASSWORD_DEFAULT);
    $dati['pwd'] = $pwd;

    file_put_contents("../../usersfile.txt", serialize($dati) . "\r\n", FILE_APPEND);

    setcookie('message', $value="Account creato. :).");
    header("Location: ../index.php");
    exit;
} else {
    http_response_code(401);
    setcookie('notValidate', $value="Errore, dati di registrazione non sicuri.Riprova.");
    header("Location: ../signup.php");
    exit;
}
