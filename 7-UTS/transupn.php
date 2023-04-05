<?php include("template.php");

?>

<div class="row mx-3">
    <div class=" col-md-2 mt-5  border-end">
        <div class="list-group list-group-flush sticky-top">
            <a href="transupn.php" class="list-group-item list-group-item-action">Lihat Data</a>
            <a href="tambahtransupn.php" class="list-group-item list-group-item-action">Tambah Data</a>
        </div>
    </div>

    <div class="col ">
        <?php
        if (@$_GET['status'] !== NULL) {
            $status = $_GET['status'];
            if ($status == 'ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data berhasil di-update</div>';
            } elseif ($status == 'err') {
                echo '<br><br><div class="alert alert-danger" role="alert">Data gagal di-update</div>';
            }
        }
        ?>
        <h2 class="text-center my-5">TRANS UPN</h2>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID TRANS UPN</th>
                    <th scope="col">ID Kondektur</th>
                    <th scope="col">ID Bus</th>
                    <th scope="col">ID Driver</th>
                    <th scope="col">Jumlah KM</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php $query = "SELECT * FROM trans_upn";
                $result = mysqli_query(connection(), $query);
                $i = 1;

                ?>
                <?php while ($data = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <th scope="row"><?php echo $i;
                                        $i++; ?></th>
                        <td><?php echo $data['id_trans_upn']; ?></td>
                        <td><?php echo $data['id_kondektur']; ?></td>
                        <td><?php echo $data['id_bus']; ?></td>
                        <td><?php echo $data['id_driver']; ?></td>
                        <td><?php echo $data['jumlah_km']; ?></td>
                        <td><?php echo $data['tanggal']; ?></td>
                        <td>
                            <a href="<?php echo "updatetransupn.php?id=" . $data['id_trans_upn']; ?>" class="btn btn-warning">Update</a>
                            <a href="<?php echo "deletetransupn.php?id=" . $data['id_trans_upn']; ?>" class="btn btn-danger" onclick="return confirm('HAPUS DATA?')">Delete</a>
                        </td>
                    </tr>

                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</div>


</body>

</html>