<?php
session_start();

$user_id = $_SESSION["userid"];
        echo "<br>";
        // echo $user_id;

if(isset($_POST["action"]) ){

    $req = array();
    $value = array();
    $mail="empty";

    if(empty($_POST['pseudo']) && 
    empty($_POST['password']) && 
    empty($_POST['email']) && 
    empty($_POST['biographie']) && 
    empty($_FILES['resume']['name'])){
        
        // header("location: ../../rechercher.php?error=allempty");
        exit();
    }
    // grabbing values--------------------------------------------------------
    
    $pseudo =htmlspecialchars($_POST["pseudo"]);
    $password =htmlspecialchars($_POST["password"]);
    $email =htmlspecialchars($_POST["email"]);
    $biographie =htmlspecialchars($_POST["biographie"]);
    $image =($_FILES['resume']);

    if(!empty($image)){

        
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
                    $_SESSION["image2"] = base64_encode(file_get_contents(addslashes($fileTmpName)));
                    
                }else{ echo "image too big"; }
            }else{ echo "image file error"; }
        }else{ echo "not allowed"; }
    }else{
        $_SESSION["image2"] = NULL;
    }
    
    
    //instantiate class------------------------------------------------------------------------------
    
    include "../classes/dbh.class.php";
    include "../classes/update-user.class.php";
    include "../classes/update-usercontrl.class.php";
    $image2 = $_SESSION["image2"];
    // var_dump($image2) ;
    // echo $image2;
    $modify = new ModifyContrl($pseudo,$password,$email,$biographie,$image2);

    
    // error handlers and class --------------------------------------------------------------------------
    
    $modify->myChanges();
    
    //back to page----------------------------------------------------------------------
    
    header("Location: ../../rechercher.php");
}