<?php include('conn.php');

include('template.php'); ?>



<!-- customer -->
<div class="row mx-3">
    <div class=" col-md-2 mt-5  border-end">
        <div class="list-group list-group-flush">
            <a href="customer.php" class="list-group-item list-group-item-action">Lihat Data</a>
            <a href="tambahCustomer.php" class="list-group-item list-group-item-action">Tambah Data</a>
        </div>
    </div>
    <div class="col-10">
        <h2 class="text-center my-5">CUSTOMERS</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Contact Name</th>
                    <th scope="col">Country</th>
                    <th scope="col">City</th>
                    <th scope="col">Address</th>
                    <th scope="col">PostCode</th>
                    <th scope="col">Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php $query = "SELECT * FROM customers";
                $result = mysqli_query(connection(), $query);
                $i = 1;

                ?>
                <?php while ($data = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <th scope="row"><?php echo $i;
                                        $i++; ?></th>
                        <td><?php echo $data['customerName']; ?></td>
                        <td><?php echo ($data['contactFirstName'] . ' ' . $data['contactLastName']); ?></td>
                        <td><?php echo $data['country']; ?></td>
                        <td><?php echo $data['city']; ?></td>
                        <td><?php echo $data['addressLine1']; ?></td>
                        <td><?php echo $data['postalCode']; ?></td>
                        <td><?php echo $data['phone']; ?></td>
                    </tr>

                <?php endwhile ?>
            </tbody>
        </table>
    </div>

</div>

</div>

</body>

</html>