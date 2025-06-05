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
          <li class="nav-item"><a class="nav-link active" href="select_marks.php">Marks</a></li>
          <li class="nav-item"><a class="nav-link" href="competent_ist.php">C</a></li>
          <li class="nav-item"><a class="nav-link" href="not_competent_list.php">NYC</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container mt-4">
    <div class="card shadow">
      <div class="card-body bg-white rounded">
        <h2 class="text-center mb-4 text-dark">📊 Marks Management</h2>

        <div class="table-responsive">
          <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
              <tr>
                <th>Mark ID</th>
                <th>Trainee ID</th>
                <th>Module ID</th>
                <th>Formative</th>
                <th>Summative</th>
                <th>Total</th>
                <th>Result</th>
                <th colspan="2">Actions</th>
              </tr>
            </thead>
            <tbody class="text-dark">
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
                      <td>
                        <a class='btn btn-sm btn-warning' href='update_marks.php?Mark_Id={$row['Mark_Id']}'>
                          <i class='bi bi-pencil-square'></i> Update
                        </a>
                      </td>
                      <td>
                        <a class='btn btn-sm btn-danger' href='delete_marks.php?Mark_Id={$row['Mark_Id']}'>
                          <i class='bi bi-trash'></i> Delete
                        </a>
                      </td>
                    </tr>
                  ";
                }
              } else {
                echo "<tr><td colspan='9' class='text-danger fw-bold'>No records found.</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>

        <!-- Action Buttons -->
        <div class="row justify-content-center mt-4">
          <div class="col-md-6 col-lg-4 text-center">
            <a href="insert_marks.php" class="btn btn-success btn-lg fw-bold w-100 mb-3">
              <i class="bi bi-plus-circle"></i> Add New Marks
            </a>
            <a href="home.php" class="btn btn-outline-dark bg-light text-dark fw-semibold w-100">
              <i class="bi bi-arrow-left-circle"></i> Back to Home
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
