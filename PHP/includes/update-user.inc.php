<?php
session_start();
$user_id = $_SESSION["userid"];
        echo "<br>";
        echo $user_id;

if(isset($_POST["action"]) ){

    $req = array();
    $value = array();
    $mail="empty";

    if(empty($_POST['pseudo']) && 
    empty($_POST['password']) && 
    empty($_POST['email']) && 
    empty($_POST['biographie']) && 
    empty($_FILES['resume']['name'])){
        
        header("location: ../../rechercher.php?error=allempty");
        exit();
    }


 // grabbing values--------------------------------------------------------

//  if (!empty($_POST['pseudo'])) {
//     array_push($req, 'pseudo = ""?""');
//     array_push($value, $_POST['pseudo']);
// }

// if (!empty($_POST['password'])) {
//     $password = $_POST['password'];
//     $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
//     array_push($req, 'pass = ""?""');
//     array_push($value, $hashedPwd);
// }

// if (!empty($_POST['email'])) {
//     $mail = $_POST['email'];
//     array_push($req, 'email = ""?""');
//     array_push($value, $_POST['email']);
// }
// if (!empty($_POST['biographie'])) {
//     array_push($req, 'bio = ""?""');
//     array_push($value, $_POST['biographie']);
// }
// if (!empty($_FILES['resume']['name']) && isset($_FILES['resume'])) {
//     echo "inside image if <br>";
//     $image = $_FILES['resume'];
//     $fileName = $_FILES['resume']['name'];
//     $fileTmpName = $_FILES['resume']['tmp_name'];
//     $fileSize = $_FILES['resume']['size'];
//     $fileError = $_FILES['resume']['error'];
//     $fileType = $_FILES['resume']['type'];

//     echo $fileTmpName;
//     echo "<br> after fileTmpName <br>";

//     $fileExt = explode('.',$fileName);
//     $fileActualExt = strtolower(end($fileExt));
//     $allowed = array('jpg','png','gif');

//     if (in_array($fileActualExt,$allowed )) {
//         if ($fileError === 0) {
//             if ($fileSize < 100000) {
//                 $image = base64_encode(file_get_contents(addslashes($fileTmpName)));
//             }else{
//                 echo "error of size!! <br>";
//             }
//         }else{
//             echo "error of file <br>";
//         }
//     }
//     array_push($req, 'avatar = ?');
//     array_push($value, $image);
//     var_dump($image);
//     echo '<br>';
//     var_dump($req);
//     echo '<br>';
//     var_dump($value);
//     echo '<br>';
// }else{
//     echo "image empty, nothing to find here!!!!!!! <br>";
// }

// $requ = implode(",",$req);
//     print_r($req);
//     echo "<br>";
//     print_r($value);
//     echo "<br>";
//     print_r($mail);
//     echo "<br>";
//     print_r($req[0]);
//     echo "<br>";
//     print_r($requ);
$image2;
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $biographie = $_POST["biographie"];

    $image = $_FILES['resume'];
    $fileName = $_FILES['resume']['name'];
    $fileTmpName = $_FILES['resume']['tmp_name'];
    $fileSize = $_FILES['resume']['size'];
    $fileError = $_FILES['resume']['error'];
    $fileType = $_FILES['resume']['type'];
    echo $fileSize;

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg','png','gif');

    if (in_array($fileActualExt,$allowed )) {
        if ($fileError === 0) {
            if ($fileSize < 100000000) {
                $image2 = base64_encode(file_get_contents(addslashes($fileTmpName)));
            }else{
                echo "image too big";
            }
        }else{
            echo "image file error";
        }
    }else{
        echo "not allowed";
    }
    


   //instantiate class------------------------------------------------------------------------------
    include "../classes/dbh.class.php";
    include "../classes/update-user.class.php";
    include "../classes/update-usercontrl.class.php";
    var_dump($pseudo);
    echo "<br>";
    var_dump($password);
    echo "<br>";
    var_dump($email);
    echo "<br>";
    var_dump($biographie);
    echo "<br>";
    var_dump($image);
    echo "<br>";
    
    $modify = new ModifyContrl($pseudo,$password,$email,$biographie,$image2);
    
    

// error handlers and class --------------------------------------------------------------------------
    $modify->myChanges();

    //back to page----------------------------------------------------------------------
    
    header("location: ../../rechercher.php?success");
    
    
    
}