<?php require ('partials/doctype.php'); ?>

<?php require ('partials/header.php'); ?>

    <h2 class="d-flex justify-content-center mt-5">Ici la liste complète des labels : </h2>
    <h3 class="d-flex justify-content-center mt-3"><a href="index.php?controller=labels&action=new">Ajouter un label</a></h3>

<?php if(isset($_SESSION['messages'])): ?>
    <div class="d-flex justify-content-center mt-2">
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php foreach($labels as $label): ?>
    <p class="d-flex justify-content-center m-4">
        <?=  htmlspecialchars($label['name']) ?>
        <a href="index.php?controller=labels&action=delete&id=
        <?= $label['id'] ?>" class="ml-2 text-danger">
            supprimer
        </a>
        <a href="index.php?controller=labels&action=edit&id=
        <?= $label['id'] ?>" class="ml-2 text-warning">
            modifier
        </a>
    </p>
<?php endforeach; ?>

<?php require ('partials/end-doctype.php'); ?>