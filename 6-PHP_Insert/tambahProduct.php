<?php include('template.php');
include('conn.php');
?>


<?php 
$status = '';

if ($_SERVER['REQUEST_METHOD']=== 'POST') {
    $productCode = $_POST['productCode'];
    $productName = $_POST['productName'];
    $productLine = $_POST['productLine'];
    $productSale = $_POST['productSale'];
    $productVendor = $_POST['productVendor'];
    $productDescription = $_POST['productDescription'];
    $quantityStock = $_POST['quantityStock'];
    $buyPrice = $_POST['buyPrice'];
    $MSRP = $_POST['MSRP'];
    
    $query = "INSERT INTO products VALUES (
        '$productCode' ,
        '$productName' ,
        '$productLine' ,
        '$productSale' ,
        '$productVendor' ,
        '$productDescription' ,
        $quantityStock ,
        $buyPrice ,
        $MSRP )";
    $result = mysqli_query(connection(),$query);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
    

}


$query = "SELECT * FROM productlines";
$productLines = mysqli_query(connection(), $query);
?>
<div class="row mx-3">
    <div class=" col-md-3 mt-5  border-end">
        <div class="list-group list-group-flush">
            <a href="index.php" class="list-group-item list-group-item-action">Lihat Data</a>
            <a href="tambahProduct.php" class="list-group-item list-group-item-action">Tambah Data</a>
        </div>
    </div>
    <div class="col">
        <h2 class="text-center my-5">TAMBAH DATA PRODUCT</h2>
        <?php
            if ($status == 'ok') {
                echo '<div class="alert alert-success mx-3" role="alert">
                Berhasil Ditambahkan
              </div>';
            }else if ($status == 'err') {
                echo '<div class="alert alert-danger mx-3" role="alert">
                Gagal Ditambahkan
              </div>';
            }
        ?>
        <form action="tambahProduct.php" method="post" class="mx-5">
            <div class="form-group mb-3">
                <label for="productCode" class="mx-2">Product Code</label>
                <input type="text" class="form-control" id="productCode" placeholder="Product Code" name="productCode">
            </div>
            <div class="form-group mb-3">
                <label for="productName" class="mx-2">Product Name</label>
                <input type="text" class="form-control" id="productName" placeholder="Product Name" name="productName">
            </div>
            <div class="form-group mb-3">
                <label for="productLine" class="mx-2">Product Line</label>
                <select class="form-control" id="productLine" name="productLine">
                    <?php while ($data = mysqli_fetch_array($productLines)) : ?>
                        <option value="<?php echo $data['productLine']; ?>"><?php echo $data['productLine']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="productSale" class="mx-2">Product Sale</label>
                <input type="text" class="form-control" id="productSale" placeholder="Product Sale" name="productSale">
            </div>
            <div class="form-group mb-3">
                <label for="productVendor" class="mx-2">Product Vendor</label>
                <input type="text" class="form-control" id="productVendor" placeholder="Product Vendor" name="productVendor">
            </div>
            <div class="form-group mb-3">
                <label for="productDescription" class="mx-2">Product Description</label>
                <textarea class="form-control" id="productDescription" name="productDescription" rows="3"></textarea>
            </div>
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col">
                        <label for="quantitiStock" class="mx-2">Quantity Stock</label>
                        <input type="number" class="form-control" id="quantitiStock" placeholder="1999" name="quantityStock" >
                    </div>
                    <div class="col">
                        <label for="buyPrice" class="mx-2">Buy Price</label>
                        <input type="number" class="form-control" id="buyPrice" placeholder="99.99" name="buyPrice" step="any">
                    </div>
                    <div class="col">
                        <label for="msrp" class="mx-2">MSRP</label>
                        <input type="number" class="form-control" id="msrp" placeholder="110.91" name="MSRP" step="any">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
</div>