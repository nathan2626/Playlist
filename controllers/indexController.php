<?php

require_once 'models/Album.php';
require_once 'models/Artist.php';
require_once 'models/Song.php';
require_once 'models/Label.php';



$songs = getSongs();

//include 'views/index.php'; ancienne façcon
$view = 'views/index.php';
$pageTitle = 'Playlist';
$pageDescription = '';
