<?php

require('connection.php');
session_start();



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
           if($_POST['password'])
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

          if($_POST['referralcode']!='')
          {
            updateReferral();
          }


           $referral_code=strtoupper(bin2hex(random_bytes(4)));



           $query = "INSERT INTO `users`( `name`, `email`, `phone`, `city`, `password`, `referral_code`,`referred_by`, `referral_point`) VALUES ('$_POST[name]','$_POST[email]','$_POST[phone]','$_POST[city]', '$_POST[password]', '$referral_code', '$_POST[referralcode]',0)";
           if(mysqli_query($con, $query))
           {
              #if data insterted successfull
              echo "<script>
                   alert('Registration Successful');
                    window.location.href='registration_successful.php';
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