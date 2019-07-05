<?php $this->layout('layout', ['title' => 'Logged']) ?>

<h1>Benvenuto<?= $this->e($mail)?>!</h1>
<div></div>
<a href = "logout.php"><input type="button" value="Log Out" name="logout"/></a>
