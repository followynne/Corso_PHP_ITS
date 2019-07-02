<?php
session_start();
$post = $_POST;

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

if (password_verify($post['pwd'], $dataToCheck['pwd'])){
    setcookie('message', $value="");
    http_response_code(200);
    $_SESSION['email'] = $post['mail'];
    header("Refresh:0");
    $_SESSION = $data;
    exit;
} else {
    setcookie('message', $value="Errore 401.Riprova.");
    http_response_code(401);
    header("Location: ../index.php");
    exit;
}

