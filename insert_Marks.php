<?php
include("conn.php");

session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
}

// Fetch dropdown data
$trainees = mysqli_query($conn, "SELECT Trainee_Id, CONCAT(FirstNames, ' ', LastName) AS FullName FROM trainees");
$modules = mysqli_query($conn, "SELECT Module_Id, Module_name FROM modules");

if (isset($_POST['insert'])) {
    $TraineeID = $_POST['Trainee_id'];
    $ModuleID = $_POST['Module_id'];
    $summative = $_POST['summative_assessment'];
    $Formative = $_POST['Formative_assessment'];

    $total = $summative + $Formative;
    $result = ($total >= 70) ? "Competent" : "Not yet competent";

    $sql = "INSERT INTO marks(Trainee_id, Module_id, summative_assessment, Formative_assessment, Total_mark, Result) 
            VALUES('$TraineeID', '$ModuleID', '$summative', '$Formative', '$total', '$result')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("location:select_marks.php");
    } else {
        die("ERROR: " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>New Marks</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      padding-top: 70px;
    }
  </style>
</head>
<body class="bg-secondary text-white">

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">GIKONKO TSS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="select_trainee.php">Trainee</a></li>
          <li class="nav-item"><a class="nav-link" href="select_module.php">Module</a></li>
          <li class="nav-item"><a class="nav-link" href="select_trade.php">Trade</a></li>
          <li class="nav-item"><a class="nav-link active" href="select_marks.php">Marks</a></li>
          <li class="nav-item"><a class="nav-link" href="competent_list.php">C</a></li>
          <li class="nav-item"><a class="nav-link" href="not_competent_list.php">NYC</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Form Section -->
  <div class="container mt-4">
    <div class="card mx-auto shadow" style="max-width: 500px;">
      <div class="card-header bg-dark text-white text-center">
        <h4>Add New Marks</h4>
      </div>
      <div class="card-body bg-light text-dark">
        <form action="" method="post">

          <!-- Trainee Dropdown -->
          <div class="mb-3">
            <label for="Trainee_name" class="form-label">Select Trainee</label>
            <select id="traineeSelect" class="form-control" required onchange="setTraineeId(this)">
              <option value="">Choose trainee</option>
              <?php while ($trainee = mysqli_fetch_assoc($trainees)) { ?>
                <option value="<?php echo $trainee['Trainee_Id']; ?>">
                  <?php echo $trainee['FullName']; ?>
                </option>
              <?php } ?>
            </select>
          </div>

          <!-- Hidden Trainee ID field -->
          <input type="hidden" name="Trainee_id" id="Trainee_id" required>

          <!-- Module Dropdown -->
          <div class="mb-3">
            <label for="Module_id" class="form-label">Select Module</label>
            <select name="Module_id" class="form-control" required>
              <option value="">Choose module</option>
              <?php while ($module = mysqli_fetch_assoc($modules)) { ?>
                <option value="<?php echo $module['Module_Id']; ?>">
                  <?php echo $module['Module_name']; ?>
                </option>
              <?php } ?>
            </select>
          </div>

          <!-- Summative -->
          <div class="mb-3">
            <label for="summative_assessment" class="form-label">Summative /50</label>
            <input type="number" name="summative_assessment" class="form-control" required max="50" min="0">
          </div>

          <!-- Formative -->
          <div class="mb-3">
            <label for="Formative_assessment" class="form-label">Formative /50</label>
            <input type="number" name="Formative_assessment" class="form-control" required max="50" min="0">
          </div>

          <!-- Submit -->
          <div class="d-grid">
            <button name="insert" class="btn btn-dark mb-2">Add</button>
            <a href="select_marks.php" class="btn btn-danger mt-3">Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Script to auto-fill hidden field -->
  <script>
    function setTraineeId(select) {
      document.getElementById('Trainee_id').value = select.value;
    }
  </script>
</body>
</html>
