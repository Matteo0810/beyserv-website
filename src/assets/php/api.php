<?php

    /**
     * @global $db return the global $db
     * @return $count, $staff
     */

    require ('class/GETProfil.php');
    use App\Classes\GETProfil as GETProfil;

    function getProfils() {
        global $db;
        $req = $db->prepare('SELECT * FROM profils');
        $req->execute();
        $count = $req->rowCount();
        return $count;
    }

    function getProfilByName($name) {
        $profil = new GETProfil($name);
        return $profil->getProfilInfos();
    }

    function getIfPlayerIsBan($name) {
        global $db;
        $req = $db->prepare('SELECT * FROM ss_ban WHERE pseudo = :pseudo LIMIT 1');
        $req->execute(array('pseudo' => $name));
        $result = $req->fetchAll();
        return $result;
    }

    function getStaff() {
        global $db;
        $req = $db->prepare('SELECT pseudo,prefix FROM profils WHERE lvl_mod >= 1 AND lvl_mod <= 6 OR lvl_vip = 5');
        $req->execute();
        $result = $req->fetchAll();
        return utf8_converter($result);
    }

    function utf8_converter($array) {
        array_walk_recursive($array, function (&$item, $key) {
            if (!mb_detect_encoding($item, 'utf-8', true)) {
                $item = utf8_encode($item);
            }
        });

        return $array;
    }

    function getArticles() {
        global $db;
        $req = $db->prepare('SELECT * FROM articles ORDER BY published_date DESC');
        $req->execute();
        $result = $req->fetchAll();
        return utf8_converter($result);
    }

    function getArticle($id) {
        global $db;
        $req = $db->prepare('SELECT * FROM articles WHERE id = :id');
        $req->execute(array(':id' => $id));
        $result = $req->fetchAll();
        return utf8_converter($result);
    }

    //Player's games
    function getBeyRushStats($name) {
        global $db;
        $req = $db->prepare("SELECT * FROM beyrush WHERE pseudo = :pseudo LIMIT 1");
        $req->execute(array(':pseudo' => $name));
        $stats = $req->fetchAll();
        return utf8_converter($stats);
    }
    function getHoneyRushStats($name) {
        global $db;
        $req = $db->prepare("SELECT * FROM honeyrush WHERE pseudo = :pseudo LIMIT 1");
        $req->execute(array(':pseudo' => $name));
        $stats = $req->fetchAll();
        return utf8_converter($stats);
    }
    function getRushTheFlagStats($name) {
        global $db;
        $req = $db->prepare("SELECT * FROM rushtheflag WHERE pseudo = :pseudo LIMIT 1");
        $req->execute(array(':pseudo' => $name));
        $stats = $req->fetchAll();
        return utf8_converter($stats);
    }
    function getBrainFFAStats($name) {
        global $db;
        $req = $db->prepare("SELECT * FROM brainffa WHERE pseudo = :pseudo LIMIT 1");
        $req->execute(array(':pseudo' => $name));
        $stats = $req->fetchAll();
        return utf8_converter($stats);
    }
    function getFFARushStats($name) {
        global $db;
        $req = $db->prepare("SELECT * FROM ffarush WHERE pseudo = :pseudo LIMIT 1");
        $req->execute(array(':pseudo' => $name));
        $stats = $req->fetchAll();
        return utf8_converter($stats);
    }
    function getFlowerRushStats($name) {
        global $db;
        $req = $db->prepare("SELECT * FROM flowersrush WHERE pseudo = :pseudo LIMIT 1");
        $req->execute(array(':pseudo' => $name));
        $stats = $req->fetchAll();
        return utf8_converter($stats);
    }


    //LeaderBoard
    function getBeyRushClassement() {
        global $db;
        $req = $db->prepare("SELECT * FROM beyrush ORDER BY victoires DESC, kills DESC LIMIT 10");
        $req->execute();
        $stats = $req->fetchAll();
        return $stats;
    }
    function getBrainFFAClassement() {
        global $db;
        $req = $db->prepare("SELECT * FROM brainffa ORDER BY kills DESC LIMIT 10");
        $req->execute();
        $stats = $req->fetchAll();
        return $stats;
    }
    function getHoneyRushClassement() {
        global $db;
        $req = $db->prepare("SELECT * FROM honeyrush ORDER BY victoires DESC, kills DESC LIMIT 10");
        $req->execute();
        $stats = $req->fetchAll();
        return $stats;
    }
    function getRushTheFlagClassement() {
        global $db;
        $req = $db->prepare("SELECT * FROM rushtheflag ORDER BY victoires DESC, kills DESC LIMIT 10");
        $req->execute();
        $stats = $req->fetchAll();
        return $stats;
    }
    function getFFARushClassement() {
        global $db;
        $req = $db->prepare("SELECT * FROM ffarush ORDER BY kills DESC LIMIT 10");
        $req->execute();
        $stats = $req->fetchAll();
        return $stats;
    }
    function getFlowerRushClassement() {
        global $db;
        $req = $db->prepare("SELECT * FROM flowersrush ORDER BY kills DESC LIMIT 10");
        $req->execute();
        $stats = $req->fetchAll();
        return $stats;
    }

    //Stats
    function getStatsChart() {
        global $db;
        $req = $db->prepare("SELECT * FROM web_stat");
        $req->execute();
        $stats = $req->fetchAll();
        return $stats;
    }