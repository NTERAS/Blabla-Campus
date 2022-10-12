<?php

class Masterword2 extends Dbh {

    protected function passwordFinallyReplaced($pwd,$token){
        $token = base64_decode($token);
        
        $stmt = $this->connect()->prepare('UPDATE utilisator SET pass = ? WHERE token = ? ');
        $result = $stmt->execute(array($pwd,$token));
        $stmt->debugDumpParams();
        
        if($result==false){
            $stmt = null; //delete the statement
           
            header("location: ../../confirmatoin.php?action=stmtFailed");
            exit();
        }
        $stmt = null;

        $stmt = $this->connect()->prepare('DELETE FROM password_recover WHERE token_user = ?');
        $resultat = $stmt->execute(array($token));
        $stmt->debugDumpParams();
            
        $stmt = null;

    }

}