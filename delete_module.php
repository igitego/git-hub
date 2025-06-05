<?php
      include("conn.php");
      
      $Module_Id = $_GET['Module_Id'];
      $sql = "DELETE FROM modules WHERE Module_Id = '$Module_Id'";
      $result = mysqli_query($conn, $sql);
     if ($result) {
        header("location:select_module.php");
     }
?>