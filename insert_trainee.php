
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br><br><br><br>
    <center>
    <form action=""method="POST">
<label for=""> FirstNames</label>
<input type="text"name="FirstNames"><br><br>
<label for="">lastNames</label>
<input type="text"name="LastName"><br><br>
<label for="">gender</label>
<input type="text"name="Gender"><br><br>
<label for="">Trade_Id</label>
<input type="text"name="Trade_Id"><br><br>
<button name="insert">Add</button>
    </form>
    </center>
</body>
</html>
<?php

include("conn.php");
if(isset($_POST['insert']))
{
    $Fname=$_POST['FirstNames'];
    $lname=$_POST['LastName'];
    $gender=$_POST['Gender'];
    $trade_id=$_POST['Trade_Id'];


    $INSERT="INSERT INTO trainees(FirstNames,LastName,Gender,Trade_Id) 
    VALUES('$Fname','$lname','$gender','$trade_id')";
    $sql=mysqli_query($conn,$INSERT);
    if($sql){
        header("location:select_trainee.php");
    }
    else{
        echo"data not inserted";
    }
}







?>

