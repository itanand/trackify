<?php
   include('authentication.php');
   include('includes/header.php');
   include('includes/topnavbar.php');
   include('includes/sidebar.php');
   include('config/dbconn.php');
?>
<div class="content-wrapper">
    <div class="container justify-content-center">
            <h1 style="text-align: center; padding-top: 10%;"> Hi,   <?php
          if(isset($_SESSION['auth']))
          {
            echo $_SESSION['auth_user']['user_name'];
          }
          else
          {
             echo "Not Logged In.!";
          }

          ?></h1>
          <h5 style="text-align: center;">Your Referrals Link is Here!</h5>

    </div>
</div>

<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>