<?php
include("conn.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Trainee List</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      padding-top: 70px;
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
          <li class="nav-item"><a class="nav-link active" href="select_trainee.php">Trainee</a></li>
          <li class="nav-item"><a class="nav-link" href="select_module.php">Module</a></li>
          <li class="nav-item"><a class="nav-link" href="select_trade.php">Trade</a></li>
          <li class="nav-item"><a class="nav-link" href="select_marks.php">Marks</a></li>
          <li class="nav-item"><a class="nav-link" href="competent_ist.php">C</a></li>
          <li class="nav-item"><a class="nav-link" href="not_competent_list.php">NYC</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container mt-4">
    <h2 class="text-center mb-4">Trainee List</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
          <tr>
            <th>Trainee ID</th>
            <th>First Names</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Trade ID</th>
            <th colspan="2">Actions</th>
          </tr>
        </thead>
        <tbody class="text-dark bg-light">
          <?php
            $slct = "SELECT * FROM trainees";
            $query = mysqli_query($conn, $slct);

            if (mysqli_num_rows($query) > 0) {
              while ($row = mysqli_fetch_assoc($query)) {
                echo "
                  <tr>
                    <td>{$row['Trainee_Id']}</td>
                    <td>{$row['FirstNames']}</td>
                    <td>{$row['LastName']}</td>
                    <td>{$row['Gender']}</td>
                    <td>{$row['Trade_Id']}</td>
                    <td><a class='btn btn-sm btn-warning' href='update_trainee.php?Trainee_Id={$row['Trainee_Id']}'>Update</a></td>
                    <td><a class='btn btn-sm btn-danger' href='delete_trainee.php?Trainee_Id={$row['Trainee_Id']}'>Delete</a></td>
                  </tr>
                ";
              }
            } else {
              echo "<tr><td colspan='7' class='text-danger'>No trainees found.</td></tr>";
            }
          ?>
        </tbody>
      </table>
    </div>
    <div class="text-end mt-3">
      <a href="insert_trainee.php" class="btn btn-success">Add New Trainee</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
