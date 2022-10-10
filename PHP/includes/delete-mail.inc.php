<?php
session_start();

 // grabbing values--------------------------------------------------------

 $id = $_GET["id"];

   //instantiate class------------------------------------------------------------------------------
    include "../classes/dbh.class.php";
    include "../classes/mail.class.php";
    include "../classes/delete-mail-contrl.class.php";
    $del = new DeleteMail($id);

// error handlers and class --------------------------------------------------------------------------
    $del->idMailToDelete();

    //back to page------------------------------------------------------------

    header("location: ../../confirmation.php?action=deleteMsg");

