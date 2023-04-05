<?php include('template.php');
?>

<?php
$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        //query SQL
        $id_trans_upn = $_GET['id'];
        $query = "SELECT * FROM trans_upn WHERE id_trans_upn = '$id_trans_upn'";

        //eksekusi query
        $result = mysqli_query(connection(), $query);
        $selected = mysqli_fetch_array($result) ;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_trans_upn = $_POST['id_trans_upn'];
    $id_kondektur = $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];

    $query = "UPDATE trans_upn SET 
        id_kondektur = '$id_kondektur',
        id_bus = '$id_bus' ,
        id_driver = '$id_driver',
        jumlah_km = '$jumlah_km' ,
        tanggal = '$tanggal' 
        where id_trans_upn = '$id_trans_upn'
        ";
    $result = mysqli_query(connection(), $query);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
    header('Location: transupn.php?status='.$status);
}


$querykondektur = "SELECT * FROM kondektur";
$kondektur = mysqli_query(connection(), $querykondektur);


?>

<div class="row mx-3">
    <div class=" col-md-3 mt-5  border-end">
        <div class="list-group list-group-flush sticky-top">
            <a href="transupn.php" class="list-group-item list-group-item-action">Lihat Data</a>
            <a href="tambahtransupn.php" class="list-group-item list-group-item-action">Tambah Data</a>
        </div>
    </div>
    <div class="col">
        <h2 class="text-center my-5">UPDATE TRANS UPN</h2>
        <?php
        if ($status == 'ok') {
            echo '<div class="alert alert-success mx-3" role="alert">
                Berhasil DiUpdate
              </div>';
        } else if ($status == 'err') {
            echo '<div class="alert alert-danger mx-3" role="alert">
                Gagal Ditambahkan
              </div>';
        }
        ?>
        <form action="updatetransupn.php" method="post" class="mx-5">
            <div class="form-group mb-4">
                <div class="mb-2 ">
                    <label for="id_kondektur" class="mx-2">ID Kondektur</label>
                    <select class="form-select" id="id_kondektur" name="id_kondektur">
                        <option value="<?php echo $selected['id_kondektur']; ?>" selected> <?php echo $selected['id_kondektur']; ?></option>
                        <?php while ($data = mysqli_fetch_array($kondektur)) : ?>
                            <option value="<?php echo $data['id_kondektur']; ?>">
                                <?php echo $data['id_kondektur']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>


            <?php
            $querybus = "SELECT * FROM bus";
            $bus = mysqli_query(connection(), $querybus);
            ?>

            <div class="form-group mb-4">
                <div class="mb-2 ">
                    <label for="id_bus" class="mx-2">ID bus</label>
                    <select class="form-select" id="id_bus" name="id_bus">
                        <option value="<?php echo $selected['id_bus'];
                        ?>" selected> <?php echo $selected['id_bus']; ?></option>
                        <?php while ($data = mysqli_fetch_array($bus)) : ?>
                            <option value="<?php echo $data['id_bus']; ?>"><?php echo $data['id_bus']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>

            <?php
            $querydriver = "SELECT * FROM driver";
            $driver = mysqli_query(connection(), $querydriver);
            ?>

            <div class="form-group mb-4">
                <div class="mb-2 ">
                    <label for="id_driver" class="mx-2">ID Driver</label>
                    <select class="form-select" id="id_driver" name="id_driver">
                        <option value="<?php echo $selected['id_driver']; ?>" selected> <?php echo $selected['id_driver']; ?></option>
                        <?php while ($data = mysqli_fetch_array($driver)) : ?>
                            <option value="<?php echo $data['id_driver']; ?>"><?php echo $data['id_driver']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>


            <div class="form-group mb-4">
                <div class="mb-2 ">
                    <label for="jumlah_km" class="mx-2">Jumlah KM</label>
                    <input type="number" class="form-control" id="jumlah_km" placeholder="Jumlah KM" name="jumlah_km" value="<?php echo $selected['jumlah_km']; ?>">
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="tanggal" class="mx-2">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" placeholder="Jumlah KM" name="tanggal" value="<?php echo $selected['tanggal']; ?>">
            </div>
            <input type="hidden" name="id_trans_upn" value="<?php echo $selected['id_trans_upn']; ?>">
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
</div>