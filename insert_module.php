<?php
include("conn.php");

if (isset($_POST['insert'])) {
    $Modulename = $_POST['Module_Name'];
    $Trade_id = $_POST['Trade_Id'];

    $insert = "INSERT INTO modules (Module_Name, Trade_Id) VALUES ('$Modulename', '$Trade_id')";
    $query = mysqli_query($conn, $insert);

    if ($query) {
        header("location:select_module.php");
    } else {
        echo "Data not inserted: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Insert Module</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body class="bg-secondary text-white d-flex justify-content-center align-items-center" style="min-height: 100vh;">

  <form action="" method="post" class="bg-light text-dark p-4 rounded shadow" style="min-width: 300px;">
    <div class="mb-3">
      <label class="form-label">Module Name</label>
      <input type="text" name="Module_Name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Trade ID</label>
      <input type="text" name="Trade_Id" class="form-control" required>
    </div>
    <div class="d-grid">
    <button name="insert" class="btn btn-dark w-100">Add</button>
     <a href="select_module.php" class="btn btn-danger mt-3">Back</a>
     </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
