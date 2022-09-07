<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "trackifydb";

//connection

$con = mysqli_connect("$host", "$username", "$password","$database");

// check Connection
if(!$con)
{
   header("Location: ../errors/db.php");
   die();
}
// else{
//     echo "Database Connected.!";
// }
?>