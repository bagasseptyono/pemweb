<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="simpan.php" enctype="multipart/form-data" method="post">
        <table>
            <tr>
                <td>Kode Buku</td>
                <td><input type="text" name="kodebuku"></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul"></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td><input type="text" name="pengarang"></td>
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td><input type="text" name="tahunterbit"></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td><input type="text" name="penerbit"></td>
            </tr>
            <tr>
                <td>Jumlah Halaman</td>
                <td><input type="number" name="jumlahhalaman"></td>
            </tr>
            <tr>
                <td>kategori</td>
                <td><input type="text" name="kategori"></td>
            </tr>
            <tr>
                <td>Cover</td>
                <td><input type="file" name="file" accept="image/*"></td>
            </tr>

        </table>
        <input type="submit" value="Submit">
    </form>
</body>

</html>