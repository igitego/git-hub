
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
            <th>Trainee_Id</th>
            <th>FirstNames</th>
            <th>LastName</th>
            <th>Gender</th>
            <th>Trade_Id</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
        include("conn.php");
        $slct="SELECT * FROM trainees";
        $query=mysqli_query($conn,$slct);
        
        if (mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)) {
                echo 
                  "
                  <tr>
                     <td>{$row['Trainee_Id']}</td>
                     <td>{$row['FirstNames']}</td>
                      <td>{$row['LastName']}</td>
                       <td>{$row['Gender']}</td>
                     <td>{$row['Trade_Id']}</td>
                     <td><a href='update_trainee.php?Trainee_Id={$row['Trainee_Id']}'>Update</a></td>
                     <td><a href='delete_trainee.php?Trainee_Id={$row['Trainee_Id']}'>Delete</a></td>
                  </tr>
                  ";
            }
        }



?>

    </table>
    <a href="insert_trainee.php">New Trainee</a>
</body>
</html>
<?php

