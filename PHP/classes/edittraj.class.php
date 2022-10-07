<?php
class Edittarj extends Dbh{

    protected function Edit($idt,$depart,$depart1,$depart2,$arriver,$calendar,$routehours,$routetype,$guest){
        $sql = $this->connect()->prepare("UPDATE `trajet` SET `depart`= :depart,`depart1`= :depart1,`depart2`= :depart2,`arriver`= :arriver,`calendar`= :calendar,`routehours`= :routehours,`routetype`= :routetype,`guest`= :guest WHERE `id_trajet` = :idt");

        $sql->bindParam(':idt',$idt);
        $sql->bindParam(':depart',$depart);
        $sql->bindParam(':depart1',$depart1);
        $sql->bindParam(':depart2',$depart2);
        $sql->bindParam(':arriver',$arriver);
        $sql->bindParam(':calendar',$calendar);
        $sql->bindParam(':routehours',$routehours);
        $sql->bindParam(':routetype',$routetype);
        $sql->bindParam(':guest',$guest);

        $sqlend = $sql->execute();

        $trajt = $sql->fetch(PDO::FETCH_ASSOC);

    }
}