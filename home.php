<?php
include("conn.php");
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px; /* Prevent content from being hidden under fixed navbar */
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
                    <li class="nav-item"><a class="nav-link" href="select_marks.php">Marks</a></li>
                    <li class="nav-item"><a class="nav-link" href="competent_ist.php">C</a></li>
                    <li class="nav-item"><a class="nav-link" href="not_competent_list.php">NYC</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container text-center">
        <h1 class="mt-5">Welcome <?php echo $_SESSION['username']; ?> to GIKONKO TSS Marks Management System</h1>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
