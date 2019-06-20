<?php
session_start();
$post = $_POST;

if (isset($post["login"])){
    $filename = unserialize(session_id());
    $data = file_get_contents($filename);
    var_dump($_SESSION);
    // if (password_verify($post["pwd"], $data["pwd"])){
    //     http_response_code(200);
    //     header("Refresh:0");
    //     $_SESSION = $data;
    // } else {
    //     http_response_code(401);
    //     setcookie('message', $value="Errore 401.Riprova.");
    //     header("Location: ../index.php");
    //     exit;
    // }
} else if (isset($post["signup"])){
    $_SESSION['email'] = $post["mail"];
    $pwd = password_hash($post["pwd"], PASSWORD_DEFAULT);
    $_SESSION['pwd'] = $pwd;
    serialize($_SESSION);
    session_unset();
    setcookie('message', $value="Account creato. :).");
    header("Location: ../index.php");
    exit;
} else {
    http_response_code(401);
    setcookie('message', $value="Errore 401.Riprova.");
    header("Location: ../index.php");
    exit;
}