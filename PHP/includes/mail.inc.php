<?php
session_start();

if(isset($_POST["submit"]) && $_POST["submit"]=="reserver"){
    
    $id_receiver = $_SESSION["idowner"];
    $try = $_SESSION["rc_search"];
    // $see = $_SESSION["route_id_owner".$try];
    $id_trajet = $_SESSION["trajet_id_k"];
    
    // grabbing values-------------------------------------------------------------------------------------
    $b= $_POST["submit"];
    $name_receiver = $_POST["id_receiver"];
    $name_sender = $_POST["name_sender"];
    $id_sender = $_POST["id_sender"];
    $arriver = $_POST["arriver"];
    $depart = $_POST["depart"];
    $day = $_POST["day"];
    $month = $_POST["month"];
    $year = $_POST["year"];

    $msg_type = "Demande";

    //instantiate class--------------------------------------------------------------------------------------------
    include "../classes/dbh.class.php";
    include "../classes/mail.class.php";
    include "../classes/mailcontrl.class.php";
    $mailsend = new mailcontrl($id_receiver,$name_receiver,$name_sender,$id_sender,$depart,$arriver,$day,$month,$year,$msg_type,$id_trajet);

    // error handlers and action -----------------------------------------------------------------------------------
    $mailsend->mailCreation();

    //back to page
    header("location: ../../confirmation.php?action=msgSent");
}