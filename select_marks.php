<?php
include("conn.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Marks Management</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      padding-top: 70px; /* prevent content under navbar */
    }
    table {
      background-color: white;
    }
  </style>
</head>
<body class="bg-secondary text-white">

  <!-- Fixed Navigation Bar -->
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
          <li class="nav-item"><a class="nav-link" href="competent_ist.php">C</a></li>
          <li class="nav-item"><a class="nav-link" href="not_competent_list.php">NYC</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container mt-4">
    <h2 class="text-center mb-4">Marks Management</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
          <tr>
            <th>Mark_Id</th>
            <th>Trainee_Id</th>
            <th>Module_Id</th>
            <th>Formative_Assessment</th>
            <th>Summative_Assessment</th>
            <th>Total_Marks</th>
            <th>Result</th>
            <th colspan="2">Actions</th>
          </tr>
        </thead>
        <tbody class="text-dark text-center">
        <?php
        $slct = "SELECT * FROM marks";
        $query = mysqli_query($conn, $slct);

        if (mysqli_num_rows($query) > 0) {
          while ($row = mysqli_fetch_assoc($query)) {
            echo "
              <tr>
                <td>{$row['Mark_Id']}</td>
                <td>{$row['Trainee_id']}</td>
                <td>{$row['Module_id']}</td>
                <td>{$row['Formative_assessment']}</td>
                <td>{$row['summative_assessment']}</td>
                <td>{$row['Total_mark']}</td>
                <td>{$row['Result']}</td>
                <td><a class='btn btn-sm btn-warning' href='update_marks.php?Mark_Id={$row['Mark_Id']}'>Update</a></td>
                <td><a class='btn btn-sm btn-danger' href='delete_marks.php?Mark_Id={$row['Mark_Id']}'>Delete</a></td>
              </tr>
            ";
          }
        } else {
          echo "<tr><td colspan='9' class='text-center text-danger'>No records found.</td></tr>";
        }
        ?>
        </tbody>
      </table>
    </div>

    <div class="text-center mt-3">
      <a href="insert_marks.php" class="btn btn-success">+ Add New Marks</a>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
