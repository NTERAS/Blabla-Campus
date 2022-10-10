<?php
session_start();

    // grabbing values------------------------------------------------------
    $user_id = $_SESSION["userid"];
    $msg_type = "Validation";

    //instantiate class--------------------------------------------------------
    include "../classes/dbh.class.php";
    include "../classes/mail.class.php";
    include "../classes/search-mail-type-2-contrl.class.php";
    $mails = new MailSearchTwo($user_id,$msg_type);

    // error handlers and sign up-----------------------------------------
    $mails->mailFinder();

    //back to page-----------------------------------------------------------
    header("location: ../../mesReservations.php?success!");