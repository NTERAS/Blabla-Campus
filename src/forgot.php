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

        $link = 'http://localhost/defi-php/Blabla-Campus/src/recover.php?u='.base64_encode($token_user).'&token='.base64_encode($token);
        // ---------------MAIL---------------------------------------------------------------------------------------
        $to  = $email; // notez la virgule
        $subject = 'BlaBlaCampus reset password';
        
        // message
        $message = '<html><head><title>BlaBlaCampus</title></head><body>
        <a href='.$link.'>Click here to recover your password</a></body></html>';
        
        // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        
        // En-têtes additionnels
        $headers[] = 'To: Hello <'.$email.'>';
        $headers[] = 'From: BlaBlaCampus <BlaBlaCampus@example.com>';
        //  $headers[] = 'Cc: anniversaire_archive@example.com';
        //  $headers[] = 'Bcc: anniversaire_verif@example.com';
        
        // Envoi
        mail($to, $subject, $message, implode("\r\n", $headers));
        // ---------------END MAIL---------------------------------------------------------------------------------------

        header("location: ../confirmation.php?action=youHaveAnEmail");
    }else{
        header("location: ../confirmation.php?action=mailNotFound");
    }
}