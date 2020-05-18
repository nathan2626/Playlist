<?php if(isset($_SESSION['messages'])): ?>
    <div class="d-flex justify-content-center mt-2">
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-center mt-4 flex-column align-items-center">
    <h2 class="mb-3">Ici formulaire du label</h2>

<form action="index.php?controller=labels&action=<?= isset($label) || (isset($_SESSION['old_inputs']) && $_GET['action'] != 'new') ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

    <label for="name">Nom :</label>
    <input  type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($label) ? $label['name'] : '' ?>" /><br>

    <input type="submit" value="Enregistrer" class="p-2 border-0 mb-2 bg-success text-white" />

</form>
</div>