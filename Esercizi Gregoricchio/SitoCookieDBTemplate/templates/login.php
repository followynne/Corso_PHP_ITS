<?php $this->layout('layout', ['title' => 'Login']) ?>

    <h1>Benvenuto!</h1>
    <div></div>
    <form action="log.php" method="POST" name="login">
            <input type="email" name="mail"><br/>
            <input type="password" name="pwd"><br/>
            <input type="submit" name="login" >
        </form>
    <div>Se non sei registrato, <a href="./new.php">clicca qui per farlo</a></div>
    <div></div>
    <div><h6><?= $this->e($msg)?></h6></div>
