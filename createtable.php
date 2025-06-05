<?php

include("conn.php")

$table= "CREATE TABLE Modules (
    Trainee_Id INT(11)AUTO_INCREMENT PRIMARY KEY,
    FirstNames VARCHAR(100) NOT NULL,
    LastName VARCHAR(100) NOT NULL,
    Gender VARCHAR(40) NOT NULL,
    Trade_Id INT(11),
    FOREIGN KEY (Trade_Id) REFERENCES Trades(Trade_Id)
)";

$sql=mysqli_query($conn, $table);

{

    echo "Table  created successfully";

}
 else 
{
    echo "Error creating table: " 
}
?>