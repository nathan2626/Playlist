<?php

require("models/Label.php");
require("models/Artist.php");

if(isset($_GET['id'])){
    $label = getLabel($_GET['id']);

    if($label == false) {
        header('Location:index.php');
        exit;
    }

    //aller chercher les artistes liés au label pour affichage dans la vue
    $artists = getAllArtists($label['id']);


    include('views/label.php');
}
else {
    $labels = getAllLabels();
}

include('views/label.php');


