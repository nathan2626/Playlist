<?php require ('partials/header.php'); ?>

<?php require ('partials/menu.php'); ?>

<?php if(isset($_SESSION['messages'])): ?>
	<div>
		<?php foreach($_SESSION['messages'] as $message): ?>
			<?= $message ?><br>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

ici formulaire de l'artiste<br><br>

- nom (champ text)<br>
- bio (champ textarea)<br>
- image (champ file)<br><br>

<form action="index.php?controller=artists&action=
<?= isset($artist) || (isset($_SESSION['old_inputs']) && $_GET['action'] != 'new') ?
    'edit&id='. $_GET['id'] : 'add' ?>
" method="post" enctype="multipart/form-data">

	<label for="name">Nom :</label>
	<input  type="text" name="name" id="name" value="
        <?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?>
        <?= isset($artist) ? $artist['name'] : '' ?>
    " /><br>
	
	<label for="label_id">Label :</label>
    <select name="label_id" id="pet-label_id">
        <?php foreach ($labels as $label): ?>
            <option value="<?= $label['id']?>"><?= $label['name']?></option>
        <?php endforeach; ?>
    </select><br>

<!--	<input  type="text" name="label" id="label" value="-->
<!--        --><?//= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['label'] : '' ?>
<!--        --><?//= isset($artist) ? $artist['label'] : '' ?>
<!--    " /><br>-->
	
	<label for="biography">Bio :</label>
	<textarea name="biography" id="biography">
        <?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['biography'] : '' ?>
        <?= isset($artist) ? $artist['biography'] : '' ?>
    </textarea><br>

	<label for="image">image :</label>
	<input type="file" name="image" id="image" /><br>
	
	<input type="submit" value="Enregistrer" />

</form>