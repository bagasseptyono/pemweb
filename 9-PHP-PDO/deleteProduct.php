<?php 

  include ('conn.php'); 

  $status = '';
  
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['productCode'])) {
          $productCode = $_GET['productCode'];
          $query = $conn->prepare("DELETE FROM products WHERE productCode = :productCode ");
          $query->bindParam(':productCode',$productCode);

          if ($query->execute()) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }

          header('Location: index.php?status='.$status);
      }  
  }