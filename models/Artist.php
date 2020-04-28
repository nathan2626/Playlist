<?php

function getAllArtists()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM artists');
	$artists =  $query->fetchAll();

    return $artists;
}

function add($informations)
{
	$db = dbConnect();
	
	$query = $db->prepare("INSERT INTO artists (name, biography, label) VALUES( :name, :biography, :label)");
	$result = $query->execute([
		'name' => $informations['name'],
		'biography' => $informations['biography'],
        'label' => $informations['label'],
    ]);

	if($result){
		$artistId = $db->lastInsertId();
		
		$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
		$my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
		if (in_array($my_file_extension , $allowed_extensions)){
			$new_file_name = $artistId . '.' . $my_file_extension ;
			$destination = '../assets/images/artist/' . $new_file_name;
			$result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);
			
			$db->query("UPDATE artists SET image = '$new_file_name' WHERE id = $artistId");
		}
	}
	
	return $result;
}

function delete($id)
{
	$db = dbConnect();
	
	//ne pas oublier de supprimer le fichier lié s'il y en un
	//avec la fonction unlink de PHP
	
	$query = $db->prepare('DELETE FROM artists WHERE id = ?');
	$result = $query->execute([$id]);
	
	return $result;
}

function getArtist($id)
{
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM artists WHERE id = ?");
    $query->execute([
        $id
    ]);

    $result =  $query->fetch();

    return $result;
}

function update($id, $informations)
{
    $db = dbConnect();

    $query = $db->prepare("UPDATE artists SET name = ?, biography = ?, label = ? WHERE id = ?");
    $result = $query->execute([
        $informations['name'],
        $informations['biography'],
        $informations['label'],
        $id
    ]);

    return $result;
}