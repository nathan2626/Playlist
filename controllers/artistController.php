<?php 

require('models/Artist.php');

if($_GET['action'] == 'list'){
	$artists = getAllArtists();
	require('views/artistList.php');
}
elseif($_GET['action'] == 'new'){
	require('views/artistForm.php');
}
elseif($_GET['action'] == 'add'){
	
	if(empty($_POST['name']) || empty($_POST['label'])){
		
		if(empty($_POST['name'])){
			$_SESSION['messages'][] = 'Le champ nom est obligatoire !';
		}
		if(empty($_POST['label'])){
			$_SESSION['messages'][] = 'Le champ label est obligatoire !';
		}
		
		$_SESSION['old_inputs'] = $_POST;
		header('Location:index.php?controller=artists&action=new');
		exit;
	}
	else{
		$resultAdd = add($_POST);
		if($resultAdd){
			$_SESSION['messages'][] = 'Artiste enregistré !';
		}
		else{
			$_SESSION['messages'][] = "Erreur lors de l'enregistreent de l'artiste... :(";
		}
		header('Location:index.php?controller=artists&action=list');
		exit;
	}
}
elseif($_GET['action'] == 'edit'){
    //ici aller chercher les infos de l'artiste pour pré-remplissage du formulaire
    if(!empty($_POST)){
        //le formulaire à été envoyé => UPDATE
        $result = update($_GET['id'], $_POST);
        if($result){
            $_SESSION['messages'][] = 'Erreur lors de la mise à jour...:(';
        }
        else {
            $_SESSION['messages'][] = 'Artiste mis à jour...:)';
        }
    }
    else{
        $artist = getArtist($_GET['id']);
        require('views/artistForm.php');
    }
}
elseif($_GET['action'] == 'delete'){
	$result = delete(   $_GET['id']    );
	if($result){
		$_SESSION['messages'][] = 'Artiste supprimé !';
	}
	else{
		$_SESSION['messages'][] = 'Erreur lors de la suppression... :(';
	}
	header('Location:index.php?controller=artists&action=list');
	exit;
}

