<?php

require('connection.php');
session_start();

#for login

if(isset($_POST['login']))
{
    $query="SELECT * FROM `users` WHERE `email` ='$_POST[email_username]' OR `name` = '$_POST[email_username]'";
    $result = mysqli_query($con, $query);

    if($result)
    {
       if(mysqli_num_rows($result)==1)
       {
           $result_fetch=mysqli_fetch_assoc($result);
           if(password_verify($_POST['password'], $result_fetch['password']))
           {
              #if password matched
              $_SESSION['login']=true;
              $_SESSION['name']=$result_fetch['name'];
              header("location: index.php");
           }
           else
           {
              #if incorrect password
              echo "<script>
              alert('Incorrect password');
              window.locationj.href='index.php';
              </script>";
           }
       }
       else
       {
        echo "<script>
           alert('Email or Username Not Registered');
            window.locationj.href='index.php';
            </script>";
       }
    }
    else
    {
        echo "<script>
        alert('Cannot Run the Query');
         window.locationj.href='index.php';
         </script>";
    }
}



#for registration
if(isset($_POST['register']))
{
    $user_exist_query="SELECT * FROM `users` WHERE `phone`='$_POST[phone]' OR `email`='$_POST[email]'";
    $result =mysqli_query($con, $user_exist_query);

    if($result)
    {
       if(mysqli_num_rows($result) > 0)  #it will be executed if phone or email is already taken
       {
          $result_fetch= mysqli_fetch_assoc($result);

          if($result_fetch['phone']==$_POST['phone'])
          {
            #error for phone number  already registered
            echo"
            <script>
            alert('phone number already taken');
            window.location.href='index.php';
            </script>";
          }
          else
          {
            #error for email already registered
            echo"
                <script>
                alert('$result_fetch[email] - Email already registered');
                window.location.href='index.php';
                </script>";
          }
       }
       else  #it will be executed if no one taken phone or email before
       {
           $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
           $query = "INSERT INTO `users`( `name`, `email`, `phone`, `city`, `password`) VALUES ('$_POST[name]','$_POST[email]','$_POST[phone]','$_POST[city]','$password')";
           if(mysqli_query($con, $query))
           {
              #if data insterted successfull
              echo "<script>
                   alert('Registration Successful');
                    window.locationj.href='index.php';
                    </script>";
           }
           else
           {
            #if data cannot be inserted
            echo "<script>
               alert('Cannot Run Query');
               window.locationj.href='index.php';
               </script>";
           }
       }
    }
    else
    {
        echo "<script>
        alert('Cannot Run Query');
        window.locationj.href='index.php';
        </script>";
    }
}


?>