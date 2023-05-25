<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataline = $_POST['dataline'];
    $kodebuku = $_POST['kodebuku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahunterbit = $_POST['tahunterbit'];
    $penerbit = $_POST['penerbit'];
    $jumlahhalaman = $_POST['jumlahhalaman'];
    $kategori = $_POST['kategori'];
    $namafilelama = $_POST['filelama'];

    

    if ($_FILES['file']['error']!==4) {
        if (file_exists("img/$namafilelama")) {
            unlink("img/$namafilelama");
        }
        $namafile = $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], 'img/' . $namafile);
    }else {
        $namafile = $namafilelama;
    }

    $newline = $kodebuku . "," .
        $judul . "," .
        $pengarang . "," .
        $tahunterbit . "," .
        $penerbit . "," .
        $jumlahhalaman . "," .
        $kategori . "," .
        $namafile ;
    
    $filepath = "databuku.txt";
    
    $lines = file($filepath);
    foreach ($lines as $line) {
        $data = explode(",", $line);
        $datalinelama = explode(",",$dataline);
        if ($data[0] == $datalinelama[0]) {
            $updateLine = $newline;
            $perbaruiData[] = $updateLine;
            
        } else {
            $perbaruiData[] = $line;
            
        }
    }
    $file_perpus = fopen("databuku.txt", "w");
    if ($file_perpus) {
        foreach ($perbaruiData as $line) {
            fwrite($file_perpus, $line);
            echo "Berhasil diupdate";
        }
        fclose($file_perpus);
        
    } else {
        echo "Gagal membuka file buku.txt.";
        exit;
    }
}
echo "<br><br><a href='index.php'>Kembali</a>";
