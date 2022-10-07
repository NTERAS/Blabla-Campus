<?php
class Editaffich extends Dbh{

    protected function Edit($idt){
        $sql = $this->connect()->prepare("SELECT * FROM trajet where `id_trajet` = :idt");

        $sql->bindParam(':idt',$idt);

        $sqlend = $sql->execute();

        $trajt = $sql->fetch(PDO::FETCH_ASSOC);
        session_start();

        $_SESSION["trajet_depart"] = $trajt["depart"];
        $_SESSION["trajet_routehours"] = $trajt["routehours"];
        $_SESSION["trajet_arriver"] = $trajt["arriver"];
        $_SESSION["trajet_calendar"] = $trajt["calendar"];
        $_SESSION["trajet_routetype"] = $trajt["routetype"];
        $_SESSION["trajet_guest"] = $trajt["guest"];
    }
}