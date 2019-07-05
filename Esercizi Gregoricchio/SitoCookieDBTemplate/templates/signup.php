<?php $this->layout('layout', ['title' => 'Register']) ?>

    <form action="register.php" method="POST" name="signup">
            <input type="email" name="mail"><br/>
            <input type="password" name="pwd"><br/>
            <input type="submit" name="signup">
    </form>
    <h6><?= $this->e($msg)?></h6>
</body>
</html>