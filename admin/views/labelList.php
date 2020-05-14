<?php require ('partials/header.php'); ?>
<?php require ('partials/menu.php'); ?>

<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

    <h2>ici la liste complète des labels : </h2>
    <h3><a href="index.php?controller=labels&action=new">Ajouter un label</a></h3>

<?php foreach($labels as $label): ?>
    <p>
        <?=  htmlspecialchars($label['name']) ?>
        <a href="index.php?controller=labels&action=delete&id=
        <?= $label['id'] ?>">
            supprimer
        </a>
        <a href="index.php?controller=labels&action=edit&id=
        <?= $label['id'] ?>">
            modifier
        </a>
    </p>
<?php endforeach; ?>