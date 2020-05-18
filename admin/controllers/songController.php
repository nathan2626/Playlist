<?php

require('models/Song.php');
require('models/Artist.php');
require('models/Album.php');


if($_GET['action'] == 'list'){
    $songs = getAllSongs();
    //	require('views/songList.php'); ancienne façon
    $view = 'views/songList.php';
    $pageTitle = 'Gestion des chansons';
    $pageDescription = '';
}
elseif($_GET['action'] == 'new'){
    $artists = getAllArtists();
    $albums = getAllAlbums();
    //	require('views/songForm.php'); ancienne façon
    $view = 'views/songForm.php';
    $pageTitle = 'Ajouter une chanson';
    $pageDescription = '';
}
elseif($_GET['action'] == 'add'){

    if(empty($_POST['title']) || empty($_POST['artist_id']) || empty($_POST['album_id'])){

        if(empty($_POST['title'])){
            $_SESSION['messages'][] = 'Le champ titre est obligatoire !';
        }
        if(empty($_POST['artist_id'])){
            $_SESSION['messages'][] = 'Le champ artiste est obligatoire !';
        }
        if(empty($_POST['album_id'])){
            $_SESSION['messages'][] = 'Le champ album est obligatoire !';
        }

        $_SESSION['old_inputs'] = $_POST;
        header('Location:index.php?controller=songs&action=new');
        exit;
    }
    else{
        $resultAdd = addSong($_POST);
        if($resultAdd){
            $_SESSION['messages'][] = 'Chanson enregistré !';
        }
        else{
            $_SESSION['messages'][] = "Erreur lors de l'enregistreent de la chanson... :(";
        }
        header('Location:index.php?controller=songs&action=list');
        exit;
    }
}
elseif($_GET['action'] == 'edit'){
    //ici aller chercher les infos de l'artiste pour pré-remplissage du formulaire
    if(!empty($_POST)){
        //vérifier a nouveau les champs obligatoires
        if(empty($_POST['title']) || empty($_POST['artist_id']) || empty($_POST['album_id'])){

            if(empty($_POST['title'])){
                $_SESSION['messages'][] = 'Le champ titre est obligatoire !';
            }
            if(empty($_POST['artist_id'])){
                $_SESSION['messages'][] = 'Le champ artiste est obligatoire !';
            }
            if(empty($_POST['album_id'])){
                $_SESSION['messages'][] = 'Le champ album est obligatoire !';
            }

            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=songs&action=edit&id='.$_GET['id']);
            exit;
        }
        else {
            $result = updateSong($_GET['id'], $_POST);
            if ($result) {
                $_SESSION['messages'][] = 'Chanson mis à jour !';
            } else {
                $_SESSION['messages'][] = 'Erreur lors de la mise à jour... :(';
            }
            header('Location:index.php?controller=songs&action=list');
            exit;
        }
    }
    else{
        if(!isset($_SESSION['old_inputs'])){
            if(isset($_GET['id'])){
                $artist = getSong($_GET['id']);
                if($artist == false){
                    header('Location:index.php?controller=songs&action=list');
                    exit;
                }
            }
            else {
                header('Location:index.php?controller=songs&action=list');
                exit;
            }
        }
        $artists = getAllArtists();
        $albums = getAllAlbums();
        //	require('views/songForm.php'); ancienne façon
        $view = 'views/songForm.php';
        $pageTitle = 'Modifier une chanson';
        $pageDescription = '';
    }
}
elseif($_GET['action'] == 'delete'){
    if(isset($_GET['id'])) {
        $result = deleteSong($_GET['id']);
    }
    else {
        $_SESSION['messages'][] = 'Max... arrête de toucher mes Urls stp';
        header('Location:index.php?controller=artists&action=list');
        exit;
    }
    if($result){
        $_SESSION['messages'][] = 'Chanson supprimé !';
    }
    else{
        $_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
    }
    header('Location:index.php?controller=songs&action=list');
    exit;
}

