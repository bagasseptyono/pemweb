<?php include("template.php");

?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['status'])) {
        //query SQL
        $status = $_POST['status'];
        $query = "SELECT bus.id_bus, bus.plat, 
        COALESCE(SUM(trans_upn.jumlah_km), 0) 
        AS jumlah_km, bus.status 
            FROM bus LEFT JOIN trans_upn 
                ON bus.id_bus = trans_upn.id_bus 
            WHERE bus.status = $status 
            GROUP BY bus.id_bus";

        //eksekusi query
        $result = mysqli_query(connection(), $query);
        $selected = mysqli_fetch_array($result);
    }

}
else{
    $query = "SELECT bus.id_bus, bus.plat, 
    COALESCE(SUM(trans_upn.jumlah_km), 0) AS jumlah_km, 
    bus.status 
            FROM bus 
        LEFT JOIN trans_upn 
        ON bus.id_bus = trans_upn.id_bus 
        GROUP BY bus.id_bus;";
                $result = mysqli_query(connection(), $query);
                

}

?>



<div class="row mx-3">
    <div class=" col-md-2 mt-5  border-end">
        <div class="list-group list-group-flush sticky-top">
            <a href="bus.php" class="list-group-item list-group-item-action">Lihat Data</a>
            <a href="tambahbus.php" class="list-group-item list-group-item-action">Tambah Data</a>
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
        $i = 1;
        ?>
        <h2 class="text-center my-5">BUS</h2>

        <form action="bus.php" method="post">
            <div class="row">
                <div class="col-5">
                <label for="status" class="mx-2 ">Status</label>
                <select class="form-select mb-3" aria-label="Default select example" name="status">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="0">0</option>
                </select>
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </div>
                
            </div>

        </form>

        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID BUS</th>
                    <th scope="col">Plat</th>
                    <th scope="col">Status</th>
                    <th scope="col">Jumlah Km</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                
                <?php while ($data = mysqli_fetch_array($result)) : ?>
                    <tr class="<?php echo $data['status'] == 1 ? 'bg-success p-2 text-dark bg-opacity-50' : ($data['status'] == 2 ? 'bg-warning p-2 text-dark bg-opacity-50' : 'bg-danger p-2 text-dark bg-opacity-50'); ?>">
                        <th scope="row"><?php echo $i;
                                        $i++; ?></th>
                        <td><?php echo $data['id_bus']; ?></td>
                        <td><?php echo $data['plat']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                        <td><?php echo $data['jumlah_km']; ?></td>
                        <td><a href="<?php echo "updatebus.php?id=" . $data['id_bus']; ?>" class="btn btn-warning">Update</a><a href="<?php echo "deletebus.php?id=" . $data['id_bus']; ?>" class="btn btn-danger" onclick="return confirm('HAPUS DATA?')">Delete</a></td>
                    </tr>

                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</div>


</body>

</html>