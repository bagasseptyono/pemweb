<?php 

  include ('conn.php'); 

  $status = '';
  $result = '';

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id'])) {
         
          $id_trans_upn = $_GET['id'];
          $query = "DELETE FROM trans_upn WHERE id_trans_upn = '$id_trans_upn'"; 

         
          $result = mysqli_query(connection(),$query);

          if ($result) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }
          header('Location: transupn.php?status='.$status);
      }  
  }
  ?>