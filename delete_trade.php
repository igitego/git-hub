<?php
   include('conn.php');
   $Trade_Id = $_GET['trade_Id'];
   $sql = "DELETE FROM trades WHERE trade_Id = '$Trade_Id'";
   $result = mysqli_query($conn,$sql);

   if ($result) {
    header("location:select_trade.php");
   }

?>
       
