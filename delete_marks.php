<?php

      include("conn.php");
      $Mark_Id = $_GET['Mark_Id'];
      $sql = "DELETE FROM marks WHERE Mark_Id = '$Mark_Id'";
      $query = mysqli_query($conn, $sql);
      if ($query) {
        header("location:select_marks.php");
      }
?>