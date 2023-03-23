<?php include('conn.php');
include('template.php');

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
                </tr>
            </thead>
            <tbody>
                <?php $query = "SELECT * FROM products";
                $result = mysqli_query(connection(), $query);
                $i = 1;

                ?>
                <?php while ($data = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <th scope="row"><?php echo $i;
                                        $i++; ?></th>
                        <td><?php echo $data['productName']; ?></td>
                        <td><?php echo $data['productLine']; ?></td>
                        <td><?php echo $data['productDescription']; ?></td>
                        <td><?php echo $data['productVendor']; ?></td>
                        <td><?php echo $data['buyPrice']; ?></td>
                        <td><?php echo $data['MSRP']; ?></td>
                    </tr>

                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</div>


</body>

</html>