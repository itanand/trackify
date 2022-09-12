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
                     <li class="breadcrumb-item active">Registered User</li>
                   </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">View - Registered User</h3>
                           <a href="referrals.php"  class="btn btn-danger btn-sm float-right">Back </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                                <form action="code.php" method="GET" >
                                  <div class="modal-body">
                                    <?php
                                     if(isset($_GET['user_id']))
                                     {
                                        $user_id = $_GET['user_id'];
                                        $query = "SELECT * FROM users WHERE id='$user_id' LIMIT 1";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0){
                                           foreach($query_run as $row )
                                           {
                                                ?>
                                    <input type="hidden" name="user_id" value="<?php echo $row['id'] ?>">
                                    <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <p class="form-control">
                                           <?php echo $row['name']?>
                                        </p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <p class="form-control">
                                         <?php echo $row['email']?>
                                        </p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="number">Mobile No</label>
                                        <p class="form-control">
                                        <?php echo $row['phone']?>
                                        </p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="city">City</label>

                                        <p class="form-control">
                                        <?php echo $row['city']?>
                                        </p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="city">Referral</label>

                                        <p class="form-control ">
                                        <?php echo $row['referral_code']?>
                                        </p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="education">Role</label>
                                        <p class="form-control">
                                        <?php
                                                if($row['role_as'] == "0")
                                                {
                                                     echo "User";
                                                }
                                                elseif($row['role_as'] == "1")
                                                {
                                                   echo "Admin";
                                                }
                                                else{
                                                   echo "Referrals";
                                                }
                                              ?>
                                        </p>

                                    </div>


                                                <?php
                                           }
                                        }
                                        else{
                                            echo "<h4>No Record Found.!</h4>";
                                        }
                                     }

                                    ?>
                                      </div>
                                  </div>
                                </form>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


</div>


<?php
   include('includes/script.php');
?>
<?php
   include('includes/footer.php');
?>