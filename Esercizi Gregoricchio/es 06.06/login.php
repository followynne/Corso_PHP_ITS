<?php 

$post = $_POST;

if (!(filter_var($post['email'], FILTER_VALIDATE_EMAIL))){
    http_response_code(401);
    include('my_401.php');
    exit();
}

if ((strlen($post['password'])<8) && $post['password']!="supersegreto"){
    header("La password non è valida.", true, 401);
    //http_response_code(401);
    include('my_401.php');
    exit();
} ù

http_response_code(200);
echo "Mi piace il tuo login, file salvato!";
var_dump($_FILES);
echo "" . $_FILES['file']['tmp_name'];
move_uploaded_file($_FILES['file']['tmp_name'], "C:\\Users\\" . $_FILES['file']['name']);
