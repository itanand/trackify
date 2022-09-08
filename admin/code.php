<?php
session_start();
include('config/dbconn.php');

if(isset($_POST['addUser']))
{
   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $city = $_POST['city'];
   $password = $_POST['password'];

   $user_query = "INSERT INTO users( name, email, phone, city, password) VALUES ( '$name', '$email', '$phone', '$city', '$password')";
   $user_query_run = mysqli_query($con, $user_query);

   if($user_query_run)
   {
       $_SESSION['status'] = "User Added Successfully";
       header("Location: register.php");
   }
 else
   {
    $_SESSION['status'] = "User Registration Failed";
    header("Location: register.php");
   }
}


if(isset($_POST['updateUser']))
{
  $user_id = $_POST['user_id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];
  $password = $_POST['password'];

  $query = "UPDATE users SET name='$name', email='$email', phone='$phone', city='$city', password='$password' WHERE id='$user_id' ";
  $query_run = mysqli_query($con, $query);

  if($query_run)
   {
       $_SESSION['status'] = "User Updated Successfully";
       header("Location: register.php");
   }
 else
   {
    $_SESSION['status'] = "User Updation Failed";
    header("Location: register.php");
   }
}


if(isset($_POST['DeleteUserbtn']))
{
  $userid= $_POST['delete_id'];

  $query = "DELETE FROM users  WHERE id='$userid' ";

  $query_run = mysqli_query($con, $query);


  if($query_run)
   {
       $_SESSION['status'] = "User Deleted Successfully";
       header("Location: register.php");
   }
 else
   {
    $_SESSION['status'] = "User Deletion Failed";
    header("Location: register.php");
   }

}
?>