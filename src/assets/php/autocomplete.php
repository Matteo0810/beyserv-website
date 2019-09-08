<?php

    include 'BDD.php';

    $term = $_GET['term'];
    $req = $db->prepare('SELECT * FROM profils WHERE pseudo LIKE :term LIMIT 5');
    $req->execute(array('term' => '%'.$term.'%'));

    $array = array();

    while($donnee = $req->fetch()) {
        array_push($array, $donnee['pseudo']);
    }

    echo json_encode($array);