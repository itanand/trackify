<?php
   include('authentication.php');
   include('includes/header.php');
   include('includes/topnavbar.php');
   include('includes/sidebar.php');
   include('config/dbconn.php');
?>

<div class="content-wrapper">



            <!-- User  Modal -->
           <div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                          <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                           </div>

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


                                </div>
                             <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="addUser" class="btn btn-primary">Save</button>
                             </div>
                            </form>
                       </div>
                    </div>
                </div>

                <!-- Delete User  Model-->



         <!-- Content Header -->
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
                              <?php

                                 if(isset($_SESSION['status']))
                                 {
                                    echo "<h4>".$_SESSION['status']."</h4>";
                                    unset($_SESSION['status']);
                                 }


                              ?>

                           <div class="card">
                               <div class="card-header">
                                    <h3 class="card-title">Registered User</h3>
                                       <a href="" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right">Add User </a>
                                </div>
                                 <!-- /.card-header -->
                               <div class="card-body">
                                 <table id="example1" class="table table-bordered table-striped">
                                     <thead>
                                        <tr>
                                             <th>Id</th>
                                             <th>Name</th>
                                             <th>Email</th>
                                             <th>Phone No</th>
                                             <th>City</th>
                                             <th>Role</th>
                                             <th>Action</th>
                                         </tr>
                                       </thead>
                                    <tbody>
                                           <?php
                                            $query = "SELECT * FROM users WHERE role_as != '1'";
                                            $query_run = mysqli_query($con, $query);

                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                               foreach($query_run as $row)
                                                {

                                                 ?>
                                        <tr>
                                              <td><?php echo $row['id']; ?></td>
                                              <td><?php echo $row['name']; ?></td>
                                              <td><?php echo $row['email']; ?></td>
                                              <td><?php echo $row['phone']; ?></td>
                                              <td><?php echo $row['city']; ?></td>
                                              <td><?php
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
                                              ?></td>
                                              <td>
                                               <a href="registered-user-view.php?user_id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">View</a>
                                              </td>
                                        </tr>
                                        <?php
                                                 }
                                            }
                                             else {
                                                     ?>
                                                     <tr>
                                                            <td>
                                                               No Record Found
                                                            </td>
                                                    </tr>
                                                 <?php


                                                   }
                                                  ?>

                                      </tdbody>
                                  </table>
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


<!-- Mobile Number Live verification -->

<script>
 $(document).ready(function (){

  $('.mobile_no').keyup(function (e){
     var phone = $('.mobile_no').val();

     $.ajax({
      type: "POST",
      url: "code.php",
      data: {
        'check_MobileNumber':1,
        'phone':phone,

      },
      success: function(response) {
          // console.log(response);

          $('.number_error').text(response);
      }
     });
  });
});


</script>


<!-- Email id live verification -->
<script>
 $(document).ready(function (){

  $('.email_id').keyup(function (e){
     var email = $('.email_id').val();

     $.ajax({
      type: "POST",
      url: "code.php",
      data: {
        'check_Emailbtn':1,
        'email':email,

      },
      success: function(response) {
          // console.log(response);

          $('.email_error').text(response);
      }
     });
  });
});


</script>



<script>
   $(document).ready(function (){
      $('.deletebtn').click(function (e){
           e.preventDefault();

           var user_id = $(this).val();
          //  console.log(user_id);
          $('.delete-user_id').val(user_id);
          $('#DeleteModal').modal('show');
      })
   });
</script>
<?php
   include('includes/footer.php');
?>