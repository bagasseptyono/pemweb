<?php include('template.php');
include('conn.php');
?>


<?php
$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerName = $_POST['customerName'];
    $contactLastName = $_POST['contactLastName'];
    $contactFirstName = $_POST['contactFirstName'];
    $phone = $_POST['phone'];
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postalCode'];
    $country = $_POST['country'];
    $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
    $creditLimit = $_POST['creditLimit'];

    $query = $conn->prepare("INSERT INTO customers
        SELECT MAX(customerNumber) + 1,
        :customerName,
        :contactLastName,
        :contactFirstName,
        :phone,
        :addressLine1,
        :addressLine2,
        :city,
        :state,
        :postalCode,
        :country,
        :salesRepEmployeeNumber,
        :creditLimit
        from customers");
        $query->bindParam(':customerName',$customerName);
        $query->bindParam(':contactLastName',$contactLastName);
        $query->bindParam(':contactFirstName',$contactFirstName);
        $query->bindParam(':phone',$phone);
        $query->bindParam(':addressLine1',$addressLine1);
        $query->bindParam(':addressLine2',$addressLine2);
        $query->bindParam(':city',$city);
        $query->bindParam(':state',$state);
        $query->bindParam(':postalCode',$postalCode);
        $query->bindParam(':country',$country);
        $query->bindParam(':salesRepEmployeeNumber',$salesRepEmployeeNumber);
        $query->bindParam(':creditLimit',$creditLimit);
    
    if ($query->execute()) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
}


$getemployee = "SELECT * FROM employees";
$employees = $conn->query($getemployee);
?>
<div class="row mx-3">
    <div class=" col-md-3 mt-5  border-end">
        <div class="list-group list-group-flush">
            <a href="customer.php" class="list-group-item list-group-item-action">Lihat Data</a>
            <a href="tambahCustomer.php" class="list-group-item list-group-item-action">Tambah Data</a>
        </div>
    </div>
    <div class="col">
        <h2 class="text-center my-5">TAMBAH DATA CUSTOMER</h2>
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
        <form action="tambahCustomer.php" method="post" class="mx-5">
            <div class="form-group mb-4">
                <label for="customerName" class="mx-2">Customer Name</label>
                <input type="text" class="form-control" id="customerName" placeholder="Customer Name" name="customerName">
            </div>
            <div class="form-group mb-2">
                <label for="contactFirstName" class="mx-2">Contact First Name</label>
                <input type="text" class="form-control" id="contactFirstName" placeholder="Contact First Name" name="contactFirstName">
            </div>
            <div class="form-group mb-4">
                <label for="contactLastName" class="mx-2">Contact Last Name</label>
                <input type="text" class="form-control" id="contactLastName" placeholder="Contact Last Name" name="contactLastName">
            </div>

            <div class="form-group mb-4">
                <label for="phone" class="mx-2">Phone Number</label>
                <input type="text" class="form-control" id="phone" placeholder="Product Sale" name="phone">
            </div>
            <div class="form-group mb-2">
                <label for="addressLine1" class="mx-2">Address Line 1</label>
                <input type="text" class="form-control" id="addressLine1" placeholder="Address Line 1" name="addressLine1">
            </div>
            <div class="form-group mb-4">
                <label for="addressLine2" class="mx-2">Address Line 2</label>
                <input type="text" class="form-control" id="addressLine2" placeholder="Address Line 2" name="addressLine2">
            </div>
            <div class="form-group mb-4">
                <div class="row">
                    <div class="mb-2 col-lg-6">
                        <label for="city" class="mx-2">City</label>
                        <input type="text" class="form-control" id="city" placeholder="city" name="city">
                    </div>
                    <div class="mb-2 col-lg-6">
                        <label for="state" class="mx-2">State</label>
                        <input type="text" class="form-control" id="state" placeholder="state" name="state">
                    </div>
                    <div class="mb-2 col-lg">
                        <label for="postalCode" class="mx-2">Postal Code</label>
                        <input type="text" class="form-control" id="postalCode" placeholder="post Code" name="postalCode">
                    </div>
                    <div class="mb-2 col-lg">
                        <label for="country" class="mx-2">Country</label>
                        <input type="text" class="form-control" id="country" placeholder="country" name="country">
                    </div>
                </div>
            </div>
            <div class="form-group mb-4">
                <div class="row">
                    <div class="mb-2 col-lg-6">
                        <label for="salesRepEmployeeNumber" class="mx-2">Employee Number</label>
                        <select class="form-control" id="salesRepEmployeeNumber" name="salesRepEmployeeNumber">
                            <?php while ($data = $employees->fetch(PDO::FETCH_ASSOC)) : ?>
                                <option value="<?php echo $data['employeeNumber']; ?>"><?php echo $data['employeeNumber']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-2 col-lg-6">
                        <label for="creditLimit" class="mx-2">creditLimit</label>
                        <input type="number" class="form-control" id="creditLimit" placeholder="creditLimit" name="creditLimit" step="any">
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
</div>