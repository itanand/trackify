<?php
 session_start();
 include('includes/header.php');
 include('config/dbconn.php');
 ?>

<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 my-5">
            <?php  include('message.php');   ?>
                <div class="card my-5">
                    <div class="card-header bg-light">
                        <h5>Registration Form</h5>
                    </div>
                    <div class="card-body">

                    <form action="code.php" method="POST" >
                               <div class="modal-body">
                                   <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                     <div class="form-group">
                                          <label for="email">Email</label>
                                          <span class="email_error"></span>
                                          <input type="email" name="email" class="form-control email_id" placeholder="Email">
                                     </div>

                                     <div class="form-group">
                                          <label for="number">Mobile No</label>
                                          <span class="number_error"></span>
                                         <input type="number" name="phone" class="form-control mobile_no" placeholder="Mobile Number">
                                     </div>
                                    <div class="form-group">
                                          <label for="city">City</label>
                                          <input type="text" name="city" class="form-control" placeholder="City">
                                     </div>

                                    <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="education">Password</label>
                                             <input type="password" name="password" class="form-control" placeholder="Password">
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                               <label for="education">Confirm Password</label>
                                               <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
                                          </div>
                                      </div>

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="addUser" class="btn btn-primary btn-block">Registration</button>
                                        <p>Already have an account? <a href="login.php">Login Now</a></p>
                                     </div>
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