<?php

require '.\vendor\autoload.php';
use League\Plates\Engine;
$templates = new Engine('C:\\Users\\m.gregoricchio\\Desktop\\MatteoGregoricchio\\Programmazione PHP&Mobile\\ITS_Corso_PHP_ITS\\Esercizi Gregoricchio\\SitoCookieDBTemplate\\templates');

$msg="";
if (isset($_COOKIE['notValidate'])){
    $msg = $_COOKIE['notValidate'];
}

echo $templates->render('signup', ['msg'=>$msg]);
