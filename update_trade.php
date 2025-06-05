<?php

   include('conn.php');
   if (isset($_GET['trade_Id'])) {

         $trade_Id = $_GET['trade_Id'];

         $sql = "SELECT * FROM trades WHERE trade_Id = '$trade_Id'";
         $query = mysqli_query($conn, $sql);

         if (mysqli_num_rows($query) > 0) {
            $result = mysqli_fetch_assoc($query);
         } else {
            die(mysqli_error($conn));
         }
  }


  if (isset($_POST['update'])) {
     $trade_id=$_POST['Trade_Id'];
     $trade_name=$_POST['Trade_name'];
     $sql = "UPDATE trades SET Trade_name = '$trade_name' WHERE Trade_Id = '$trade_Id'";
     $query = mysqli_query($conn, $sql);

     if ($query) {
        header("location:select_trade.php");
     }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=""method="POST">

<label for="">trade_id</label>
<input type="text"name="trade_Id" value="<?php echo $result['trade_Id']?>"><br><br>

<label for="">trade_name</label>
<input type="text"name="Trade_name" value="<?php echo $result['Trade_name']?>"><br><br>
<button name="update">Update</button>
</form>
</body>
</html>