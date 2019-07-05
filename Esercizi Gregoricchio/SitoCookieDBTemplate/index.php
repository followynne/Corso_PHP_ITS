<?php

require '.\vendor\autoload.php';
use League\Plates\Engine;
$templates = new Engine('C:\\Users\\m.gregoricchio\\Desktop\\MatteoGregoricchio\\Programmazione PHP&Mobile\\ITS_Corso_PHP_ITS\\Esercizi Gregoricchio\\SitoCookieDBTemplate\\templates');

$test = "";
$msg = "";

if (isset($_COOKIE['message'])){
    $msg = $_COOKIE['message'];
}

if (isset($_SESSION['mail'])){
    $test = " " . $_SESSION['mail'];
    echo $templates->render('logged', ['mail'=>$test]);
} else {
    echo $templates->render('login', ['msg'=>$msg]);
}

//echo $templates->render('login', ['msg'=>$msg]);
//echo $templates->render('logged', ['mail'=>$test, 'login'=>$login, 'msg'=>$msg]);