<?php

// Dans cette classe tu ajoutes toutes les fonctions qui ont un lien direct avec la Base de donnée.

class Signup extends Dbh {

    protected function setUser($name, $pseudo,$password,$email,$answer,$biographie,$image){
        $stmt = $this->connect()->prepare('INSERT INTO utilisator (nom, pseudo, pass, email, bio,avatar, genre, date_inscription,fumeur,token) VALUES (?,?,?,?,?,?,?,?,?,?)');

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $date = "2022-01-01";
        $fumeur = "non";
        $token = bin2hex(openssl_random_pseudo_bytes(24));
        // $image = NULL;
        $result = $stmt->execute(array($name,$pseudo,$hashedPwd, $email, $biographie,$image,$answer,$date,$fumeur,$token));
        // $stmt->debugDumpParams();
        // var_dump($result);
        if($result==false){
            $stmt = null; //delete the statement
            echo "stmt failed";
            header("location: ../../index.html?error=stmtFailed");
            exit();
        }
        $stmt = null;
    }

    protected function checkUser($pseudo, $email){
        $stmt = $this->connect()->prepare('SELECT nom FROM utilisator WHERE pseudo = ? OR email= ?;');

        if(!$stmt->execute(array($pseudo, $email))){
            $stmt = null; //delete the statement
            header("location: ../../recherche.html?error=stmtFailed");
            exit();
        }
        
        $resultCheck = $stmt->rowCount();

        
        if($stmt->rowCount()>0){
            $resultCheck = false;
        }else{
            $resultCheck = true;
        }
        return $resultCheck;
    }

}