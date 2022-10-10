<?php

if(isset($_POST["action"])){

    // grabbing values-----------------------------------------------------
    $name = $_POST["name"];
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $answer = $_POST["answer"];
    $biographie = $_POST["biographie"];

    // ALL ABOUT IMAGE HERE----------------------------------------------------------------------------
   
    $image = $_FILES['resume'];
    $fileName = $_FILES['resume']['name'];
    $fileTmpName = $_FILES['resume']['tmp_name'];
    $fileSize = $_FILES['resume']['size'];
    $fileError = $_FILES['resume']['error'];
    $fileType = $_FILES['resume']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg','png','gif');

    if (in_array($fileActualExt,$allowed )) {
        if ($fileError === 0) {
            if ($fileSize < 10000000) {
                $image = base64_encode(file_get_contents(addslashes($fileTmpName)));
            }
        }
    }
    
    

    //instantiate signup class
    include "../classes/dbh.class.php";
    include "../classes/signup.class.php";
    include "../classes/signupcontrl.class.php";
    $signup = new SignupContrl($name,$pseudo,$password,$email,$answer,$biographie,$image);

    // error handlers and sign up
    $signup->signupUser();

    //back to page
    header("Location: ../../confirmation.php?action=accountCreation");
    
}