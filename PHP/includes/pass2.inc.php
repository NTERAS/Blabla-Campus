<?php


if(!empty($_POST["password"]) && (!empty($_POST["password_repeat"]))){

     // grabbing values--------------------------------------------------------

    $pwd = htmlspecialchars($_POST["password"]);
    $pwd_repeat = htmlspecialchars($_POST["password_repeat"]);
    // $token = htmlspecialchars($_POST['token']);
    $token = $_POST['token'];

    if($pwd == $pwd_repeat){
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
                //instantiate class------------------------------------------------------------------------------
include "../classes/dbh.class.php";
include "../classes/password2.class.php";
include "../classes/password2-contrl.class.php";


$modify = new Password2($pwd,$token);



// error handlers and class --------------------------------------------------------------------------
$modify->goPasswordGo();
    }
        // header("location: ../../rechercher.php?error=allempty"); 52d315b249de185871761cedcf08f885dbe70724dfbf4b9d
        exit();



//back to page----------------------------------------------------------------------

// header("location: ../../rechercher.php?success");



    }
