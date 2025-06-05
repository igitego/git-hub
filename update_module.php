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

    if (isset($_POST['update'])) {
        $Modulename = $_POST['Module_Name'];
        $Trade_id = $_POST['Trade_Id'];
        $Module_Id = $_POST['Module_Id'];

        $sql = "UPDATE modules SET Module_Name = '$Modulename', Trade_Id = '$Trade_id' WHERE Module_Id = '$Module_Id'";
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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Update Module</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body class="bg-secondary text-white d-flex justify-content-center align-items-center" style="min-height: 100vh;">

  <form method="post" class="bg-light text-dark p-4 rounded shadow" style="min-width: 300px;">
    <div class="mb-3">
      <label class="form-label">Module ID</label>
      <input type="text" name="Module_Id" value="<?php echo $row['Module_Id']?>" class="form-control" readonly>
    </div>

    <div class="mb-3">
      <label class="form-label">Module Name</label>
      <input type="text" name="Module_Name" value="<?php echo $row['Module_Name']?>" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Trade ID</label>
      <input type="text" name="Trade_Id" value="<?php echo $row['Trade_Id']?>" class="form-control" required>
    </div>

            <div class="d-grid">
    <button name="update" class="btn btn-dark w-100">Update</button>
     <a href="select_module.php" class="btn btn-danger mt-3">Back</a>
     </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
