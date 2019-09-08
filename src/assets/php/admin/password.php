<?php

    $password = $_GET['password'];

    if($password == "yzYB83dK4") {
        session_start();
        $_SESSION['password'] = true;
    } else echo '<span class="register_error">Mot de passe incorrect</span>';