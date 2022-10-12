<?php
class Editaffich extends Dbh{

    protected function Edit($idt){
        $sql = $this->connect()->prepare("SELECT * FROM trajet where `id_trajet` = :idt");
        $sql->bindParam(':idt',$idt);
        $sqlend = $sql->execute();

        $trajt = $sql->fetch(PDO::FETCH_ASSOC);
        
        session_start();

        $_SESSION["trajet_depart"] = $trajt["depart"];
        $_SESSION["trajet_depart1"] = $trajt["depart1"];
        $_SESSION["trajet_depart2"] = $trajt["depart2"];
        $_SESSION["trajet_routehours"] = $trajt["routehours"];
        $_SESSION["trajet_step_hour_1"] = $trajt["step_hour_1"];
        $_SESSION["trajet_step_hour_2"] = $trajt["step_hour_2"];
        $_SESSION["trajet_final_hour"] = $trajt["final_hour"];
        $_SESSION["trajet_arriver"] = $trajt["arriver"];
        $_SESSION["trajet_calendar"] = $trajt["calendar"];
        $_SESSION["trajet_routetype"] = $trajt["routetype"];
        $_SESSION["trajet_guest"] = $trajt["guest"];
        $_SESSION["trajet_gps1"] = $trajt["coord_depart"];
        $_SESSION["trajet_gps2"] = $trajt["coord_step_1"];
        $_SESSION["trajet_gps3"] = $trajt["coord_step_2"];
    }
}