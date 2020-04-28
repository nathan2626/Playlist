<?php

function getAllLabels()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM labels');
    $labels =  $query->fetchAll();

    return $labels;
}