<?php

function getAllArtists() {
    $db = dbConnect();

    $query = $db->query('SELECT * FROM artists');
    $artists = $query->fetchAll();

    return $artists;
}

function getArtist($id) {
    $db = dbConnect();

    $query = $db ->prepare('SELECT * FROM artists WHERE id = ?');
    $query ->execute([
        $id
    ]);

    $result = $query->fetch();

    return $result;
}

function getArtists($labelId = null)
{


    $db = dbConnect();

    if ($labelId != false) {

        $query = $db->prepare('SELECT * FROM artists WHERE label_id = ?');

        $result = $query->execute([$labelId]);

        $artists = $query->fetchAll();

    } else {
        $query = $db->query('SELECT * FROM artists');
        $artists = $query->fetchAll();
    }


    return $artists;
}