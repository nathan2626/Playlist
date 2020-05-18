<a href="index.php">retour à l'index</a>
<p>Nom du label : <?= $label['name'] ?></p>


<p>Liste des artistes liés au label : </p>

<?php if(sizeof($artists) > 0): ?>
    <ul>
        <?php foreach($artists as $artist): ?>
            <li><a href="index.php?p=artist&artist_id=<?= $artist['id'] ?>"><?= $artist['name'] ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>aucun artiste pour ce label</p>
<?php endif; ?>