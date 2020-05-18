<?php if(isset($_SESSION['messages'])): ?>
    <div class="d-flex justify-content-center mt-2">
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-center mt-4 flex-column align-items-center">
    <h2 class="mb-3">Ici formulaire de l'album</h2>

<form action="index.php?controller=albums&action=<?= isset($album) || (isset($_SESSION['old_inputs']) && $_GET['action'] != 'new') ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

    <label for="name">Nom :</label>
    <input  type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($album) ? $album['name'] : '' ?>" /><br>

    <label for="year">Année :</label>
    <input  type="number" name="year" id="year" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['year'] : '' ?><?= isset($album) ? $album['year'] : '' ?>" /><br>

    <label for="artist_id">Artiste :</label>
    <select name="artist_id" id="pet-artist_id">
        <?php foreach ($artists as $artist): ?>
            <option value="<?= $artist['id']?>"
                <?php if(isset($album) && $album['artist_id'] == $artist['id']): ?>
                    selected="selected"
                <?php endif; ?>
            ><?= $artist['name']?></option>
        <?php endforeach; ?>
    </select><br>

    <input type="submit" value="Enregistrer" class="p-2 border-0 mb-2 bg-success text-white" />

</form>
</div>
