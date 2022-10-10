<?php

// Le include dans cette situatiuon permet d'introduire ce que nous souhaitons, pour ensuite les appeller plus tard.  
// Il récupère les informations des classes et c'est cette page là va faire l'action puis il fait un redirection.


// name pseudo password email f_answer m_answer biographie <-- signup names we use in form
// echo "echo before isset";

if(isset($_POST["action"])){

    // echo "echo after isset";

    // grabbing values-----------------------------------------------------
    $name = $_POST["name"];
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $answer = $_POST["answer"];
    // echo $answer;
    $biographie = $_POST["biographie"];
    // $Img = file_get_contents($_FILES['resume']);

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
            if ($fileSize < 100000000) {
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

