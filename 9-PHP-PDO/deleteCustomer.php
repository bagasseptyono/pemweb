<?php 

  include ('conn.php'); 

  $status = '';
  
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['customerNumber'])) {
          $customerNumber = $_GET['customerNumber'];
          $query = $conn->prepare("DELETE FROM customers WHERE customerNumber = :customerNumber ");
          $query->bindParam(':customerNumber',$customerNumber);

          if ($query->execute()) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }

          header('Location: customer.php?status='.$status);
      }  
  }