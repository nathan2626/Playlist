<h2 class="d-flex justify-content-center mt-5">Ici la liste complète des albums : </h2>
<h3 class="d-flex justify-content-center mt-3"><a href="index.php?controller=albums&action=new">Ajouter un album</a></h3>

<?php if(isset($_SESSION['messages'])): ?>
    <div class="d-flex justify-content-center mt-2">
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php foreach($albums as $album): ?>
    <p class="d-flex justify-content-center m-4">
        <?=  htmlspecialchars($album['name']) ?>
        <a href="index.php?controller=albums&action=delete&id=
        <?= $album['id'] ?>" class="ml-2 text-danger">
            supprimer
        </a>
        <a href="index.php?controller=albums&action=edit&id=
        <?= $album['id'] ?>" class="ml-2 text-warning">
            modifier
        </a>
    </p>
<?php endforeach; ?>

