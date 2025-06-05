<?php

    include('conn.php');
   if (isset($_GET['Module_Id'])) {
    
         $Module_Id = $_GET['Module_Id'];
         $sql = "SELECT * FROM modules WHERE Module_Id = '$Module_Id'";
         $query = mysqli_query($conn, $sql);

         if (mysqli_num_rows($query)) {
            $row = mysqli_fetch_assoc($query);
         } else {
            die(mysqli_error($conn));
         }
  }

  // handle update logic
  
   if (isset($_POST['update'])) {
    
    $Modulename = $_POST['Module_Name'];
    $Trade_id = $_POST['Trade_Id'];
    $Module_Id = $_POST['Module_Id'];

    $sql = "UPDATE modules SET Module_Name = '$Modulename', Trade_Id = '$Trade_id'  WHERE Module_Id = '$Module_Id'";
    $RESULT = mysqli_query($conn, $sql);

    if ($RESULT) {
        header("location:select_module.php");
    } else {
        die(mysqli_error($conn));
    }

   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Module</title>
</head>
<body>
    <form method="post">
        <label for="">Module_Id</label>
        <input type="text" name="Module_Id" value="<?php echo $row['Module_Id']?>" readonly><br><br>
        
        <label for="">Module_Name</label>
        <input type="text" name="Module_Name" value="<?php echo $row['Module_Name']?>"><br><br>
        
        <label for="">Trade_Id</label>
        <input type="text" name="Trade_Id" value="<?php echo $row['Trade_Id']?>"><br><br>
        
        <button name="update">Update</button>

    </form>
</body>
</html>