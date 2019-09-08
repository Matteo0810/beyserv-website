<?php

    //basics
    session_start();
    require('vendor/autoload.php');
    require_once('vendor/mikecao/flight/flight/Flight.php');
    include 'src/assets/php/BDD.php';
    require('src/assets/php/api.php');

    //twig loader
    $loader = new Twig_Loader_Filesystem(__DIR__.'/src');
    $twigConfig = array(
        'cache' => false,
        'debug' => true,
    );

    //flight register
    Flight::register('view', 'Twig_Environment', array($loader, $twigConfig), function ($twig) {
        $twig->addExtension(new Twig_Extension_Debug());
        $twig->addGlobal('assets', 'src/assets');
    });

    //routes
    Flight::route('/', function () {Flight::view()->display('Home/index.twig', ['inscrits' => getProfils(), 'articles' => getArticles()]);});
    Flight::route('/jeux', function () {Flight::view()->display('Games/index.twig');});
    Flight::route('/stats', function () {Flight::view()->display('Stats/index.twig', ['staffs' => getStaff(), 'chart' => getStatsChart()]);});
    Flight::route('/inscription', function () {Flight::view()->display('Home/inscription.twig');});Flight::route('/inscription', function () {Flight::view()->display('Home/inscription.twig');});
    Flight::route('/articles/@id', function ($id) {Flight::view()->display('Home/articles/article.twig', ['article' => getArticle($id)]);});

    //leaderboard
    Flight::route('/classement/@name', function ($name) {
        switch ($name) {
            case 'BeyRush':
                Flight::view()->display('Classement/beyrush.twig', ['classement' => getBeyRushClassement()]);
                break;
            case 'BrainFFA':
                Flight::view()->display('Classement/brainffa.twig', ['classement' => getBrainFFAClassement()]);
                break;
            case 'HoneyRush':
                Flight::view()->display('Classement/honeyrush.twig', ['classement' => getHoneyRushClassement()]);
            case 'FFARush':
                Flight::view()->display('Classement/ffarush.twig', ['classement' => getFFARushClassement()]);
                break;
            case 'RushTheFlag':
                Flight::view()->display('Classement/rushtheflag.twig', ['classement' => getRushTheFlagClassement()]);
                break;
            case 'FlowerRush':
                Flight::view()->display('Classement/flowerrush.twig', ['classement' => getFlowerRushClassement()]);
                break;
        }
    });

    //player's profil
    Flight::route('/profil/@name', function ($name) {Flight::view()->display('Stats/profil.twig', [
        'player' => getProfilByName($name),
        'beyrush' => getBeyRushStats($name),
        'honyerush' => getHoneyRushStats($name),
        'rushtheflag' => getRushTheFlagStats($name),
        'brainffa' => getBrainFFAStats($name),
        'ffarush' => getFFARushStats($name),
        'flowerrush' => getFlowerRushStats($name),
        'ban' => getIfPlayerIsBan($name),
        ]);});

    //admin panel
    Flight::route('/admin', function () {
        $tokens = require 'src/assets/php/tokens.php';
        if(!isset($_GET['token'])) return Flight::view()->display('Admin/403.twig');
        if($_GET['token'] != $tokens['token']) return Flight::view()->display('Admin/403.twig');
        $password = !empty($_SESSION['password']) ? $_SESSION['password'] : NULL;
        Flight::view()->display('Admin/index.twig', ['password' => $password]);
    });

    //hyper links
    Flight::route('/cgv', function () {Flight::view()->display('Home/links/cgv.twig');});
    Flight::route('/mentions_legales', function () {Flight::view()->display('Home/links/mentions_legales.twig');});

    //errors
    Flight::map('notFound', function () {Flight::view()->display('Home/404.twig');});
    Flight::route('/403', function () {Flight::view()->display('Admin/403.twig');});
    Flight::route('/404.twig', function () {Flight::view()->display('Home/404.twig');});

    //start routes
    Flight::start();