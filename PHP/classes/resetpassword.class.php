<?php 

class ResetMDP extends Dbh{

    public function Reset($email){
        $sql = $this->connect()->prepare("SELECT * FROM `utilisator` WHERE `email` = :email");
        $sql->bindParam(':email',$email);
        $sqlend = $sql->execute();
    }
}
?>