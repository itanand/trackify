<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "trackifydb";

//connection

$con = mysqli_connect("$host", "$username", "$password","$database");

if(mysqli_connect_error()){
    echo "<script>alert('cannot connect to the database');</script>";
    exit();
}

?>