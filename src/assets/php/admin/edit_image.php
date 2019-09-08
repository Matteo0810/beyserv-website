<?php

    $dossier = __DIR__ . '/../../img/upload/';
    if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier.$_FILES['file']['name'])) {
        echo "http://localhost/src/assets/img/upload/" . $_FILES['file']['name'];
    }
         