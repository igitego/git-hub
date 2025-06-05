<?php

   include('conn.php');
   if (isset($_GET['Trainee_Id'])) {
    
         $Trainee_Id = $_GET['Trainee_Id'];
         $sql = "SELECT * FROM trainees WHERE Trainee_Id = '$Trainee_Id'";
         $query = mysqli_query($conn, $sql);

         if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
         } else {
            die(mysqli_error($conn));
         }
  }

  if (isset($_POST['update'])) {
    
    $Fname=$_POST['FirstNames'];
    $lname=$_POST['LastName'];
    $gender=$_POST['Gender'];
    $trade_id=$_POST['Trade_Id'];
    $Trainee_Id=$_POST['Trainee_Id'];

    $sql = "UPDATE trainees SET FirstNames='$Fname', LastName='$lname', Gender='$gender', Trade_Id='$trade_id'
            WHERE Trainee_Id = '$Trainee_Id'";
      $result = mysqli_query($conn, $sql);
      
      if ($result) {
        header("location:select_trainee.php");
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
    <title>Document</title>
</head>
<body>
<form action=""method="POST">
<label for=""> Trainee Id</label>
<input type="text"name="Trainee_Id" value="<?php echo $row['Trainee_Id']?>" readonly><br><br>
<label for=""> FirstNames</label>
<input type="text"name="FirstNames" value="<?php echo $row['FirstNames']?>"><br><br>
<label for="">lastNames</label>
<input type="text"name="LastName" value="<?php echo $row['LastName']?>"><br><br>
<label for="">gender</label>
<input type="text"name="Gender" value="<?php echo $row['Gender']?>"><br><br>
<label for="">Trade_Id</label>
<input type="text"name="Trade_Id" value="<?php echo $row['Trade_Id']?>"><br><br>
<button name="update">Update</button>
    </form>
</body>
</html>