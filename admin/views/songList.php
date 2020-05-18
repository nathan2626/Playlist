<?php if(isset($_SESSION['messages'])): ?>
    <div class="d-flex justify-content-center mt-2">
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

    <h2 class="d-flex justify-content-center mt-5">Ici la liste complète des chansons : </h2>
    <h3 class="d-flex justify-content-center mt-3"><a href="index.php?controller=songs&action=new">Ajouter une chanson </a></h3>

<?php foreach($songs as $song): ?>
    <p class="d-flex justify-content-center m-4">
        <?=  htmlspecialchars($song['title']) ?>
        <a href="index.php?controller=songs&action=delete&id=
        <?= $song['id'] ?>" class="ml-2 text-danger">
            supprimer
        </a>
        <a href="index.php?controller=songs&action=edit&id=
        <?= $song['id'] ?>" class="ml-2 text-warning">
            modifier
        </a>
    </p>
<?php endforeach; ?>