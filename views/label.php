ici vue d'un label


nous affiche le nom du label
et les artistes liés

nom du label:<?= $label['name'] ?>

<br><br>

Liste des artistes liés au label :
<?php foreach ($artists as $artist): ?>
    <a href="index.php?p=artist&id=<?= $artist['id'];?>">
        <?= $artist['name'];?>
    </a><br>
<?php endforeach; ?>
