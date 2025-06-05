<?php
include('conn.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
  }
if (isset($_GET['trade_Id'])) {
    $trade_Id = $_GET['trade_Id'];
    $sql = "SELECT * FROM trades WHERE trade_Id = '$trade_Id'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $result = mysqli_fetch_assoc($query);
    } else {
        die(mysqli_error($conn));
    }
}

if (isset($_POST['update'])) {
    $trade_id = $_POST['Trade_Id'];
    $trade_name = $_POST['Trade_name'];
    $sql = "UPDATE trades SET Trade_name = '$trade_name' WHERE Trade_Id = '$trade_Id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        header("location:select_trade.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Update Trade</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body class="bg-secondary">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form method="POST" class="p-4 border rounded shadow bg-light">
          <div class="mb-3">
            <label class="form-label text-dark">Trade ID</label>
            <input type="text" name="trade_Id" value="<?php echo $result['trade_Id'] ?>" class="form-control" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label text-dark">Trade Name</label>
            <input type="text" name="Trade_name" value="<?php echo $result['Trade_name'] ?>" class="form-control">
          </div>
                      <div class="d-grid">
    <button name="update" class="btn btn-dark w-100">Update</button>
     <a href="select_trade.php" class="btn btn-danger mt-3">Back</a>
     </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
