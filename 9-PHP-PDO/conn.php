<?php

    $dbServer = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'classicmodels';

    

    try {
        $conn = new PDO("mysql:host=$dbServer;dbname=$dbName",$dbUsername,$dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $err) {
        echo "failed connect to Database Server";
    }
?>