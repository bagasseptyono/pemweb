<?php

if (isset($_GET["kode"])) {
    $filepath = "databuku.txt";
    $perbaruiData = [];
    
    $lines = file($filepath);
    foreach ($lines as $line) {
        $data = explode(",", $line);
        if ($data[0] != $_GET['kode']) {
            $perbaruiData[] = $line;
            
        }else {
            $buangenter =explode("\n", $data[7]);
            unlink("img/".$buangenter[0]);
        }
    }
    $file_perpus = fopen("databuku.txt", "w");
    if ($file_perpus) {
        foreach ($perbaruiData as $line) {
            fwrite($file_perpus, $line);
        }
        fclose($file_perpus);
        echo "Berhasil Dihapus<br>";
        echo "<a href='index.php'>Kembali</a>";
        
    } else {
        echo "Gagal membuka file buku.txt.";
        exit;
    }
}