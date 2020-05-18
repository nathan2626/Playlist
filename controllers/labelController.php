<?php

if(!isset($_GET['label_id']) || !ctype_digit($_GET['label_id'])){
    header('Location:index.php');
    exit;
}

require_once 'models/Album.php';
require_once 'models/Artist.php';
require_once 'models/Label.php';

    $label = getLabel($_GET['label_id']);

    if($label == false) {
        header('Location:index.php');
        exit;
    }

$artists = getArtists($label['id']);


$view = 'views/label.php';
$pageTitle = 'Informations sur le label';
$pageDescription = '';