<?php
echo '<h1>Data Mahasiswa</h1><br>';

// $read = file_get_contents('mahasiswa.txt');
// echo $read;
echo '<br><br><a href="file-form.php">Kembali</a>';

$namafile = "mahasiswa.txt";
$readfile = file($namafile);


?>

<table border="1">
    <tr>
        <th>NPM</th>
        <th>NAMA</th>
    </tr>
    <?php foreach ($readfile as $data) :?>
        <?php $mhs = explode(" - ", $data);?>
        <tr>
            <td><?php echo $mhs[0]; ?></td>
            <td><?php echo $mhs[1]; ?></td>
        </tr>
    <?php endforeach; ?>
</table>