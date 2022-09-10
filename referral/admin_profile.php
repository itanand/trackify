<?php
   include('authentication.php');
   include('includes/header.php');
   include('includes/topnavbar.php');
   include('includes/sidebar.php');
   include('config/dbconn.php');
?>
<div class="content-wrapper">

   <div class="content-header">
       <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
               <h1 class="m-0">Dashboard</h1>
               </div><!-- /.col -->
              <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active">Admin Profile</li>
                 </ol>
             </div><!-- /.col -->
           </div><!-- /.row -->
       </div><!-- /.container-fluid -->
   </div>

    <div class="container justify-content-center">
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
          <h5 style="text-align: center;">Please Update Your Profile.!</h5>

    </div>

    </div>
</div>

<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>