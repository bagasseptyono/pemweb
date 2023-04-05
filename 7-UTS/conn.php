<?php

function connection(){
    $dbServer = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'transupn';

    $conn = mysqli_connect($dbServer, $dbUsername, $dbPassword);

    if(! $conn){
        die('Koneksi gagal : '. mysqli_connect_error());
    }

    mysqli_select_db($conn,$dbName);

    return $conn;
}
?>