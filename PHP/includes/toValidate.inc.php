<?php
session_start();
// echo "outside";


if(isset($_POST["submit"])){
    echo "inside <br>";
    $b= $_POST["submit"];
    // $id_receiver = $_SESSION["idowner"];
    

// grabbing values-------------------------------------------------------------------------------------
    
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
    // $trajet_id = $_SESSION["trajet_id_k"];
    // echo $trajet_id;


    // echo $id_receiver."<-id_owner<br>"; //the person who WILL receive the demande(write the msg to)
    // echo $name_receiver."<-name_receiver<br>"; // the person who receives our demand

    //trajet respond to kar, reply to a msg (Trajet(id=19) sends a msg to kar(id=14) to validate)? TRAJET IS THE SENDER? kar is the receiver
    // echo $id_receiver."<br>"; // id of kar
    // echo $name_receiver." <br>"; //name of kar
    // echo $name_sender."<br>"; // name of trajet(me)
    // echo $id_sender."<br>"; // id of trajet(me)
    // echo $trip_depart."<br>";
    // echo $trip_arrival."<br>";
    // // echo $full_message3."<br>";s
    // echo $day."<br>";
    // echo $month."<br>";
    // echo $year."<br>";
    // echo $msg_type."<br>";
    // print_r($full_message2);
    // echo $arriver."<br>";
    // echo $day."<br>";
    // echo $month."<br>";
    // echo $year."<br>";
    echo $tr."<br>";

    //instantiate class--------------------------------------------------------------------------------------------
    include "../classes/dbh.class.php";
    include "../classes/mail.class.php";
    include "../classes/mail-update.contrl.class.php";
    // $mailsend = new mailcontrl($id_receiver,$name_receiver,$name_sender,$id_sender,$trip_depart,$trip_arrival,$day,$month,$year,$msg_type);
    $mailup= new MailUpContrl($tr);

    // error handlers and action -----------------------------------------------------------------------------------
    $mailup->mailUpdate();

    //back to page
    header("location: ../../confirmation.php?action=msgSent");
}