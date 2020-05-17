<?php require ('partials/doctype.php'); ?>

<?php require ('partials/header.php'); ?>

<div class="d-flex justify-content-center flex-column align-items-center mt-4">
    <h1 class="mb-4">tableau de bord de l'admin</h1>
    <p><a class="" href="index.php?controller=artists&action=list">Gestion des artistes</a></p>
    <p><a class="" href="index.php?controller=albums&action=list">Gestion des albums</a></p>
    <p><a class="" href="index.php?controller=labels&action=list">Gestion des labels</a></p>
    <p><a class="" href="index.php?controller=songs&action=list">Gestion des chansons</a></p>
</div>


<?php require ('partials/end-doctype.php'); ?>
