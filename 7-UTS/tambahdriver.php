<?php include('template.php');
?>

<?php
$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $no_sim = $_POST['no_sim'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO driver
    (nama,no_sim, alamat) 
    values(
        '$nama' ,
        '$no_sim',
        '$alamat'
        )";
    $result = mysqli_query(connection(), $query);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
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
        <form action="tambahdriver.php" method="post" class="mx-5">
            <div class="form-group mb-4">
                <div class="mb-2 ">
                    <label for="nama" class="mx-2">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="nama" name="nama">
                </div>
            </div>
            <div class="form-group mb-4">
                <div class="mb-2 ">
                    <label for="no_sim" class="mx-2">No SIM</label>
                    <input type="number" class="form-control" id="no_sim" placeholder="no sim" name="no_sim">
                </div>
            </div>
            <div class="form-group mb-4">
                <div class="mb-2 ">
                    <label for="alamat" class="mx-2">Alamat</label>
                    <input type="text" class="form-control" id="alamat" placeholder="alamat" name="alamat">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
</div>