<?php

class Modify extends Dbh {

    protected function modifyUser($pseudo,$password,$email,$biographie,$image){
        $user_id = $_SESSION["userid"];
        
        
if($password == NULL){
    $stmt = $this->connect()->prepare('UPDATE utilisator SET pseudo = ?, email = ?, bio = ?, avatar = ?  WHERE id_user='.$user_id.' ');
    $result = $stmt->execute(array($pseudo,$email,$biographie,$image));

}else {
    $stmt = $this->connect()->prepare('UPDATE utilisator SET pseudo = ?, pass = ?, email = ?, bio = ?, avatar = ?  WHERE id_user='.$user_id.' ');

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    $result = $stmt->execute(array($pseudo,$hashedPwd,$email,$biographie,$image));
    // $stmt->debugDumpParams();
}

        if($result==false){
            $stmt = null; //delete the statement
            echo "stmt failed";
            header("location: ../../confirmation.php?error=stmtFailed");
            exit();
        }
        $stmt = null;

        $pseudo = $_SESSION["username"];
        $stmt = $this->connect()->prepare('SELECT * FROM utilisator WHERE pseudo = ? ');
        $stmt->execute(array($pseudo));
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION["userid"] = $user[0]["id_user"];
        $_SESSION["username"] = $user[0]["pseudo"];
        $_SESSION["image"] = $user[0]["avatar"];
        $_SESSION["biog"] = $user[0]["bio"];
        $_SESSION["email"] = $user[0]["email"];
        
        $stmt = null;
    }

}