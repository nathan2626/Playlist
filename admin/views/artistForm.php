<?php if(isset($_SESSION['messages'])): ?>
    <div class="d-flex justify-content-center mt-2">
		<?php foreach($_SESSION['messages'] as $message): ?>
			<?= $message ?><br>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<div class="d-flex justify-content-center mt-4 flex-column align-items-center">
    <h2 class="mb-3">Ici formulaire de l'artiste</h2>

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
            <option value="<?= $label['id']?>"
                    <?php if(isset($artist) && $artist['label_id'] == $label['id']): ?>
                    selected="selected"
                    <?php endif; ?>
            ><?= $label['name']?></option>
        <?php endforeach; ?>
    </select><br>
	
	<label for="biography">Bio :</label>
	<textarea name="biography" id="biography">
        <?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['biography'] : '' ?>
        <?= isset($artist) ? $artist['biography'] : '' ?>
    </textarea><br>

	<label for="image">Image :</label>
	<input type="file" name="image" id="image" /><br>

    <input type="submit" value="Enregistrer" class="p-2 border-0 mb-2 bg-success text-white" />

</form>
</div>
