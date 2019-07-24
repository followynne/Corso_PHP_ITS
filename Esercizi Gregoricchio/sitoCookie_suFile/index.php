<?php
session_set_cookie_params(3600);
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomePage</title>
</head>
<body>

<h1>Benvenuto<?php if (isset($_SESSION['email'])){
            $test = $_SESSION['email'];
            echo(" " . $test);
            }
            ?>!
    </h1>
    <div></div>
    <?php if (!isset($_SESSION['mail'])){
    echo('<form action="log.php" method="POST" name="login">
            <input type="email" name="mail"><br/>
            <input type="password" name="pwd"><br/>
            <input type="submit" name="login" >
        </form>
    <div>Se non sei registrato, <a href="./signup.php">clicca qui per farlo</a></div>
    <div></div>');} else {
        echo('<a href = "logout.php"><input type="button" value="Log Out" name="logout"></input></a>');
    }
    ?>

    <?php if (isset($_COOKIE['message'])){
            echo "<h6> " . $_COOKIE['message'] . "</h6>";
            }
            ?>
    </body>
</html>
