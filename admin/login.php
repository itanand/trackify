<?php
 session_start();
 include('includes/header.php');
 if(isset($_SESSION['auth']))
 {
    $_SESSION['status'] = "You are already logged In";
    header('Location: index.php');
    exit(0);
 }
 ?>

<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 my-5">
            <?php

                if(isset($_SESSION['auth_status']))
                {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <strong>Hey!</strong><?php echo $_SESSION['auth_status']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                unset($_SESSION['auth_status']);
                }

                ?>

            <?php  include('message.php');   ?>
                <div class="card my-5">
                    <div class="card-header bg-light">
                        <h5>Login Form</h5>
                    </div>
                    <div class="card-body">

                        <form action="logincode.php" method="POST">
                                     <div class="form-group">
                                          <label for="email">Email</label>
                                          <input type="email" name="email" class="form-control email_id" placeholder="Email">
                                     </div>
                                    <div class="form-group">
                                             <label for="education">Password</label>
                                             <input type="password" name="password" class="form-control" placeholder="Password">
                                     </div>
                                     <div class="form-group">
                                        <button type="submit" name="login_btn" class="btn btn-primary btn-block">Login</button>
                                        <p>You don't have an account? <a href="registration.php">Register Now</a></p>
                                     </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>