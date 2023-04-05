<?php include('template.php');
?>

<?php
$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kondektur = $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];

    $query = "INSERT INTO trans_upn
    (id_kondektur, id_bus, id_driver, jumlah_km, tanggal) 
    values(
        '$id_kondektur' ,
        '$id_bus' ,
        '$id_driver',
        '$jumlah_km' ,
        '$tanggal' 
        )";
    $result = mysqli_query(connection(), $query);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
}


$query = "SELECT * FROM kondektur";
$kondektur = mysqli_query(connection(), $query);


?>

<div class="row mx-3">
    <div class=" col-md-3 mt-5  border-end">
        <div class="list-group list-group-flush sticky-top">
            <a href="transupn.php" class="list-group-item list-group-item-action">Lihat Data</a>
            <a href="tambahtransupn.php" class="list-group-item list-group-item-action">Tambah Data</a>
        </div>
    </div>
    <div class="col">
        <h2 class="text-center my-5">TAMBAH DATA TRANS UPN</h2>
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
        <form action="tambahtransupn.php" method="post" class="mx-5">
            <div class="form-group mb-4">
                <div class="mb-2 ">
                    <label for="id_kondektur" class="mx-2">ID Kondektur</label>
                    <select class="form-select" id="id_kondektur" name="id_kondektur">
                        <?php while ($data = mysqli_fetch_array($kondektur)) : ?>
                            <option value="<?php echo $data['id_kondektur']; ?>"><?php echo $data['id_kondektur']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>


            <?php
            $query = "SELECT * FROM bus";
            $bus = mysqli_query(connection(), $query);
            ?>

            <div class="form-group mb-4">
                <div class="mb-2 ">
                    <label for="id_bus" class="mx-2">ID bus</label>
                    <select class="form-select" id="id_bus" name="id_bus">
                        <?php while ($data = mysqli_fetch_array($bus)) : ?>
                            <option value="<?php echo $data['id_bus']; ?>"><?php echo $data['id_bus']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>

            <?php
            $query = "SELECT * FROM driver";
            $driver = mysqli_query(connection(), $query);
            ?>

            <div class="form-group mb-4">
                <div class="mb-2 ">
                    <label for="id_driver" class="mx-2">ID Driver</label>
                    <select class="form-select" id="id_driver" name="id_driver">
                        <?php while ($data = mysqli_fetch_array($driver)) : ?>
                            <option value="<?php echo $data['id_driver']; ?>"><?php echo $data['id_driver']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>


            <div class="form-group mb-4">
                <div class="mb-2 ">
                    <label for="jumlah_km" class="mx-2">Jumlah KM</label>
                    <input type="number" class="form-control" id="jumlah_km" placeholder="Jumlah KM" name="jumlah_km">
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="tanggal" class="mx-2">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" placeholder="Jumlah KM" name="tanggal">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
</div>