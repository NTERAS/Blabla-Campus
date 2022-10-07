<?php
session_start();


class CreateRoute extends Dbh {

    protected function setRoute($location, $heure,$arrivee,$date,$place,$etapes,$road,$etapes1,$etapes2,$final_hour,$step_hour1,$step_hour2){
        $id = $_SESSION["userid"];
        $stmt = $this->connect()->prepare('INSERT INTO trajet (depart,depart1,depart2, arriver, calendar, routehours, routetype, guest, intermediaire,id_utilsateur,step_hour_1,step_hour_2,final_hour) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');

        $result = $stmt->execute(array($location,$etapes1,$etapes2,$arrivee,$date,$heure,$road,$place,$etapes,$id,$step_hour1,$step_hour2,$final_hour));
        $stmt->debugDumpParams();
        // var_dump($result);
        if($result==false){
            $stmt = null; //delete the statement
            echo "stmt failed";
            // header("location: ../../confirmation.php?action=creationtr");
            exit();
        }
        $stmt = null;
    }

}