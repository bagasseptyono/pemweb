<?php include("template.php");

?>

<div class="row mx-3">
    <div class=" col-md-2 mt-5  border-end">
        <div class="list-group list-group-flush sticky-top">
            <a href="kondektur.php" class="list-group-item list-group-item-action">Lihat Data</a>
            <a href="tambahkondektur.php" class="list-group-item list-group-item-action">Tambah Data</a>
            <a href="pendapatanKondektur.php" class="list-group-item list-group-item-action">Data Pendapatan</a>
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
        <h2 class="text-center my-5">KONDEKTUR</h2>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Kondektur</th>
                    <th scope="col">Nama Kondektur</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php $query = "SELECT * FROM kondektur";
                $result = mysqli_query(connection(), $query);
                $i = 1;

                ?>
                <?php while ($data = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <th scope="row"><?php echo $i;
                                        $i++; ?></th>
                        <td><?php echo $data['id_kondektur']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><a href="<?php echo "updatekondektur.php?id=".$data['id_kondektur']; ?>" class="btn btn-warning">Update</a><a href="<?php echo "deletekondektur.php?id=".$data['id_kondektur']; ?>" class="btn btn-danger" onclick="return confirm('HAPUS DATA?')">Delete</a></td>
                    </tr>

                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</div>


</body>

</html>