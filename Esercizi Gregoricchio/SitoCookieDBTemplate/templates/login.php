<?php $this->layout('layout', ['title' => 'Login']) ?>

    <h1>Benvenuto!</h1>
    <div></div>
    <form action="log.php" method="POST" name="login">
            <input type="email" name="mail"><br/>
            <input type="password" name="pwd"><br/>
            <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
            <input type="submit" name="login" id="login">
        </form>
    <div ></div>
    <div>Se non sei registrato, <a href="./new.php">clicca qui per farlo</a></div>
    <div></div>
    <div><h6><?= $this->e($msg)?></h6></div>
    
    <?php $this->start('js') ?>
    <script src="https://www.google.com/recaptcha/api.js?render=6Le696wUAAAAAMy2hNmW5v3ykH1X3GM0emfjeKiW"></script>
    <script src="../scriptcaptcha.js"></script>
    <?php $this->end('js') ?>