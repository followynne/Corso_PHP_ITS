<?php
session_start();
$post = $_POST;
$dsn = 'mysql:dbname=utenti_php;host=127.0.0.1';
$user = 'root';
$password = '';

if (filter_var($post['mail'], FILTER_VALIDATE_EMAIL) && strlen($post['pwd'])>5){ 
    $dati['PHPSESSID'] = $_COOKIE['PHPSESSID'];   
    $dati['email'] = $post["mail"];
    $pwd = password_hash($post['pwd'], PASSWORD_DEFAULT);
    $dati['pwd'] = $pwd;
    
    $sql = 'insert into user_data values (:user, :pwd);';
    $sql2 = 'select * from user_data;';
    try{
        $pdo = new PDO($dsn, $user, $password);
        $set2 = $pdo->prepare($sql2);
        $set2->execute();
        $res = $set2->fetchAll(PDO::FETCH_ASSOC);
        foreach($res as $arr){
            if ($arr['username'] === $dati['email']){
                http_response_code(400);
                setcookie('notValidate', $value="Errore, account già presente.");
                header("Location: ../signup.php");
                exit;
            }
        }
        $set = $pdo->prepare($sql);
        $set->bindValue(':user', $dati['email']);
        $set->bindValue(':pwd', $dati['pwd']);
        $set->execute();

    } catch (PDOException $e){
        setcookie('notValidate', $value="Errore di connessione al database.");
        header("Location: ../signup.php", true, 401);
        exit;        
    }

    setcookie('message', $value="Account creato. :).");
    setcookie('notValidate', $value="");
    header("Location: ../index.php");
    exit;

} else {
    http_response_code(401);
    setcookie('notValidate', $value="Errore, dati di registrazione non sicuri.Riprova.");
    header("Location: ../signup.php");
    exit;
}