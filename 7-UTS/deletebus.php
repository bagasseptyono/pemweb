<?php 

  include ('conn.php'); 

  $status = '';
  $result = '';

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id'])) {
         
          $id_bus = $_GET['id'];
          $query = "DELETE FROM bus WHERE id_bus = '$id_bus'"; 

         
          $result = mysqli_query(connection(),$query);

          if ($result) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }
          header('Location: bus.php?status='.$status);
      }  
  }
  ?>