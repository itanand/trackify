<?php
include('authentication.php');
include('config/dbconn.php');


function updateReferral(){

  $query = "SELECT * FROM `users` WHERE `referral_code`='$_POST[referralcode]'";
  $result=mysqli_query($GLOBALS['con'], $query);
  if($result)
  {
      if(mysqli_num_rows($result)==1)
      {
          $result_fetch=mysqli_fetch_assoc($result);
          $point=$result_fetch['referral_point']+100;
          $update_query="UPDATE `users` SET `referral_point`='$point' WHERE `email`='$result_fetch[email]'";
          if(!mysqli_query($GLOBALS['con'], $update_query))
          {
              echo"
              <script>
              alert('Can't Run Query');
              window.location.href='index.php';
              </script>";
              exit;
          }
      }
      else
      {
          echo"
          <script>
          alert('Invalid Referral Code');
          window.location.href='index.php';
          </script>";
          exit;
      }
  }
  else
  {
      echo"
          <script>
          alert('Can't Run Query');
          window.location.href='index.php';
          </script>";
          exit;
  }
}










if(isset($_POST['logout_btn']))
{


unset($_SESSION['auth']);
unset($_SESSION['auth_user']);

$_SESSION['status'] ="Logged out Successful";
header("Location: login.php");
exit(0);

}

if(isset($_POST['check_Emailbtn']))
{

  $email = $_POST['email'];

  $checkemail = "SELECT email FROM users WHERE email='$email' ";
  $checkemail_run = mysqli_query($con, $checkemail);

  if(mysqli_num_rows($checkemail_run) > 0)
  {
    echo "Email id is already taken.!";
  }
  else
  {
     echo "It's Available ";
  }
}


if(isset($_POST['check_MobileNumber']))
{

  $phone = $_POST['phone'];

  $checknumber = "SELECT phone FROM users WHERE phone='$phone' ";
  $checknumber_run = mysqli_query($con, $checknumber);

  if(mysqli_num_rows($checknumber_run) > 0)
  {
    echo "Mobile Number is already taken.!";
  }
  else
  {
     echo "It's Available ";
  }
}


if(isset($_POST['addUser']))
{
   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $city = $_POST['city'];
   $password = $_POST['password'];
   $confirmpassword = $_POST['confirmpassword'];


   if($password == $confirmpassword)
   {

     $checkemail = "SELECT email FROM users WHERE email= '$email' ";
     $checkemail_run = mysqli_query($con, $checkemail);

     if(mysqli_num_rows($checkemail_run) > 0)
     {
        //  Taken - Already Exists
        $_SESSION['status'] = "Email Already Taken";
        header("Location: register.php");
        exit;

     }
     else
     {

      if($_POST['referralcode']!='')
     {
        updateReferral();
     }
      $referred_by = $_POST['referred_by'];
      $referral_code=strtoupper(bin2hex(random_bytes(4)));

      //available = Record not found
      $user_query = "INSERT INTO users( name, email, phone, city, password, referral_code, referred_by, referral_point ) VALUES ( '$name', '$email', '$phone', '$city', '$password','$referral_code', '$referred_by', 0)";
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

   }
       else {
        $_SESSION['status'] = "Password and Confirm Password does Not match";
        header("Location: register.php");
       }


}




?>