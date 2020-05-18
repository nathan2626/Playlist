<?php

if(!isset($_GET['song_id']) || !ctype_digit($_GET['song_id'])){
  header('Location:index.php');
  exit;
}

require_once 'models/Album.php';
require_once 'models/Artist.php';
require_once 'models/Song.php';
require_once 'models/Label.php';


$song = getSong($_GET['song_id']);

if($song == false){
  header('Location:index.php');
  exit;
}

$view = 'views/song.php';
$pageTitle = 'Informations sur la chanson';
$pageDescription = '';