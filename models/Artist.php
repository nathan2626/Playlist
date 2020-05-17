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