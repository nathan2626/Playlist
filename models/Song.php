<?php

function getSongs($albumId = null)
{


    $db = dbConnect();

    if ($albumId != false) {

        $query = $db->prepare('SELECT * FROM songs WHERE album_id = ?');

        $result = $query->execute([$albumId]);

        $songs = $query->fetchAll();

    } else {
        $query = $db->query('SELECT * FROM songs');
        $songs = $query->fetchAll();
    }


    return $songs;
}


function getSong($id)
{

    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM songs WHERE id = ?');

    $result = $query->execute([$id]);

    if ($result) {
        return $query->fetch();
    } else {
        return false;
    }

}

function getSongJoinInformations($id)
{

    $db = dbConnect();

    $query = $db->prepare('
    SELECT *, ar.name AS artist_name, ar.id AS artist_id,  al.name AS album_name,  al.id AS album_id
    FROM songs s
    INNER JOIN artists ar
    ON s.artist_id = ar.id
    INNER JOIN albums al 
    ON s.album_id = al.id
    ');

    $result = $query->execute([$id]);

    if ($result) {
        return $query->fetch();
    } else {
        return false;
    }

}