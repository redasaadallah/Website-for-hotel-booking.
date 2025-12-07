<?php

    // Connection à la base de données 'gestionhotels'
    try {
        $db = new PDO(
            'mysql:host=localhost;dbname=gestionhotels;charset=utf8',
            'root'
        );
    }
    catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

?>