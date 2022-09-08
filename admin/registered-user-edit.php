<?php
   session_start();
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
                        <h3 class="card-title">Edit - Registered User</h3>
                           <a href="register.php"  class="btn btn-danger btn-sm float-right">Back </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                                <form action="code.php" method="POST" >
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
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="<?php echo $row['name']?>" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="<?php echo $row['email']?>" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="number">Mobile No</label>
                                        <input type="number" name="phone" value="<?php echo $row['phone']?>" class="form-control" placeholder="Mobile Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" name="city" value="<?php echo $row['city']?>" class="form-control" placeholder="City">
                                    </div>
                                    <div class="form-group">
                                        <label for="education">Password</label>
                                        <input type="password" name="password" value="<?php echo $row['password']?>" class="form-control" placeholder="Password">
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
                                  <div class="modal-footer">
                                    <button type="submit" name="updateUser" class="btn btn-primary">Update</button>
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
   include('includes/footer.php');
?>