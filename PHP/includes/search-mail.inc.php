<?php
session_start();
if(isset($_SESSION["username"])){
    $a = $_SESSION["username"];
    
    //echo '<img src="data:image;base64,' . $c . '" />';

    // grabbing values
    $user_id = $_SESSION["userid"];
    echo "hello ".$a." your id is: $user_id <br>";

    //instantiate signup class
    include "../classes/dbh.class.php";
    include "../classes/mail.class.php";
    include "../classes/search-mailcontrl.class.php";
    $mails = new MailSearch($user_id);

    // error handlers and sign up-----------------------------------------
    $mails->mailFinder();

    //back to page-----------------------------------------------------------
    header("location: ../../messagerie.php?success!");
}else{
    echo "NOT logged in";
}



