<?php

// db.php
// This file contains the database connection details and functions to interact with the database.

// Database connection details

//$pdo = new PDO('mysql:host=localhost;dbname=management', 'root', '');

// connection a la base de donnee

  //  $pdo = new PDO('mysql:host=localhost,port = 3307;dbname=management', 'samson', '');
    try {
        $pdo = new PDO('mysql:host=localhost;port=3307;dbname=management', 'samson', '');
    } catch (PDOException $e) {
        echo 'Connexion  chou e : ' . $e->getMessage();
    }
?>