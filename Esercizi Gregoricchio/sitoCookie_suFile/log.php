<?php
session_start();
$post = $_POST;
$filename = [];
#alternative writing with multiple files identified by mail
#if (file_exists("./../" . $post['mail'] . ".txt") && $post['mail'] != ""){
if (file_exists("./../userdata.txt")){
  $data = explode("\r\n", file_get_contents("./../userdata.txt"));
/*alternative writing w/ multiple files
  $filename = [];
  foreach($data as $s){
  $tmp = unserialize($s);
  $filename[] = $tmp;
  };
*/
  $arrtemp = explode('a:', $data[0]);
  foreach($arrtemp as $s){
    if ($s == ""){
      continue;
    }
    $tmp2 = 'a:' . $s;
    $tmp = unserialize($tmp2);
    $filename[] = $tmp;
  }
} else {
  file_put_contents("./../userdata.txt", "");
}

if (array_search($post["mail"], array_column($filename, 'email'))===false) {
  setcookie('message', $value="Errore. Account mail non registrato.");
  http_response_code(401);
  header("Location: ../index.php");
  exit;
} else {
  $key = $filename[array_search($post['mail'], array_column($filename, 'email'))];
  if (password_verify($post['pwd'], $key["pwd"])){
    http_response_code(200);
    setcookie('message', $value="");
    $_SESSION['email'] = $post['mail'];
    header("Location: ../index.php");
    exit;
  } else {
    setcookie('message', $value="Errore 401.Riprova.");
    http_response_code(401);
    header("Location: ../index.php");
    exit;
  }
}
