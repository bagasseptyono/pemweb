<?php include('template.php');
?>

<?php
$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        //query SQL
        $id_driver = $_GET['id'];
        $query = "SELECT * FROM driver WHERE id_driver = '$id_driver'";

        //eksekusi query
        $result = mysqli_query(connection(), $query);
        $selected = mysqli_fetch_array($result) ;
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_driver = $_POST['id_driver'];
    $nama = $_POST['nama'];
    $no_sim = $_POST['no_sim'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE driver set
        nama ='$nama' ,
        no_sim ='$no_sim',
        alamat ='$alamat'
        where id_driver = '$id_driver'
        ";
    $result = mysqli_query(connection(), $query);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
    header('Location: driver.php?status='.$status);
}


?>

<div class="row mx-3">
    <div class=" col-md-3 mt-5  border-end">
        <div class="list-group list-group-flush sticky-top">
            <a href="driver.php" class="list-group-item list-group-item-action">Lihat Data</a>
            <a href="tambahdriver.php" class="list-group-item list-group-item-action">Tambah Data</a>
        </div>
    </div>
    <div class="col">
        <h2 class="text-center my-5">TAMBAH DATA DRIVER</h2>
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
        <form action="updatedriver.php" method="post" class="mx-5">
            <div class="form-group mb-4">
                <div class="mb-2 ">
                    <label for="nama" class="mx-2">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" value="<?php echo $selected['nama']; ?>">
                </div>
            </div>
            <div class="form-group mb-4">
                <div class="mb-2 ">
                    <label for="no_sim" class="mx-2">No SIM</label>
                    <input type="number" class="form-control" id="no_sim" placeholder="no sim" name="no_sim" value="<?php echo $selected['no_sim']; ?>">
                </div>
            </div>
            <div class="form-group mb-4">
                <div class="mb-2 ">
                    <label for="alamat" class="mx-2">Alamat</label>
                    <input type="text" class="form-control" id="alamat" placeholder="alamat" name="alamat" value="<?php echo $selected['alamat']; ?>">
                </div>
            </div>
            <input type="hidden" name="id_driver" value="<?php echo $selected['id_driver']; ?>">

            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
</div>