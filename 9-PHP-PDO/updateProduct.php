<?php include('template.php');
include('conn.php');
?>


<?php 
$status = '';

if ($_SERVER['REQUEST_METHOD']=== 'GET') {
    if (isset($_GET['productCode'])) {
        $productCode = $_GET['productCode'];

        $productCodeQuery = $conn->prepare("SELECT * from products where productCode = :productCode");
        $productCodeQuery->bindParam(':productCode',$productCode);
        $productCodeQuery->execute();
    }
}

if ($_SERVER['REQUEST_METHOD']=== 'POST') {
    $productCode_old = $_POST['productCode_old'];
    $productCode_new = $_POST['productCode_new'];
    $productName = $_POST['productName'];
    $productLine = $_POST['productLine'];
    $productScale = $_POST['productScale'];
    $productVendor = $_POST['productVendor'];
    $productDescription = $_POST['productDescription'];
    $quantityInStock = $_POST['quantityInStock'];
    $buyPrice = $_POST['buyPrice'];
    $MSRP = $_POST['MSRP'];
    
    $query = $conn->prepare("update products set 
        productCode = :productCode_new,
        productName = :productName,
        productLine = :productLine,
        productScale = :productScale,
        productVendor = :productVendor,
        productDescription = :productDescription,
        quantityInStock = :quantityInStock ,
        buyPrice = :buyPrice ,
        MSRP = :MSRP 
        where productCode = :productCode_old");

    $query->bindParam(':productCode_old',$productCode_old);
    $query->bindParam(':productCode_new',$productCode_new);
    $query->bindParam(':productName',$productName);
    $query->bindParam(':productLine',$productLine);
    $query->bindParam(':productScale',$productScale);
    $query->bindParam(':productVendor',$productVendor);
    $query->bindParam(':productDescription',$productDescription);
    $query->bindParam(':quantityInStock',$quantityInStock);
    $query->bindParam(':buyPrice',$buyPrice);
    $query->bindParam(':MSRP',$MSRP);

    
    if ($query->execute()) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
    header('Location: index.php?status='.$status);
    

}


$getProductLine = "SELECT * FROM productlines";
$productLines = $conn->query($getProductLine);
?>
<div class="row mx-3">
    <div class=" col-md-3 mt-5  border-end">
        <div class="list-group list-group-flush">
            <a href="index.php" class="list-group-item list-group-item-action">Lihat Data</a>
            <a href="tambahProduct.php" class="list-group-item list-group-item-action">Tambah Data</a>
        </div>
    </div>
    <div class="col">
        <h2 class="text-center my-5">UPDATE DATA PRODUCT</h2>
        
        <form action="updateProduct.php" method="post" class="mx-5">
            <?php while($data = $productCodeQuery->fetch(PDO::FETCH_ASSOC)) : ?>
            <div class="form-group mb-3">
                <label for="productCode_new" class="mx-2">Product Code</label>
                <input type="text" class="form-control" id="productCode_new" placeholder="Product Code" name="productCode_new" value="<?php echo $data['productCode'];?>">

                <input type="hidden" name="productCode_old" value="<?php echo $data['productCode'];?>">
            </div>
            <div class="form-group mb-3">
                <label for="productName" class="mx-2">Product Name</label>
                <input type="text" class="form-control" id="productName" placeholder="Product Name" name="productName" value="<?php echo $data['productName'];?>" >
            </div>

            <div class="form-group mb-3">
                <label for="productLine" class="mx-2">Product Line</label>
                <select class="form-control" id="productLine" name="productLine">
                    <?php while ($dataProductLine = $productLines->fetch(PDO::FETCH_ASSOC)) : ?>
                        <option value="<?php echo $dataProductLine['productLine']; ?>"><?php echo $dataProductLine['productLine']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <div class="form-group mb-3">
                <label for="productScale" class="mx-2">Product Sale</label>
                <input type="text" class="form-control" id="productScale" placeholder="Product Sale" name="productScale" value="<?php echo $data['productScale'];?>">
            </div>
            <div class="form-group mb-3">
                <label for="productVendor" class="mx-2">Product Vendor</label>
                <input type="text" class="form-control" id="productVendor" placeholder="Product Vendor" name="productVendor" value="<?php echo $data['productVendor'];?>">
            </div>
            <div class="form-group mb-3">
                <label for="productDescription" class="mx-2">Product Description</label>
                <textarea class="form-control" id="productDescription" name="productDescription" rows="3" ><?php echo $data['productDescription'];?></textarea>
            </div>
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col">
                        <label for="quantityInStock" class="mx-2">Quantity Stock</label>
                        <input type="number" class="form-control" id="quantityInStock" placeholder="1999" name="quantityInStock" value="<?php echo $data['quantityInStock'];?>">
                    </div>
                    <div class="col">
                        <label for="buyPrice" class="mx-2">Buy Price</label>
                        <input type="number" class="form-control" id="buyPrice" placeholder="99.99" name="buyPrice" step="any" value="<?php echo $data['buyPrice'];?>">
                    </div>
                    <div class="col">
                        <label for="msrp" class="mx-2">MSRP</label>
                        <input type="number" class="form-control" id="msrp" placeholder="110.91" name="MSRP" step="any" value="<?php echo $data['MSRP'];?>">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
            <?php endwhile; ?>
        </form>
    </div>
</div>