<?php include('template.php');
include('conn.php');
?>


<?php
$status = '';
if ($_SERVER['REQUEST_METHOD']=== 'GET') {
    if (isset($_GET['customerNumber'])) {
        $customerNumber = $_GET['customerNumber'];

        $customerNumberQuery = $conn->prepare("SELECT * from customers where customerNumber = :customerNumber");
        $customerNumberQuery->bindParam(':customerNumber',$customerNumber);
        $customerNumberQuery->execute();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerNumber = $_POST['customerNumber'];
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

    $query = $conn->prepare("update customers set
        customerName = :customerName,
        contactLastName = :contactLastName,
        contactFirstName = :contactFirstName,
        phone = :phone,
        addressLine1 = :addressLine1,
        addressLine2 = :addressLine2,
        city = :city,
        state = :state,
        postalCode = :postalCode,
        country = :country,
        salesRepEmployeeNumber = :salesRepEmployeeNumber,
        creditLimit = :creditLimit
        where customerNumber = :customerNumber");
        $query->bindParam(':customerNumber',$customerNumber);
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
    header('Location: customer.php?status='.$status);
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
        <h2 class="text-center my-5">UPDATE DATA CUSTOMER</h2>
        
        <form action="updateCustomer.php" method="post" class="mx-5">
            <?php while($data = $customerNumberQuery->fetch(PDO::FETCH_ASSOC)) : ?>
            <div class="form-group mb-4">
                <label for="customerName" class="mx-2">Customer Name</label>
                <input type="text" class="form-control" id="customerName" placeholder="Customer Name" name="customerName" value="<?php echo $data['customerName'];?>">
                <input type="hidden" name="customerNumber" value="<?php echo $data['customerNumber'];?>">
            </div>
            <div class="form-group mb-2">
                <label for="contactFirstName" class="mx-2">Contact First Name</label>
                <input type="text" class="form-control" id="contactFirstName" placeholder="Contact First Name" name="contactFirstName" value="<?php echo $data['contactFirstName'];?>">
            </div>
            <div class="form-group mb-4">
                <label for="contactLastName" class="mx-2">Contact Last Name</label>
                <input type="text" class="form-control" id="contactLastName" placeholder="Contact Last Name" name="contactLastName" value="<?php echo $data['contactLastName'];?>">
            </div>

            <div class="form-group mb-4">
                <label for="phone" class="mx-2">Phone Number</label>
                <input type="text" class="form-control" id="phone" placeholder="Product Sale" name="phone" value="<?php echo $data['phone'];?>">
            </div>
            <div class="form-group mb-2">
                <label for="addressLine1" class="mx-2">Address Line 1</label>
                <input type="text" class="form-control" id="addressLine1" placeholder="Address Line 1" name="addressLine1" value="<?php echo $data['addressLine1'];?>">
            </div>
            <div class="form-group mb-4">
                <label for="addressLine2" class="mx-2">Address Line 2</label>
                <input type="text" class="form-control" id="addressLine2" placeholder="Address Line 2" name="addressLine2" value="<?php echo $data['addressLine2'];?>">
            </div>
            <div class="form-group mb-4">
                <div class="row">
                    <div class="mb-2 col-lg-6">
                        <label for="city" class="mx-2">City</label>
                        <input type="text" class="form-control" id="city" placeholder="city" name="city" value="<?php echo $data['city'];?>">
                    </div>
                    <div class="mb-2 col-lg-6">
                        <label for="state" class="mx-2">State</label>
                        <input type="text" class="form-control" id="state" placeholder="state" name="state" value="<?php echo $data['state'];?>">
                    </div>
                    <div class="mb-2 col-lg">
                        <label for="postalCode" class="mx-2">Postal Code</label>
                        <input type="text" class="form-control" id="postalCode" placeholder="post Code" name="postalCode" value="<?php echo $data['postalCode'];?>">
                    </div>
                    <div class="mb-2 col-lg">
                        <label for="country" class="mx-2">Country</label>
                        <input type="text" class="form-control" id="country" placeholder="country" name="country" value="<?php echo $data['country'];?>">
                    </div>
                </div>
            </div>
            <div class="form-group mb-4">
                <div class="row">
                    <div class="mb-2 col-lg-6">
                        <label for="salesRepEmployeeNumber" class="mx-2">Employee Number</label>
                        <select class="form-control" id="salesRepEmployeeNumber" name="salesRepEmployeeNumber">
                            <option value="<?php echo $data['salesRepEmployeeNumber'];?>"><?php echo $data['salesRepEmployeeNumber'];?></option>
                            <?php while ($dataEmployees = $employees->fetch(PDO::FETCH_ASSOC)) : ?>
                                <option value="<?php echo $dataEmployees['employeeNumber']; ?>"><?php echo $dataEmployees['employeeNumber']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-2 col-lg-6">
                        <label for="creditLimit" class="mx-2">creditLimit</label>
                        <input type="number" class="form-control" id="creditLimit" placeholder="creditLimit" name="creditLimit" step="any" value="<?php echo $data['creditLimit'];?>">
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            <?php endwhile;?>
        </form>
    </div>
</div>