<?php
session_set_cookie_params(3600);
session_start();
$post = $_POST;
$dsn = 'mysql:dbname=utenti_php;host=127.0.0.1';
$user = 'root';
$password = '';
if (isset($_POST['recaptcha_response'])) {

    // Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6Le696wUAAAAAJ8RVAEVUz_bt6vDdvqYtutmRM6n';
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
    
}

$sql = 'Select * from user_data where username = :user;';
try{
    $pdo = new PDO($dsn, $user, $password);
    $set = $pdo->prepare($sql);
    $set->bindValue(':user', $post['mail']);
    $set->execute();
    $dataToCheck = $set->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e){
    setcookie('message', $value="Errore di connessione al database.");
    header("Location: ../index.php");
    http_response_code(401);
    exit;
}

if (!$dataToCheck){
    setcookie('message', $value="Errore 404.Account non trovato.");
    http_response_code(404);
    header("Location: ../index.php");
    exit;
} else {
    if (password_verify($post['pwd'], $dataToCheck['pwd']) && ($recaptcha->score >= 0.5)){
        http_response_code(200);
        $_SESSION['mail'] = $post['mail'];
        $_SESSION['pwd'] = $post['pwd'];
        setcookie('message', $value= "");
        header("Location: ../index.php");
        exit;
    } else {
        setcookie('message', $value="Errore 401.Riprova.");
        http_response_code(401);
        header("Location: ../index.php");
        exit;
    }
}
