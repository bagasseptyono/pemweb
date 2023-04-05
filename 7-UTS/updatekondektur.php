<?php include('template.php');
?>

<?php
$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        //query SQL
        $id_kondektur = $_GET['id'];
        $query = "SELECT * FROM kondektur WHERE id_kondektur = '$id_kondektur'";

        //eksekusi query
        $result = mysqli_query(connection(), $query);
        $selected = mysqli_fetch_array($result) ;
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $id_kondektur = $_POST['id_kondektur'];

    $query = "UPDATE kondektur SET
        nama = '$nama' where id_kondektur = '$id_kondektur'";
    $result = mysqli_query(connection(), $query);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
    header('Location: kondektur.php?status='.$status);
}


?>

<div class="row mx-3">
    <div class=" col-md-3 mt-5  border-end">
        <div class="list-group list-group-flush sticky-top">
            <a href="kondektur.php" class="list-group-item list-group-item-action">Lihat Data</a>
            <a href="tambahkondektur.php" class="list-group-item list-group-item-action">Tambah Data</a>
        </div>
    </div>
    <div class="col">
        <h2 class="text-center my-5">UPDATE KONDEKTUR</h2>
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
        <form action="updatekondektur.php" method="post" class="mx-5">
            <div class="form-group mb-4">
                <div class="mb-2 ">
                    <label for="nama" class="mx-2">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" value="<?php echo $selected['nama']; ?>">
                </div>
            </div>
            <input type="hidden" name="id_kondektur" value="<?php echo $selected['id_kondektur']; ?>">

            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
</div>