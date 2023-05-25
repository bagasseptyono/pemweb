<?php

$namafile = "databuku.txt";
$readfile = file($namafile);


?>



<table border="1" margin="0">
    <tr>
        <th>Kode Buku</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Tahun Terbit</th>
        <th>Penerbit</th>
        <th>Jumlah Halaman</th>
        <th>Kategori</th>
        <th>Cover</th>
        <th>Pilihan</th>
    </tr>
    <?php foreach ($readfile as $data) :?>
        <?php $buku = explode(",", $data);?>
        <tr>
            <td><?php echo $buku[0]; ?></td>
            <td><?php echo $buku[1]; ?></td>
            <td><?php echo $buku[2]; ?></td>
            <td><?php echo $buku[3]; ?></td>
            <td><?php echo $buku[4]; ?></td>
            <td><?php echo $buku[5]; ?></td>
            <td><?php echo $buku[6]; ?></td>
            <td style="text-align: center;"><?php echo $buku[7]; ?><br>
                <img height="200px" src="img/<?php echo $buku[7]; ?>" alt="" ><br> 
                <a href="img/<?php echo $buku[7];  ?>" style="font-weight: bolder; font-size: 24px;">img/<?php echo $buku[7]; ?></a>
            </td>
            <td>
                <form action="update-form.php?line=<?php echo $buku[0]; ?>" method="post">
                    <input type="hidden" name="line" value="<?php echo $data; ?>">
                    <input type="submit" value="Update">
                    <button ><a href="delete.php?kode=<?php echo $buku[0]; ?>">Delete</a></button>
                </form>  
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<h3><a href="form.php">Tambah</a></h3>