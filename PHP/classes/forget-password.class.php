<?php



class ForgetPassword extends Dbh {

    protected function changeMyPassword($email){
        // $user_id = $_SESSION["userid"];
        
    $stmt = $this->connect()->prepare('SELECT token FROM utilisator WHERE email = ?');
    $result = $stmt->execute(array($email));
    $stmt->debugDumpParams();


            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $row = $stmt->rowCount();
            if($row == 1){
                $token = bin2hex(openssl_random_pseudo_bytes(24));
                $token_user = $user['token'];
        
                // $insert = $bdd->prepare('INSERT INTO password_recover(token_user, token) VALUES(?, ?)');
                $stmt = $this->connect()->prepare('INSERT INTO password_recover(token_user, token) VALUES(?, ?)');
                $stmt->execute(array($token_user, $token));
                $stmt->debugDumpParams();

                echo "<br>";
                var_dump($token_user);
                echo "<br>";

                $token_user = base64_encode($token_user);
                $token = base64_encode($token);

                echo "<br>";
                var_dump($token_user);
                echo "<br>";
        
                $link = 'recover.php?u='.$token_user.'&token='.$token;
        
                echo "<a href='$link'>Click here to recover your password</a>";
                $stmt = null;
        
                // $subject = "Recuperation de mot de passe - BlaBlaCampus";
                $token_user = base64_decode($token_user);
                $token = base64_decode($token);
                echo "<br>";
                var_dump($token_user);
                echo "<br>";
                $stmt = $this->connect()->prepare('SELECT token_user FROM password_recover WHERE token_user = ? AND token = ?');
                $stmt->execute(array($token_user, $token));
                $stmt->debugDumpParams();

                $row = $stmt->rowCount();
                if($row == 1){

            $get = $this->connect()->prepare('SELECT token FROM utilisator WHERE token = ?');
            $get->execute(array($token_user));
            $data_u = $get->fetch();

            if (hash_equals($data_u['token'], $token_user)) {
                header('Location: ../../password_change.php?u='.base64_encode($token_user));
            }

        }else{
            echo "Erreur compte non valide";
        }

            }else{
                echo "Cette adresse email n est pas enregistrée";
            }


            $stmt = null;
    }

}