<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br><br><br>
    <center>
    <form action=""method="POST">

<label for="">trade_name</label>
<input type="text"name="Trade_name"><br><br>
<button name="insert">Add</button>
</form>
</center>
</body>
</html>
<?php
include("conn.php");

if(isset($_POST['insert'])){

    $trade_name=$_POST['Trade_name'];
     $sql = "INSERT INTO trades (Trade_name) VALUES('$trade_name')";
         $query = mysqli_query($conn, $sql);

         if($query) {
            header("location:select_trade.php");
         }

         else

         {
           die(mysqli_error($conn));
         }
}
?>
