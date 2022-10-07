<?php 
    $email = $_GET["email"];
    echo $email;

    include "../classes/dbh.class.php";
    include "../classes/resetcontrl.class.php";
    include "../classes/resetpassword.class.php";

    $reset = new ResetContrl($email);
    $reset->Myemail();

    //back to page
    header("location: ../../rechercher.php?error=none");
?>