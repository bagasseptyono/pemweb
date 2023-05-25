<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
if ($_GET['line']) {
    $dataline = $_POST['line'];
    $data = explode(",", $dataline);
}
?>


<body>
    <form action="update.php" enctype="multipart/form-data" method="post">
        <table>
            <tr>
                <td>Kode Buku</td>
                <td><input type="text" name="kodebuku" value="<?php echo $data[0]; ?>"></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul" value="<?php echo $data[1]; ?>"></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td><input type="text" name="pengarang" value="<?php echo $data[2]; ?>"></td>
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td><input type="text" name="tahunterbit" value="<?php echo $data[3]; ?>"></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td><input type="text" name="penerbit" value="<?php echo $data[4]; ?>"></td>
            </tr>
            <tr>
                <td>Jumlah Halaman</td>
                <td><input type="number" name="jumlahhalaman" value="<?php echo $data[5]; ?>"></td>
            </tr>
            <tr>
                <td>kategori</td>
                <td><input type="text" name="kategori" value="<?php echo $data[6]; ?>"></td>
            </tr>
            <tr>
                <td>Cover</td>
                <td><input type="file" name="file" accept="image/*" ></td>
            </tr>

        </table>
        <img height="100px" src="img/<?php echo $data[7]; ?>" alt="" >
        <input type="hidden" name="filelama" value="<?php echo $data[7]; ?>">
        <input type="hidden" name="dataline" value="<?php echo $dataline; ?>">
        <input type="submit" value="Submit">
    </form>
    <a href="form.php">List Data</a>
</body>

</html>