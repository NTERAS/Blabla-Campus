<?php
class Edittarj extends Dbh{

    protected function Edit($idt,$depart,$arriver,$calendar,$routehours,$routetype,$guest,$intermediaire){
        $sql = $this->connect()->prepare("UPDATE `trajet` SET `depart`= :depart,`arriver`= :arriver,`calendar`= :calendar,`routehours`= :routehours,`routetype`= :routetype,`guest`= :guest,`intermediaire`= :intermediaire WHERE `id_trajet` = :idt");

        $sql->bindParam(':idt',$idt);
        $sql->bindParam(':depart',$depart);
        $sql->bindParam(':arriver',$arriver);
        $sql->bindParam(':calendar',$calendar);
        $sql->bindParam(':routehours',$routehours);
        $sql->bindParam(':routetype',$routetype);
        $sql->bindParam(':guest',$guest);
        $sql->bindParam(':intermediaire',$intermediaire);

        $sqlend = $sql->execute();

        $trajt = $sql->fetch(PDO::FETCH_ASSOC);

    }
}