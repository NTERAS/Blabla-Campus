<?php
session_start();


if(isset($_POST["submit"]) && $_POST["submit"]=="reserver"){
    $b= $_POST["submit"];
    // $i=$_SESSION["rc_search"];
    $id_receiver = $_SESSION["idowner"];
    // $id_receiver = $_SESSION["route_id_owner".$i];

    $try = $_SESSION["rc_search"];
    $see = $_SESSION["route_id_owner".$try];
    echo "<br>";
    echo $try." <- echo rc";
    echo "<br>";

    // echo "<br>";
    echo $see." <- echo id owner";
    echo "<br>";

    echo "id_receiver = ".$id_receiver."<br>";
    // echo "echo after isset <br>";
    

// grabbing values-------------------------------------------------------------------------------------
    $name_receiver = $_POST["id_receiver"];
    $name_sender = $_POST["name_sender"];
    $id_sender = $_POST["id_sender"];
    $arriver = $_POST["arriver"];
    $depart = $_POST["depart"];
    $day = $_POST["day"];
    $month = $_POST["month"];
    $year = $_POST["year"];
    $msg_type = "Demande";
    $id_trajet = $_SESSION["trajet_id_k"];

    echo $id_receiver."<-id_owner<br>"; //owner of the post, the person who WILL receive the demande(write the msg to)
    echo $name_receiver."<-name_receiver<br>"; // name of the owner, the person who receives our demand
    echo $name_sender."<br>"; //the person currently logged in, who does the demand(sends the msg)
    echo $id_sender."<br>"; // sender id(person logged in)
    echo $depart."<br>";
    echo $arriver."<br>";
    echo $day."<br>";
    echo $month."<br>";
    echo $year."<br>";

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