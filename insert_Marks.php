<?php
     include("conn.php");
     
     if(isset($_POST['insert'])) {
        
        $TraineeID = $_POST['Trainee_id'];
        $ModuleID = $_POST['Module_id'];
        $summative = $_POST['summative_assessment'];
        $Formative = $_POST['Formative_assessment'];

        $total = $summative + $Formative;
        $result = ($total) >= 70 ? "Competent" : "Not yet competent";


        $sql = "INSERT INTO marks(Trainee_id, Module_id, summative_assessment, Formative_assessment, Total_mark, Result) 
                VALUES('$TraineeID', '$ModuleID', '$summative', '$Formative', '$total', '$result')";
         $query = mysqli_query($conn, $sql);

         if ($query) {
            header("location:select_marks.php");
         } else {
            die("ERROR:" . mysqli_error($conn));
         }

    
            }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Marks</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Trainee id</label>
        <input type="number" name="Trainee_id" > <br>
        <label for="">Module id</label>
        <input type="number" name="Module_id" > <br>
        <label for="">Summative /50</label>
        <input type="number" name="summative_assessment" > <br>
        <label for="">Formative /50</label>
        <input type="number" name="Formative_assessment" > <br>

        <button name="insert">Add</button>

    </form>
</body>
</html>