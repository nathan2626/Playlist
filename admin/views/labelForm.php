<?php require ('partials/header.php'); ?>
<?php require ('partials/menu.php'); ?>

<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

ici formulaire du label<br><br>

- nom (champ text)<br>

<form action="index.php?controller=labels&action=
<?= isset($label) || (isset($_SESSION['old_inputs']) && $_GET['action'] != 'new') ?
    'edit&id='. $_GET['id'] : 'add' ?>
" method="post" enctype="multipart/form-data">

    <label for="name">Nom :</label>
    <input  type="text" name="name" id="name" value="
        <?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?>
        <?= isset($label) ? $label['name'] : '' ?>
    " /><br>

    <input type="submit" value="Enregistrer" />

</form>