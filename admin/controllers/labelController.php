<?php

require('models/Label.php');
require('models/Artist.php');
require('models/Album.php');



if($_GET['action'] == 'list'){
    $labels = getAllLabels();
    $view = 'views/labelList.php';
    $pageTitle = 'Gestion des labels';
    $pageDescription = '';
}
elseif($_GET['action'] == 'new'){
    $labels = getAllLabels();
    $view = 'views/labelForm.php';
    $pageTitle = 'Ajouter un label';
    $pageDescription = '';
}
elseif($_GET['action'] == 'add'){

    if(empty($_POST['name'])){

        if(empty($_POST['name'])){
            $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
        }

        $_SESSION['old_inputs'] = $_POST;
        header('Location:index.php?controller=labels&action=new');
        exit;
    }
    else{
        $resultAdd = addLabel($_POST);
        if($resultAdd){
            $_SESSION['messages'][] = 'Label enregistré !';
        }
        else{
            $_SESSION['messages'][] = "Erreur lors de l'enregistreent du label... :(";
        }
        header('Location:index.php?controller=labels&action=list');
        exit;
    }
}
elseif($_GET['action'] == 'edit'){
    if(!empty($_POST)){
        if(empty($_POST['name'])){

            if(empty($_POST['name'])){
                $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
            }

            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=labels&action=edit&id='.$_GET['id']);
            exit;
        }
        else {
            $result = updateLabel($_GET['id'], $_POST);
            if ($result) {
                $_SESSION['messages'][] = 'Label mis à jour !';
            } else {
                $_SESSION['messages'][] = 'Erreur lors de la mise à jour... :(';
            }
            header('Location:index.php?controller=labels&action=list');
            exit;
        }
    }
    else{
        if(!isset($_SESSION['old_inputs'])){
            if(isset($_GET['id'])){
                $label = getLabel($_GET['id']);
                if($label == false){
                    header('Location:index.php?controller=labels&action=list');
                    exit;
                }
            }
            else {
                header('Location:index.php?controller=labels&action=list');
                exit;
            }
        }
        $labels = getAllLabels();
        $view = 'views/labelForm.php';
        $pageTitle = 'Modifier un label';
        $pageDescription = '';
    }
}
elseif($_GET['action'] == 'delete'){
    if(isset($_GET['id'])) {
        $result = deleteLabel($_GET['id']);
    }
    else {
        $_SESSION['messages'][] = 'Max... arrête de toucher mes Urls stp';
        header('Location:index.php?controller=labels&action=list');
        exit;
    }
    if($result){
        $_SESSION['messages'][] = 'Label supprimé !';
    }
    else{
        $_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
    }
    header('Location:index.php?controller=labels&action=list');
    exit;
}

