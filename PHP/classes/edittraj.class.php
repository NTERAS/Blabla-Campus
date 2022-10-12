<?php
class Edittarj extends Dbh{

    protected function Edit($idt,$depart,$depart1,$depart2,$arriver,$calendar,$routehours,$time_arr,$time1,$time2,$routetype,$guest,$gps1Php,$gps2Php,$gps3Php){
        $sql = $this->connect()->prepare("UPDATE `trajet` SET `depart`= :depart,`depart1`= :depart1,`depart2`= :depart2,`arriver`= :arriver,`calendar`= :calendar,`routehours`= :routehours,`final_hour`= :time_arr,`step_hour_1`= :time1,`step_hour_2`= :time2,`routetype`= :routetype,`guest`= :guest,`coord_depart`= :gps1Php,`coord_step_1`= :gps2Php,`coord_step_2`= :gps3Php WHERE `id_trajet` = :idt");

        $sql->bindParam(':idt',$idt);
        $sql->bindParam(':depart',$depart);
        $sql->bindParam(':depart1',$depart1);
        $sql->bindParam(':depart2',$depart2);
        $sql->bindParam(':arriver',$arriver);
        $sql->bindParam(':calendar',$calendar);
        $sql->bindParam(':routehours',$routehours);
        $sql->bindParam(':routetype',$routetype);
        $sql->bindParam(':guest',$guest);
        $sql->bindParam(':time_arr',$time_arr);
        $sql->bindParam(':time1',$time1);
        $sql->bindParam(':time2',$time2);
        $sql->bindParam(':gps1Php',$gps1Php);
        $sql->bindParam(':gps2Php',$gps2Php);
        $sql->bindParam(':gps3Php',$gps3Php);
        // $sql->bindParam(':gps1',$gps1);
        // $sql->bindParam(':gps2',$gps2);
        // $sql->bindParam(':gps3',$gps3);
        // $sql->bindParam(':hours1',$hours1);
        // $sql->bindParam(':hours2',$hours2);
        // $sql->bindParam(':hours3',$hours3);

        $sqlend = $sql->execute();

        $trajt = $sql->fetch(PDO::FETCH_ASSOC);

    }
}