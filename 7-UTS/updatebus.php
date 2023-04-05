<?php include('template.php');
?>

<?php
$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        //query SQL
        $id_bus = $_GET['id'];
        $query = "SELECT * FROM bus WHERE id_bus = '$id_bus'";

        //eksekusi query
        $result = mysqli_query(connection(), $query);
        $selected = mysqli_fetch_array($result) ;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $plat = $_POST['plat'];
    $status = $_POST['status'];
    $id_bus = $_POST['id_bus'];

    $query = "UPDATE bus set
        plat = '$plat' ,
        status = '$status'
        where id_bus = '$id_bus'
        ";
    $result = mysqli_query(connection(), $query);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
    header('Location: bus.php?status='.$status);
}


?>

<div class="row mx-3">
    <div class=" col-md-3 mt-5  border-end">
        <div class="list-group list-group-flush sticky-top">
            <a href="bus.php" class="list-group-item list-group-item-action">Lihat Data</a>
            <a href="tambahbus.php" class="list-group-item list-group-item-action">Tambah Data</a>
        </div>
    </div>
    <div class="col">
        <h2 class="text-center my-5">TAMBAH DATA BUS</h2>
        <?php
        if ($status == 'ok') {
            echo '<div class="alert alert-success mx-3" role="alert">
                Berhasil Ditambahkan
              </div>';
        } else if ($status == 'err') {
            echo '<div class="alert alert-danger mx-3" role="alert">
                Gagal Ditambahkan
              </div>';
        }
        ?>
        <form action="updatebus.php" method="post" class="mx-5">
            <div class="form-group mb-4">
                <div class="mb-2 ">
                    <label for="plat" class="mx-2">PLAT</label>
                    <input type="text" class="form-control" id="plat" placeholder="PLAT" name="plat" value="<?php echo $selected['plat']; ?>">
                </div>
            </div>


            <div class="form-group mb-4">
                <div class="mb-2 ">
                    <label for="status" class="mx-2">Status</label>
                    <select class="form-select" id="status" name="status">
                            <option value="<?php echo $selected['status']; ?>"><?php echo $selected['status']; ?></option>
                            <option value="1">1 (Aktif)</option>
                            <option value="2">2 (Diperbaiki)</option>
                            <option value="0">0 (Rusak)</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="id_bus" value="<?php echo $selected['id_bus']; ?>">
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
</div>