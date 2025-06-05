<?php
       include("conn.php");
       $Trainee_Id = $_GET['Trainee_Id'];
       $sql = "DELETE FROM trainees WHERE Trainee_Id = '$Trainee_Id'";
       $query = mysqli_query($conn, $sql);
       
       if ($sql) {
        header("location:select_trainee.php");
       }
?>