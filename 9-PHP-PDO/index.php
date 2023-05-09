<?php include('conn.php');
include('template.php');
$status = 'ok';
?>


<!-- isi -->
<div class="row mx-3">
    <div class=" col-md-2 mt-5  border-end">
        <div class="list-group list-group-flush">
            <a href="index.php" class="list-group-item list-group-item-action">Lihat Data</a>
            <a href="tambahProduct.php" class="list-group-item list-group-item-action">Tambah Data</a>
        </div>
    </div>
    <div class="col ">
        <h2 class="text-center my-5">PRODUCT</h2>
        <?php
            if (isset($_GET['status']) && $status == 'ok') {
                echo '<div class="alert alert-success mx-3" role="alert">
                Berhasil DiUpdate
              </div>';
            }else if (isset($_GET['status'])&& $status == 'err') {
                echo '<div class="alert alert-danger mx-3" role="alert">
                Gagal DiUpdate
              </div>';
            }
        ?>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">Price</th>
                    <th scope="col">MSRP</th>
                    <th scope="col">Pilihan</th>

                </tr>
            </thead>
            <tbody>
                <?php $query = "SELECT * FROM products";
                $result = $conn->query($query);
                $i = 1;

                ?>
                <?php while ($data = $result->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <th scope="row"><?php echo $i;
                                        $i++; ?></th>
                        <td><?php echo $data['productName']; ?></td>
                        <td><?php echo $data['productLine']; ?></td>
                        <td><?php echo $data['productDescription']; ?></td>
                        <td><?php echo $data['productVendor']; ?></td>
                        <td><?php echo $data['buyPrice']; ?></td>
                        <td><?php echo $data['MSRP']; ?></td>
                        <td><a href="<?php echo "updateProduct.php?productCode=".$data['productCode']; ?>" class="btn btn-warning">Update</a><a href="<?php echo "deleteProduct.php?productCode=".$data['productCode']; ?>" class="btn btn-danger" onclick="return confirm('HAPUS DATA?')">Delete</a></td>
                    </tr>

                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</div>


</body>

</html>