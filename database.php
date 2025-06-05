<?php
include("conn.php");
$db = "CREATE DATABASE GIKONKO_TSS";
$sql=mysqli_query($conn, $db);

if ($sql) 
{

    echo "Database created successfully";
}
else
 {
    echo "Error creating database";
}







?>