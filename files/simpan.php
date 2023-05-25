<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $isi = $npm . " - " . $nama ."\n";
        $file_name = "mahasiswa.txt";
        if (file_put_contents($file_name, $isi, FILE_APPEND)) {
            echo "<h1> Berhasil Disimpan </h1>";
        }
        else {
            echo "Gagal disimpan";
        }

        echo '<br><br><a href="file-form.php">Kembali</a>';
        echo '<br><a href="baca.php">Baca </a>';
    }

    ?>