<?php
include("conn.php");

if (isset($_POST['insert'])) {
    $trade_name = $_POST['Trade_name'];
    $sql = "INSERT INTO trades (Trade_name) VALUES('$trade_name')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("location:select_trade.php");
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
  <title>Insert Trade</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body class="bg-secondary text-white d-flex justify-content-center align-items-center" style="min-height: 100vh;">

  <form action="" method="POST" class="bg-light text-dark p-4 rounded shadow" style="min-width: 300px;">
    <div class="mb-3">
      <label class="form-label">Trade Name</label>
      <input type="text" name="Trade_name" class="form-control" required>
    </div>

        <div class="d-grid">
    <button name="insert" class="btn btn-dark w-100">Add</button>
     <a href="select_trade.php" class="btn btn-danger mt-3">Back</a>
     </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
