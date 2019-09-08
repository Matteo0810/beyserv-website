<?php

    require('../class/Articles.php');
    use App\Classes\Articles as Article;
    setlocale(LC_TIME, "fr_FR");

    $title = $_GET['title'];
    $content = $_GET['content'];
    $author = $_GET['author'];
    $file = $_FILES['doc'];

    $date = strtotime("now");
    $tmp_name = $file["tmp_name"];
    $name = basename($file["name"]);
    move_uploaded_file($tmp_name, __DIR__ . '/../../img/upload/' . $name);
    $docpath = "src/assets/img/upload/" . $name;

    $array = array (
        'title' => $title,
        'content' => $content,
        'author' => $author,
        'date' => $date,
        'img' => $docpath,
    );

    $article = new Article($array);
    $article->POSTArticle();