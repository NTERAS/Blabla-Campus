<?php 

require_once __DIR__.'/../config/config.php';

if (isset($_POST['password'])&&isset($_POST['password_repeat']) && isset($_POST['token'])){
    if(!empty($_POST['password'])&&!empty($_POST['password_repeat']) && !empty($_POST['token'])){
        $password = htmlspecialchars($_POST['password']);
        $password_repeat = htmlspecialchars($_POST['password_repeat']);
        $token = htmlspecialchars($_POST['token']);
        
        $check = $bdd->prepare('SELECT * FROM utilisator WHERE token = ?');
        $check->execute(array($token));
        $row = $check->rowCount();

        if($row == 1){

            if($password == $password_repeat){
                $password = password_hash($password, PASSWORD_DEFAULT);
                $update = $bdd->prepare('UPDATE utilisator SET pass = ? WHERE token = ?');
                $update->execute(array($password, $token));
                $delete = $bdd->prepare('DELETE FROM password_recover WHERE token_user = ?');
                $delete->execute(array($token));
                // echo "Mot de passe changé";
                header("location: http://localhost/Projets/Blabla-Campus/confirmation.php?action=passwordChanged");
                
            }else{
                echo "Les mots de passe ne correspondent pas";
            }


        }else {
            echo "Erreur ce compte n'existe pas";
        }
       



    } else {
        echo "Merci de renseigner un mot de passe";
    }
}