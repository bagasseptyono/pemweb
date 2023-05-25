<?php


$tes = "Coba\n <br>";
$tes .= "Baris 2";
$file_name = "coba.txt";
file_put_contents($file_name,$tes);

$read_file = file_get_contents($file_name);
echo $read_file;


?>