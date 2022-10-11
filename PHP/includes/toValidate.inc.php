<?php
session_start();

if(isset($_POST["submit"])){

    // grabbing values-------------------------------------------------------------------------------------
    
    $b= $_POST["submit"];
    $i = $_GET["i"];
    $tr = $_GET["tr"];
    $id_receiver =$_SESSION["id-sender".$i];
    $name_receiver = $_SESSION["name-sender".$i];
    $id_sender = $_SESSION["id_receiver"];
    $name_sender = $_SESSION["username"];
    $trip_depart = $_SESSION["trip_depart".$i];
    $trip_arrival = $_SESSION["trip_arrival".$i];
    $full_message = $_SESSION["full-message".$i];


    $full_message2 = explode(" ",$full_message);
    $full_message3 = count($full_message2);
    $day = $full_message2[$full_message3-3];
    $month = $full_message2[$full_message3-2];
    $year = $full_message2[$full_message3-1];
    $msg_type = "Validation";

    //instantiate class--------------------------------------------------------------------------------------------
    include "../classes/dbh.class.php";
    include "../classes/mail.class.php";
    include "../classes/mail-update.contrl.class.php";
    $mailup= new MailUpContrl($tr);

    // error handlers and action -----------------------------------------------------------------------------------
    $mailup->mailUpdate();

    //back to page
    // header("location: ../../confirmation.php?action=msgSent");
}