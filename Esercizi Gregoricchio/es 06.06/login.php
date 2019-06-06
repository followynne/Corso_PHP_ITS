<?php 

$post = $_POST;

if ((filter_var($post['email'], FILTER_VALIDATE_EMAIL)) && (strlen($post['password'])>8)){
    http_response_code(200);
    echo "Mi piace il tuo login";
} else {
    http_response_code(401);
    include('my_401.php');
}