<?php
require('connection.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Play & Earn</title>
    <?php require('include/links.php') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <style>
          .availability-form{
             margin-top: -50px;
             z-index: 2;
             position: relative;
          }
          @media  screen and (max-width: 575px)  {
            .availability-form{
                margin-top: 25px;
                padding: 0 35px;
              }
          }
    </style>
  </head>
<body class="bg-light ">
<?php
       require('include/header.php')
  ?>
   <div class='card m-4 border-0 shadow p-4'>

  <?php
    if(isset($_SESSION['login']) && $_SESSION['login']==true)
    {

     echo " <h2 class='text-center' style=' margin-top: 5%;'> Welcome to Play & Earn - $_SESSION[name] </h2>";


    $query = "SELECT * FROM `users` WHERE `name`='$_SESSION[name]'";
    $result=mysqli_query($con, $query);
    $result_fetch=mysqli_fetch_assoc($result);

    echo "
    <div class='container p-4'><h3 class='text-center'>Your Referall Code: $result_fetch[referral_code]</h3>
    <h3 class='text-center'>Your Referall Points: $result_fetch[referral_point]</h3>
    <h3 class='text-center'>
    Your Referall Link: <a class='text-white bg-danger link-primary btn  text-decoration-none' id='btn-referral'  href='http://127.0.0.1/admin_app/trackify/play_earn/index.php?refer=$result_fetch[referral_code]'>Link</a>
    </h3>
    </div>
    <div class='d-flex col-md-12 p-4'>
    <input class='col-md-8 me-2 text-center' type='text' value='http://127.0.0.1/admin_app/trackify/play_earn/index.php?refer=$result_fetch[referral_code]' id='myInput'>
    <button class='col-md-4 me-2 btn text-danger shadow border' onclick='myFunction()'>Copy Link</button>
  </div>
    ";
  }

  ?>




    <script>
      //script for Copy link
    function myFunction() {

      var copyText = document.getElementById('myInput');


      copyText.select();
      copyText.setSelectionRange(0, 99999); // For mobile devices


      navigator.clipboard.writeText(copyText.value);


      alert('Your Referral Link Copied Successfully!');
    }
    </script>
  <script>
    function popup(popup_name)
    {
      get_popup=document.getElementById(popup_name);
      if(get_popup.style.display=="flex")
      {
        get_popup.style.display="none";
      }
      else
      {
        get_popup.style.display="flex";
      }
    }
  </script>


<?php

if(isset($_GET['refer']) && $_GET['refer']!='')
{
  if(!(isset($_SESSION['login']) && $_SESSION['login']==true))
  {
    $query="SELECT * FROM `users` WHERE `referral_code`='$_GET[refer]'";
    $result=mysqli_query($con, $query);
    if(mysqli_num_rows($result)==1)
    {
      echo
      "<script>
          document.getElementById('refercode').value='$_GET[refer]';
          popup('register-popup');
      </script>";
    }
    else
    {
      echo "<script>alert('Invalid Referral Code');</script>";
    }
  }
}

?>
</div>
  <?php
          include('include/footer.php')
  ?>


</body>
</html>