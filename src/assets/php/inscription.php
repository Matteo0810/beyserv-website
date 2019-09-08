<?php

    $pseudo = $_GET['pseudo'];
    require("utils/bungeecord.php");
    $host = '127.0.0.1'; $password = 'Q9AKwgz8z7uL9B5'; $port = 9001;
    $wsr = new BungeeCord($host,$password,$port);
    if($wsr->connect()){
        $wsr->sendCommand("sync console bungee bungeewhitelist " . $pseudo);
        echo '<span class="register_sucess">Votre compte '. $pseudo.' a bien été whitelist ! </span>';
    }else{
        echo '<span class="register_error">Une erreur a eu lieu lors de la demande de whitelist</span>';
    }