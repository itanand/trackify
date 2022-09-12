<?php
require('connection.php');

?>
       <!-- Navbar code  -->
        <nav class="navbar navbar-expand-lg bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
            <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Play & Earn</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="index.php">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="https://letsplayearn.com/about-us/" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          About
                    </a>
                    <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="https://letsplayearn.com/about-us/">About(Hindi)</a></li>
                        <li><a class="dropdown-item" href="https://letsplayearn.com/about-us-2/">About(English)</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link me-2" href="https://letsplayearn.com/how-we-register/">How to Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="https://letsplayearn.com/referral-program/">Referral Program</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="https://letsplayearn.com/term-and-condition/">Terms & Conditions</a>
                </li>
                </ul>
                <div class="d-flex" >
                        <?php
                            if(isset($_SESSION['login']) && $_SESSION['login']==true)
                            {
                                echo "
                                <div class='container'>

                                $_SESSION[name] - <a  class='btn btn-outline-dark shadow-none' href='logout.php'>Logout</a>
                                </div>
                                ";
                            }
                            else
                            {
                                echo "
                                <div class='sign-in-up'>
                                <a href=\"http://127.0.0.1/admin_app/trackify/referral/login.php\"><button class='btn btn-danger color-white' type='button' >ADMIN LOGIN</button></a>
                                <button class='btn btn-primary color-white' type='button' data-bs-toggle='modal' data-bs-target='#loginModal'>LOGIN</button>
                                <button class='btn btn-dark color-white' type='button' data-bs-toggle='modal' data-bs-target='#registerModal'>REGISTER</button>
                                </div>
                                ";
                            }
                        ?>
                </div>
            </div>
            </div>
        </nav>

        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form method="POST" action="login_register.php">
                    <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                    <i class="bi bi-person-circle fs-3 me-2"></i>User Login
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                        <label  class="form-label">Email address</label>
                        <input type="email" class="form-control shadow-none"  name="email_username">
                        </div>
                        <div class="mb-4">
                        <label  class="form-label">Password</label>
                        <input type="password" class="form-control shadow-none"  name="password">
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" class="btn btn-dark shadow-none" name="login">LOGIN</button>
                        <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password</a>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <!-- Register Modal -->
            <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form method="POST" action="login_register.php">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-lines-fill fs-3 me-2"></i>User Registration
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">Note: Your Details must match with your ID(Aadhar card, passport, driving license, etc.)
                        that will be required during check-in.
                        </span>
                        <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 ps-0 mb-3">
                            <label  class="form-label">Name</label>
                            <input type="text" class="form-control shadow-none" name="name" >
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                            <label  class="form-label">Email</label>
                            <input type="email" class="form-control shadow-none"  name="email">
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                            <label  class="form-label">Phone Number</label>
                            <input type="number" class="form-control shadow-none" name="phone" >
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                            <label  class="form-label">City</label>
                            <input type="text" class="form-control shadow-none" name="city" >
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                            <label  class="form-label">PinCode</label>
                            <input type="number" class="form-control shadow-none" name="pincode" >
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                            <label  class="form-label">Password</label>
                            <input type="password" class="form-control shadow-none" name="password" >
                            </div>
                            <div class="col-md-6 p-0 mb-3">

                               <input type="text" class="form-control shadow-none" name="referralcode"  id="refercode" hidden>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                            <input type="text" class="form-control shadow-none"  name="referred_by" hidden >
                            </div>
                            <!-- <div class="col-md-6 p-0 mb-3">
                            <label  class="form-label">Confirm Password</label>
                            <input type="password" class="form-control shadow-none" >
                            </div> -->
                        </div>
                        </div>
                        <div class="text-center my-1">
                        <button type="submit" class="btn btn-dark shadow-none" name="register">REGISTER</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            </div>