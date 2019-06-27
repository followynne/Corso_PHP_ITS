<?php
session_start();
$post = $_POST;
$dsn = 'mysql:dbname=utenti_php;host=127.0.0.1';
$user = 'root';
$password = '';

if (isset($post["login"])){
    /*$data = explode("\r\n", file_get_contents("../../usersfile.txt"));
    $filename = [];
    foreach($data as $s){
        $tmp = unserialize($s);
        //var_dump($tmp);
        $filename[] = $tmp;
    }; 
    //var_dump($data);
    var_dump($filename);
    */
    //if (isset($filename['pwd']))
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
    var_dump($post['pwd']);
    var_dump($dataToCheck['pwd']);
    var_dump(password_verify($post['pwd'], $dataToCheck['pwd']));
    exit;
    if (password_verify($post['pwd'], $dataToCheck['pwd'])){
        setcookie('message', $value="");
        http_response_code(200);
        //$_SESSION['email'] = $post['mail'];
        header("Refresh:0");
        //$_SESSION = $data;
        exit;
    } else {
        setcookie('message', $value="Errore 401.Riprova.");
        http_response_code(401);
        header("Location: ../index.php");
        exit;
    }
}

if (isset($post["signup"])){
    if (filter_var($post['mail'], FILTER_VALIDATE_EMAIL) && strlen($post['pwd'])>8){ 
        $dati['PHPSESSID'] = $_COOKIE['PHPSESSID'];   
        $dati['email'] = $post["mail"];
        $pwd = password_hash($post['pwd'], PASSWORD_DEFAULT);
        $dati['pwd'] = $pwd;
        
        /*data Add to file or database*/

        //file_put_contents("../../usersfile.txt", serialize($dati) . "\r\n", FILE_APPEND);
        $sql = 'insert into user_data values (:user, :pwd);';
        try{
            $pdo = new PDO($dsn, $user, $password);
            $set = $pdo->prepare($sql);
            $set->bindValue(':user', $dati['email']);
            $set->bindValue(':pwd', $dati['pwd']);
            $set->execute();

        } catch (PDOException $e){
            //http_response_code(401);
            setcookie('notValidate', $value="Errore di connessione al database.");
            header("Location: ../signup.php", true, 401);
            exit;        
        }

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