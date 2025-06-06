<?php
include("conn.php");
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
}

// Fetch all trades to populate the dropdown
$tradeQuery = "SELECT trade_id, trade_name FROM trades";
$tradeResult = mysqli_query($conn, $tradeQuery);

if (isset($_POST['insert'])) {
    $Fname = $_POST['FirstNames'];
    $lname = $_POST['LastName'];
    $gender = $_POST['Gender'];
    $trade_id = $_POST['Trade_Id'];

    $INSERT = "INSERT INTO trainees (FirstNames, LastName, Gender, Trade_Id) 
               VALUES ('$Fname', '$lname', '$gender', '$trade_id')";
    $sql = mysqli_query($conn, $INSERT);

    if ($sql) {
        header("location:select_trainee.php");
        exit();
    } else {
        echo "Data not inserted: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Insert Trainee</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body class="bg-secondary text-white d-flex justify-content-center align-items-center" style="min-height: 100vh;">

  <form action="" method="POST" class="bg-light text-dark p-4 rounded shadow" style="min-width: 300px;">
    <h4 class="text-center mb-4">Insert Trainee</h4>

    <div class="mb-3">
      <label class="form-label">First Names</label>
      <input type="text" name="FirstNames" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Last Name</label>
      <input type="text" name="LastName" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Gender</label>
      <input type="text" name="Gender" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Select Trade</label>
      <select name="Trade_Id" class="form-select" required>
        <option value="" disabled selected>Select Trade</option>
        <?php while ($row = mysqli_fetch_assoc($tradeResult)) { ?>
          <option value="<?php echo $row['trade_id']; ?>">
            <?php echo htmlspecialchars($row['trade_name']); ?>
          </option>
        <?php } ?>
      </select>
    </div>

    <div class="d-grid">
      <button name="insert" class="btn btn-dark w-100">Add</button>
      <a href="select_trade.php" class="btn btn-danger mt-3">Back</a>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
