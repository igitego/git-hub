<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="2">
        <tr>
            <th>Trainee Id</th>
            <th>Trainee Name</th>
            <th>Module Id</th>
            <th>Module Name</th>
            <th>Decision</th>
        </tr>

        <tbody>
            <?php

              include("conn.php");
              
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
                  $result  = mysqli_query($conn, $sql);
                  
                  if (!$result) {
                    die(mysqli_error($conn));
                  }
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo 
                        "
                        <tr>
                           <td>{$row['Trainee_id']}</td>
                           <td>{$row['Trainee_name']}</td>
                           <td>{$row['Module_id']}</td>
                           <td>{$row['Module_Name']}</td>
                           <td>{$row['Result']}</td>
                        </tr>
                        ";
                    }
                  } else {
                    echo "<tr><td colspan='5'>No Competent trainee in table</td>";
                  }
            ?>
        </tbody>
    </table>
</body>
</html>