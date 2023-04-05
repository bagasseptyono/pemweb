<?php 

  include ('conn.php'); 

  $status = '';
  $result = '';

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id'])) {
         
          $id_kondektur = $_GET['id'];
          $query = "DELETE FROM kondektur WHERE id_kondektur = '$id_kondektur'"; 

         
          $result = mysqli_query(connection(),$query);

          if ($result) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }

         
          header('Location: kondektur.php?status='.$status);
      }  
  }
  ?>