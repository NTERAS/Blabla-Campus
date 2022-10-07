<?php 
require_once __DIR__.'/../config/config.php';

if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = htmlspecialchars($_POST['email']);
    $check = $bdd->prepare('SELECT token FROM utilisator WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if($row == 1){
        $token = bin2hex(openssl_random_pseudo_bytes(24));
        $token_user = $data['token'];

        $insert = $bdd->prepare('INSERT INTO password_recover(token_user, token) VALUES(?, ?)');
        $insert->execute(array($token_user, $token));

        $link = 'recover.php?u='.base64_encode($token_user).'&token='.base64_encode($token);

        echo "<a href='$link'>Click here to recover your password</a>";

        $subject = "Recuperation de mot de passe - BlaBlaCampus";
    }else{
        echo "Cette adresse email n'est pas enregistrée";
    }
}