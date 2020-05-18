<?php

require('models/Album.php');
require('models/Artist.php');


if($_GET['action'] == 'list'){
    $albums = getAllAlbums();
    //	require('views/albumList.php'); ancienne façon
    $view = 'views/albumList.php';
    $pageTitle = 'Gestion des albums';
    $pageDescription = '';

}
elseif($_GET['action'] == 'new'){
    $artists = getAllArtists();
//	require('views/albumForm.php'); ancienne façon
    $view = 'views/albumForm.php';
    $pageTitle = 'Ajouter un album';
    $pageDescription = '';
}
elseif($_GET['action'] == 'add'){

    if(empty($_POST['name']) || empty($_POST['artist_id']) || empty($_POST['year'])){

        if(empty($_POST['name'])){
            $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
        }
        if(empty($_POST['artist_id'])){
            $_SESSION['messages'][] = 'Le champ artiste est obligatoire !';
        }
        if(empty($_POST['year'])){
            $_SESSION['messages'][] = 'Le champ année est obligatoire !';
        }

        $_SESSION['old_inputs'] = $_POST;
        header('Location:index.php?controller=albums&action=new');
        exit;
    }
    else{
        $resultAdd = addAlbum($_POST);
        if($resultAdd){
            $_SESSION['messages'][] = 'Album enregistré !';
        }
        else{
            $_SESSION['messages'][] = "Erreur lors de l'enregistreent de l'album... :(";
        }
        header('Location:index.php?controller=albums&action=list');
        exit;
    }
}
elseif($_GET['action'] == 'edit'){
    //ici aller chercher les infos de l'album pour pré-remplissage du formulaire
    if(!empty($_POST)){
        //vérifier a nouveau les champs obligatoires
        if(empty($_POST['name']) || empty($_POST['artist_id']) || empty($_POST['year'])){

            if(empty($_POST['name'])){
                $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
            }
            if(empty($_POST['artist_id'])){
                $_SESSION['messages'][] = 'Le champ artiste est obligatoire !';
            }
            if(empty($_POST['year'])){
                $_SESSION['messages'][] = 'Le champ année est obligatoire !';
            }

            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=albums&action=edit&id='.$_GET['id']);
            exit;
        }
        else {
            $result = updateAlbum($_GET['id'], $_POST);
            if ($result) {
                $_SESSION['messages'][] = 'Album mis à jour !';
            } else {
                $_SESSION['messages'][] = 'Erreur lors de la mise à jour... :(';
            }
            header('Location:index.php?controller=albums&action=list');
            exit;
        }
    }
    else{
        if(!isset($_SESSION['old_inputs'])){
            if(isset($_GET['id'])){
                $album = getAlbum($_GET['id']);
                if($album == false){
                    header('Location:index.php?controller=albums&action=list');
                    exit;
                }
            }
            else {
                header('Location:index.php?controller=albums&action=list');
                exit;
            }
        }
        $artists = getAllArtists();
//	require('views/albumForm.php'); ancienne façon
        $view = 'views/albumForm.php';
        $pageTitle = 'Modifier un album';
        $pageDescription = '';
    }
}
elseif($_GET['action'] == 'delete'){
    if(isset($_GET['id'])) {
        $result = deleteAlbum($_GET['id']);
    }
    else {
        $_SESSION['messages'][] = 'Max... arrête de toucher mes Urls stp';
        header('Location:index.php?controller=albums&action=list');
        exit;
    }
    if($result){
        $_SESSION['messages'][] = 'Album supprimé !';
    }
    else{
        $_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
    }
    header('Location:index.php?controller=albums&action=list');
    exit;
}