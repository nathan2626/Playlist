<?php

if(!isset($_GET['album_id']) || !ctype_digit($_GET['album_id'])){
  header('Location:index.php');
  exit;
}

require_once 'models/Album.php';
require_once 'models/Artist.php';
require_once 'models/Song.php';
require_once 'models/Label.php';

$album = getAlbum($_GET['album_id']);

if($album == false){
  header('Location:index.php');
  exit;
}

$artist = getArtist($album['artist_id']);

$songs = getSongs($album['id']);

include 'views/album.php';
