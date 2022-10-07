<?php
session_start();
if(isset($_SESSION["username"])){
    $a = $_SESSION["username"];
    $b = $_SESSION["userid"];
    $c = $_SESSION["image"];

    echo "hello $a <br>";
    echo "your id is: $b <br>";
    echo '<img src="data:image;base64,' . $c . '" />';
    // echo $test1;
    // echo $test2;
    }
    else{
    
    echo "NOT logged in";
    }

// name pseudo password email f_answer m_answer biographie <-- signup names we use in form
// echo "echo before isset";

if(isset($_POST["action"]) && !empty($_POST["login"]) && !empty($_POST["password"])){
    // echo "ok";

    // echo "echo after isset";

// grabbing values
    $pseudo = $_POST["login"];
    $password = $_POST["password"];

    //instantiate signup class
    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/logincontrl.class.php";
    $login = new LoginContrl($pseudo,$password);

    // error handlers and sign up
    $login->loginUser();

    //back to page
    header("location: ../../confirmation.php?action=loggedIn");
}else{
    header("location: ../../confirmation.php?action=emptyInputs");
}