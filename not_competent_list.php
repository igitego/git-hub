<?php
include("conn.php");
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Not Yet Competent Trainees</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <style>
    body {
      padding-top: 70px;
    }
    table {
      background-color: #fff;
    }
    .table th, .table td {
      vertical-align: middle;
    }
    a {
      text-decoration: none;
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
          <li class="nav-item"><a class="nav-link" href="select_marks.php">Marks</a></li>
          <li class="nav-item"><a class="nav-link" href="competent_ist.php">C</a></li>
          <li class="nav-item"><a class="nav-link active" href="not_competent_list.php">NYC</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content -->
  <div class="container mt-4">
    <div class="card shadow">
      <div class="card-body bg-white rounded">
        <h2 class="text-center text-dark mb-4">
          <i class="bi bi-exclamation-circle-fill text-warning"></i> Not Yet Competent Trainees
        </h2>
        <div class="table-responsive">
          <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
              <tr>
                <th>Trainee ID</th>
                <th>Trainee Name</th>
                <th>Module ID</th>
                <th>Module Name</th>
                <th>Result</th>
              </tr>
            </thead>
            <tbody class="text-dark">
              <?php
              $sql = "SELECT m.Trainee_id, 
                             CONCAT(t.FirstNames, ' ', t.LastName) AS Trainee_name,
                             m.Module_id,
                             md.Module_Name,
                             m.Total_mark,
                             m.Result
                      FROM marks m 
                      JOIN modules md ON m.Module_id = md.Module_Id
                      JOIN trainees t ON m.Trainee_id = t.Trainee_Id
                      WHERE m.Total_mark < 70";

              $result = mysqli_query($conn, $sql);

              if (!$result) {
                die(mysqli_error($conn));
              }

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "
                    <tr>
                      <td>{$row['Trainee_id']}</td>
                      <td>{$row['Trainee_name']}</td>
                      <td>{$row['Module_id']}</td>
                      <td>{$row['Module_Name']}</td>
                      <td><span class='badge bg-danger'>{$row['Result']}</span></td>
                    </tr>
                  ";
                }
              } else {
                echo "<tr><td colspan='5' class='text-danger fw-bold'>No trainees found below 70%.</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>

        <!-- Back Button -->
        <div class="text-center mt-4">
          <a href="select_marks.php" class="btn btn-outline-dark bg-light text-dark fw-semibold">
            <i class="bi bi-arrow-left-circle"></i> Back to Marks
          </a>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
