<?php

    $pseudo = $_GET['pseudo'];
    include '../php/BDD.php';
    $req = $db->prepare("SELECT date_fin FROM ss_ban WHERE pseudo = :pseudo LIMIT 1");
    $req->execute(array(':pseudo' => $pseudo));
    $profil = $req->fetchAll();

    echo json_encode(utf8_converter($profil));

    function utf8_converter($array) {
        array_walk_recursive($array, function (&$item, $key) {
            if (!mb_detect_encoding($item, 'utf-8', true)) {
                $item = utf8_encode($item);
            }
        });
    return $array;
    }