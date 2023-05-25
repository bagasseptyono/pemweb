<?php
if ($_POST) {
    $kodebuku = $_POST['kodebuku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahunterbit = $_POST['tahunterbit'];
    $penerbit = $_POST['penerbit'];
    $jumlahhalaman = $_POST['jumlahhalaman'];
    $kategori = $_POST['kategori'];
    
    $namafile =$_FILES['file']['name'];

    $newline = $kodebuku . "," . 
                $judul . "," .
                $pengarang . "," .
                $tahunterbit . "," .
                $penerbit . "," .
                $jumlahhalaman . "," .
                $kategori . "," .
                $namafile ."\n";
                
    $file_txt_name = 'databuku.txt';
    if (file_exists('img/'.$namafile)) {
        echo ("Nama file " .  $namafile . " sudah ada");
    }
    if (file_put_contents($file_txt_name,$newline,FILE_APPEND)) {
        move_uploaded_file($_FILES['file']['tmp_name'],'img/'.$namafile);
        echo "Berhasil Disimpan";
    }else {
        echo " Gagal Disimpan";
    }
    
    
}
echo "<br><br><a href='index.php'>Kembali</a>";
