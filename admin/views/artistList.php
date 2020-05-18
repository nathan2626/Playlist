<h2 class="d-flex justify-content-center mt-5">Ici la liste complète des artistes : </h2>
<h3 class="d-flex justify-content-center mt-3"><a href="index.php?controller=artists&action=new">Ajouter un artiste </a></h3>

<?php if(isset($_SESSION['messages'])): ?>
    <div class="d-flex justify-content-center mt-2">
		<?php foreach($_SESSION['messages'] as $message): ?>
			<?= $message ?>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<?php foreach($artists as $artist): ?>
    <p class="d-flex justify-content-center m-4">
        <?=  htmlspecialchars($artist['name']) ?>
        <a href="index.php?controller=artists&action=delete&id=
        <?= $artist['id'] ?>" class="ml-2 text-danger">
            supprimer
        </a>
        <a href="index.php?controller=artists&action=edit&id=
        <?= $artist['id'] ?>" class="ml-2 text-warning">
            modifier
        </a>
    </p>
<?php endforeach; ?>