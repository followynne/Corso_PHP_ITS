<?php $this->layout('Home');?>

<h1> Ciao! </h1>
<div>

<?php foreach($data as $el): ?>

    <div>
      <h2><?= $this->e($el['name'])?></h2>
      <a href="./article.php?id=<?= $this->e($el['id'])?>" target="_blank"><div><?= substr($this->e($el['content']), 0, 50)?><div></a>
    </div>
<?php endforeach ?>
</div>
