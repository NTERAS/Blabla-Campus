<?php
// session_start();

    // grabbing values----------------------------------------------------------------------------------
    $email = $_GET["email"];
    $email = htmlspecialchars($_GET['email']);


    //instantiate class-----------------------------------------------------------------------------
    include "../classes/dbh.class.php";
    include "../classes/forget-password.class.php";
    include "../classes/reset-password-contrl.class.php";
    $new = new PasswordForgot($email);

    // error handlers and got o controler ----------------------------------------------------------
    $new->changePassword();

    //back to page--------------------------------------------------------------------------------------
    header("location: ../../reserver.php?error=none");