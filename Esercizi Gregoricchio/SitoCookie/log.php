<?php
session_start();
$post = $_POST;

if (isset($post["login"])){
    $data = file_get_contents("../../" . session_id() . ".txt");
    $filename = unserialize($data);
    if (password_verify($post["pwd"], $data["pwd"])){
        http_response_code(200);
        setcookie('message', $value="");
        $_SESSION['email'] = $post['mail'];
        header("Refresh:0");
        $_SESSION = $data;
    } else {
        http_response_code(401);
        setcookie('message', $value="Errore 401.Riprova.");
        header("Location: ../index.php");
        exit;
    }
}

if (isset($post["signup"])){
    if (filter_var($post['mail'], FILTER_VALIDATE_EMAIL) && strlen($post['pwd'])>8){    
        $dati['email'] = $post["mail"];
        $pwd = password_hash($post["pwd"], PASSWORD_DEFAULT);
        $dati['pwd'] = $pwd;
        file_put_contents("../../" . $_COOKIE['PHPSESSID'] . ".txt", serialize($dati));
        setcookie('message', $value="Account creato. :).");
        //session_unset();
        header("Location: ../index.php");
        exit;
    } else {
        http_response_code(401);
        setcookie('notValidate', $value="Errore, dati di registrazione non sicuri.Riprova.");
        header("Location: ../signup.php");
        exit;
    }
} 