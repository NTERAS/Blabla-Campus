<?php
session_start();


class CreateRoute extends Dbh {

    protected function setRoute($location, $heure,$arrivee,$date,$place,$etapes,$road,$etapes1,$etapes2,$final_hour,$step_hour1,$step_hour2,$gps1,$gps2,$gps3){
        $id = $_SESSION["userid"];
        $stmt = $this->connect()->prepare('INSERT INTO trajet (depart,depart1,depart2, arriver, calendar, routehours, routetype, guest, intermediaire,id_utilsateur,step_hour_1,step_hour_2,final_hour,coord_depart,coord_step_1,coord_step_2) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');

        $result = $stmt->execute(array($location,$etapes1,$etapes2,$arrivee,$date,$heure,$road,$place,$etapes,$id,$step_hour1,$step_hour2,$final_hour,$gps1,$gps2,$gps3));
        $stmt->debugDumpParams();

        if($result==false){
            $stmt = null; //delete the statement

            header("location: ../../confirmation.php?action=stmtFailed");
            exit();
        }
        $stmt = null;
    }

}