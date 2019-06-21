<?php
session_start();
$post = $_POST;

if (isset($post["login"])){
    $data = explode("\r\n", file_get_contents("../../usersfile.txt"));
    $filename = [];
    foreach($data as $s){
        $tmp = unserialize($s);
        //var_dump($tmp);
        $filename[] = $tmp;
    }; 
    //var_dump($data);
    var_dump($filename);
    //if (isset($filename['pwd']))
    if (password_verify($post["pwd"], $filename["pwd"])){
        setcookie('message', $value="");
        http_response_code(200);
        $_SESSION['email'] = $post['mail'];
        header("Refresh:0");
        $_SESSION = $data;
    } else {
        setcookie('message', $value="Errore 401.Riprova.");
        header("Location: ../index.php");
        http_response_code(401);
        exit;
    }
}

if (isset($post["signup"])){
    if (filter_var($post['mail'], FILTER_VALIDATE_EMAIL) && strlen($post['pwd'])>8){ 
        $dati['PHPSESSID'] = $_COOKIE['PHPSESSID'];   
        $dati['email'] = $post["mail"];
        $pwd = password_hash($post["pwd"], PASSWORD_DEFAULT);
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
} 