<?php 

class Deletetraj extends Dbh{

    protected function Delete($idt){
        $sql = $this->connect()->prepare("DELETE FROM trajet WHERE id_trajet = :idt");
        $sql->bindParam(':idt',$idt);
        $sqlend = $sql->execute();

        header('Location: ../includes/my-routes.inc.php?idimport='.$idt);
    }
}
?>