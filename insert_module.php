<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Module</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Module_Name</label>
        <input type="text" name="Module_Name"><br><br>
        
        <label for="">Trade_Id</label>
        <input type="text" name="Trade_Id"><br><br>
        
        <button name="insert">Add</button>
    </form>
</body>
</html>

<?php
include("conn.php");

if(isset($_POST['insert'])){
    $Modulename = $_POST['Module_Name'];
    $Trade_id = $_POST['Trade_Id'];

    $insert = "INSERT INTO modules (Module_Name, Trade_Id) VALUES ('$Modulename', '$Trade_id')";
    $query = mysqli_query($conn, $insert);

    if($query) {
        header("location:select_module.php");
        
    } else {
        echo "Data not inserted: " . mysqli_error($conn);
    }
}
?>
