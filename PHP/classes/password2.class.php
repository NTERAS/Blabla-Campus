<?php



class Masterword2 extends Dbh {

    protected function passwordFinallyReplaced($pwd,$token){
        $token = base64_decode($token);
        

    $stmt = $this->connect()->prepare('UPDATE utilisator SET pass = ? WHERE token = ? ');
    $result = $stmt->execute(array($pwd,$token));
    $stmt->debugDumpParams();



        // var_dump($result);
        // $result=true;
        if($result==false){
            $stmt = null; //delete the statement
            echo "stmt failed";
            // header("location: ../../editCompte.php?error=stmtFailed");
            exit();
        }
        $stmt = null;

        $stmt = $this->connect()->prepare('DELETE FROM password_recover WHERE token_user = ?');
            $resultat = $stmt->execute(array($token));
            $stmt->debugDumpParams();
            

            // var_dump($user);

            $stmt = null;
    }

}