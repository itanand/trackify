<?php
session_start();

if(!isset($_SESSION['auth']))
{
    $_SESSION['auth_status'] = "Login to Access Dashboard";
    header("Location: login.php");
    exit(0);
}
else
{
    if($_SESSION['auth'] == "1")
    {

    }
    elseif ($_SESSION['auth'] == "0") {
        $_SESSION['auth_status'] = "You are not Authorised as ADMIN";
        header("Location: ../user/index.php");
        exit(0);
    }
    else
    {
        $_SESSION['auth_status'] = "You are not Authorised as ADMIN";
        header("Location: ../referral/index.php");
        exit(0);

    }
}

?>
