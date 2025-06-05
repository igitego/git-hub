<?php
include("conn.php");
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
}

// Fetch mark data for the given Mark_Id
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

// Fetch trainees and modules
$trainees = mysqli_query($conn, "SELECT Trainee_Id, CONCAT(FirstNames, ' ', LastName) AS FullName FROM trainees");
$modules = mysqli_query($conn, "SELECT Module_Id, Module_name FROM modules");

// Handle form submission
if (isset($_POST['update'])) {
    $TraineeID = $_POST['Trainee_id'];
    $Mark_Id = $_POST['Mark_Id'];
    $ModuleID = $_POST['Module_id'];
    $summative = $_POST['summative_assessment'];
    $Formative = $_POST['Formative_assessment'];

    $total = $summative + $Formative;
    $result = ($total >= 70) ? "Competent" : "Not yet competent";

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

  <form action="" method="post" class="bg-light text-dark p-4 rounded shadow" style="min-width: 350px;">
    <input type="hidden" name="Mark_Id" value="<?php echo $Mark_Id; ?>">

    <!-- Trainee Dropdown -->
    <div class="mb-3">
      <label class="form-label">Trainee Name</label>
      <select name="Trainee_id" class="form-control" required>
        <option value="">Select Trainee</option>
        <?php while ($trainee = mysqli_fetch_assoc($trainees)) { ?>
          <option value="<?php echo $trainee['Trainee_Id']; ?>" 
            <?php if ($row['Trainee_id'] == $trainee['Trainee_Id']) echo "selected"; ?>>
            <?php echo $trainee['FullName']; ?>
          </option>
        <?php } ?>
      </select>
    </div>

    <!-- Module Dropdown -->
    <div class="mb-3">
      <label class="form-label">Module Name</label>
      <select name="Module_id" class="form-control" required>
        <option value="">Select Module</option>
        <?php while ($module = mysqli_fetch_assoc($modules)) { ?>
          <option value="<?php echo $module['Module_Id']; ?>" 
            <?php if ($row['Module_id'] == $module['Module_Id']) echo "selected"; ?>>
            <?php echo $module['Module_name']; ?>
          </option>
        <?php } ?>
      </select>
    </div>

    <!-- Summative -->
    <div class="mb-3">
      <label class="form-label">Summative /50</label>
      <input type="number" name="summative_assessment" value="<?php echo $row['summative_assessment']; ?>" class="form-control" required max="50" min="0">
    </div>

    <!-- Formative -->
    <div class="mb-3">
      <label class="form-label">Formative /50</label>
      <input type="number" name="Formative_assessment" value="<?php echo $row['Formative_assessment']; ?>" class="form-control" required max="50" min="0">
    </div>

    <!-- Buttons -->
    <div class="d-grid">
      <button name="update" class="btn btn-dark w-100">Update</button>
      <a href="select_marks.php" class="btn btn-danger mt-3">Back</a>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
