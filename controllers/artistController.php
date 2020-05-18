<?php

if(!isset($_GET['artist_id']) || !ctype_digit($_GET['artist_id'])){
  header('Location:index.php');
  exit;
}

require_once 'models/Album.php';
require_once 'models/Artist.php';
require_once 'models/Song.php';
require_once 'models/Label.php';

$artist = getArtist($_GET['artist_id']);

if($artist == false){
  header('Location:index.php');
  exit;
}

$albums = getAlbums($artist['id']);

$view = 'views/artist.php';
$pageTitle = "Informations sur un l'artiste ";
$pageDescription = '';