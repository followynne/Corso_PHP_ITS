<?php
session_start();
$post = $_POST;
$filename = [];

if (file_exists("./../userdata.txt")){
  $data = explode("\r\n", file_get_contents("./../userdata.txt"));
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

if (array_search($post['mail'], array_column($filename, 'email'))===false) {
  if (filter_var($post['mail'], FILTER_VALIDATE_EMAIL) && strlen($post['pwd'])>5){
      $dati['email'] = $post["mail"];
      $pwd = password_hash($post['pwd'], PASSWORD_DEFAULT);
      $dati['pwd'] = $pwd;

      #file_put_contents("./../" . $dati['email'] . ".txt", serialize($dati));
      file_put_contents("./../userdata.txt", serialize($dati), FILE_APPEND);
      setcookie('notValidate', $value="");
      setcookie('message', $value="Account creato. :).");
      header("Location: ../index.php");
      exit;
  } else {
    http_response_code(401);
    setcookie('notValidate', $value="Errore, dati di registrazione non sicuri.Riprova.");
    header("Location: ../signup.php");
    exit;
}
} else {
  setcookie('notValidate', $value="Errore, account mail già presente.");
  http_response_code(401);
  header("Location: ../signup.php");
  exit;
}
