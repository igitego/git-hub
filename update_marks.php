<?php
   include("conn.php");
   if (isset($_GET['Mark_Id'])) {
    $Mark_Id = $_GET['Mark_Id'];
    $sql = "SELECT * FROM marks WHERE Mark_Id = '$Mark_Id'";
    $query = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
    } else {
        echo mysqli_error($conn);
    }
   }

   if (isset($_POST['update'])) {
        $TraineeID = $_POST['Trainee_id'];
        $Mark_Id = $_POST['Mark_Id'];
        $ModuleID = $_POST['Module_id'];
        $summative = $_POST['summative_assessment'];
        $Formative = $_POST['Formative_assessment'];

        $total = $summative + $Formative;
        $result = ($total) >= 70 ? "Competent" : "Not yet competent";

        $sql = "UPDATE marks SET 
              Trainee_id = '$TraineeID', 
              Module_id = '$ModuleID', 
              summative_assessment = '$summative', 
              Formative_assessment = '$Formative',
              Result = '$result', 
              Total_mark = '$total' 
              WHERE Mark_Id = '$Mark_Id'";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            header("location:select_marks.php");
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
  <title>Update Marks</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body class="bg-secondary text-white d-flex justify-content-center align-items-center" style="min-height: 100vh;">

  <form action="" method="post" class="bg-light text-dark p-4 rounded shadow" style="min-width: 300px;">
    <input type="hidden" name="Mark_Id" value="<?php echo $Mark_Id; ?>">

    <div class="mb-3">
      <label class="form-label">Trainee ID</label>
      <input type="number" name="Trainee_id" value="<?php echo $row['Trainee_id']; ?>" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Module ID</label>
      <input type="number" name="Module_id" value="<?php echo $row['Module_id']; ?>" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Summative /50</label>
      <input type="number" name="summative_assessment" value="<?php echo $row['summative_assessment']; ?>" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Formative /50</label>
      <input type="number" name="Formative_assessment" value="<?php echo $row['Formative_assessment']; ?>" class="form-control" required>
    </div>

                <div class="d-grid">
    <button name="update" class="btn btn-dark w-100">Update</button>
     <a href="select_module.php" class="btn btn-danger mt-3">Back</a>
     </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
