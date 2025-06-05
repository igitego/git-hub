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
    $Fname = $_POST['FirstNames'];
    $lname = $_POST['LastName'];
    $gender = $_POST['Gender'];
    $trade_id = $_POST['Trade_Id'];
    $Trainee_Id = $_POST['Trainee_Id'];

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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Update Trainee</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body class="bg-secondary">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form method="POST" class="p-4 border rounded shadow bg-light">
          <div class="mb-3">
            <label class="form-label text-dark">Trainee Id</label>
            <input type="text" name="Trainee_Id" value="<?php echo $row['Trainee_Id']?>" class="form-control" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label text-dark">First Name</label>
            <input type="text" name="FirstNames" value="<?php echo $row['FirstNames']?>" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label text-dark">Last Name</label>
            <input type="text" name="LastName" value="<?php echo $row['LastName']?>" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label text-dark">Gender</label>
            <input type="text" name="Gender" value="<?php echo $row['Gender']?>" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label text-dark">Trade Id</label>
            <input type="text" name="Trade_Id" value="<?php echo $row['Trade_Id']?>" class="form-control">
          </div>
          <button name="update" class="btn btn-secondary w-100">Update</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
