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
        $message = '
        <html>
            <head>
                <title>BlaBla-Campus</title>
            </head>
        <body>
            <img src="https://julienm1517.promo-167.codeur.online/blablacampus/assets/img/logo/logoName.svg" alt="">
            <p style="color:#D41E45;">Bonjour,<br><br> 
            cliquez sur le lien ci-dessous. Vous serez redirigé vers un formulaire vous invitant à changer votre mot de passe.</p>
            <a href='.$link.' style="text-decoration:none;">Clique ici pour changer votre mot de passe.</a>
            <br> 
            <p style="color:#D41E45;">Cordialement le support de BlablaCampus.</p>
            <br>
            <br>
            <i style="color:#D41E45;">Ceci est un mail automatique, ne pas y répondre.</i>
        </body>
        </html>';
      
        
        // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';
        
        // En-têtes additionnels
        $headers[] = 'To: Hello <'.$email.'>';
        $headers[] = 'From: BlaBlaCampus <BlaBlaCampus@blabla.fr>';
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

?>
  <html>
    <head>
        <title>BlaBlaCampus</title>
    </head>
    <body>
        <p> Voici un test </p>
        <a href='.$link.'>Click here to recover your password</a>
    </body>
</html>