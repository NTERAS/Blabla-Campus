<?php

class Login extends Dbh {

    protected function getUser($pseudo,$password){
        $stmt = $this->connect()->prepare('SELECT pass FROM utilisator WHERE pseudo = ?');

        $resultat = $stmt->execute(array($pseudo));

        if($resultat==false){
            $stmt = null; //delete the statement

            header("location: ../../confirmation.php?action=stmtFailed");
            exit();
        }
        if($stmt->rowCount()==0){
            $stmt = null;
            header("location: ../../confirmation.php?action=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password,$pwdHashed[0]["pass"]);

        if($checkPwd == false){
            $stmt = null;
            header("location: ../../confirmation.php?action=wrongpassword");
            exit();
        }elseif($checkPwd == true){
            $stmt = $this->connect()->prepare('SELECT * FROM utilisator WHERE pseudo = ? AND pass = ?');
            $resultat = $stmt->execute(array($pseudo,$pwdHashed[0]["pass"]));

            if($resultat==false){
                $stmt = null; //delete the statement

                header("location: ../../confirmation.php?action=stmtFailed");
                exit();
            }
            if($stmt->rowCount()==0){
                $stmt = null;
                header("location: ../../confirmation.php?action=usernotfound");
                exit();
            }
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["id_user"];
            $_SESSION["username"] = $user[0]["pseudo"];
            $_SESSION["image"] = $user[0]["avatar"];
            $_SESSION["biog"] = $user[0]["bio"];
            $_SESSION["email"] = $user[0]["email"];
            $_SESSION["mypwd"] = $pwdHashed;

            $stmt = null;
        }

        $stmt = null;
    }

}