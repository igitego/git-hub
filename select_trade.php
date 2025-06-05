
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="2" cellpadding="5" cellspacing="2">
        <tr>
            <th>trade_Id</th>
            <th>Trade_name</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
        include("conn.php");
        $slct="SELECT * FROM trades";
        $query=mysqli_query($conn,$slct);
        
        if (mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)) {
                echo 
                  "
                  <tr>
                     <td>{$row['trade_Id']}</td>
                     <td>{$row['Trade_name']}</td>
                     <td><a href='update_trade.php?trade_Id={$row['trade_Id']}'>Update<a/></td>
                     <td><a href='delete_trade.php?trade_Id={$row['trade_Id']}'>Delete<a/></td>
                  </tr>
                  ";
            }
        }



?>
        
    </table>
    <a href="insert_trade.php">New Trade</a>
</body>
</html>


