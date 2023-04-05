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

        <form action="pendapatanKondektur.php" method="get">
            <div class="row">
                <div class="col-5">
                    <label for="bulan" class="mx-2 ">Bulan</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="bulan">

                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </div>

            </div>

        </form>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Kondektur</th>
                    <th scope="col">Nama Kondektur</th>
                    <th scope="col">Pendapatan</th>
                    <th scope="col">Bulan</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($_GET['bulan'])) {
                    //query SQL
                    $bulan = $_GET['bulan'];
                    $query = "SELECT kondektur.id_kondektur, kondektur.nama,  MONTHNAME(trans_upn.tanggal) as bulan, trans_upn.jumlah_km, SUM(trans_upn.jumlah_km * 1500) as pendapatan_bulanan 
                    FROM trans_upn 
                    INNER JOIN kondektur ON trans_upn.id_kondektur = kondektur.id_kondektur 
                    WHERE MONTH(trans_upn.tanggal) = $bulan
                    GROUP BY kondektur.nama,MONTH(trans_upn.tanggal)";
            
                    //eksekusi query
                    $result = mysqli_query(connection(), $query);
                    $selected= mysqli_fetch_array($result);
                }
                else{
                    $query = "SELECT kondektur.id_kondektur, kondektur.nama,  MONTHNAME(trans_upn.tanggal) as bulan, trans_upn.jumlah_km, SUM(trans_upn.jumlah_km * 1500) as pendapatan_bulanan 
                    FROM trans_upn 
                    INNER JOIN kondektur ON trans_upn.id_kondektur = kondektur.id_kondektur 
                    GROUP BY kondektur.nama,MONTH(trans_upn.tanggal)";
                 $result = mysqli_query(connection(), $query);
                            
                }
                
                $i = 1;

                ?>
                <?php while ($data = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <th scope="row"><?php echo $i;
                                        $i++; ?></th>
                        <td><?php echo $data['id_kondektur']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['pendapatan_bulanan']; ?></td>
                        <td><?php echo $data['bulan']; ?></td>
                    </tr>

                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</div>


</body>

</html>