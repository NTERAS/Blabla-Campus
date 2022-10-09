<?php

class CreateRouteContrl extends CreateRoute{
    private $location;
    private $heure;
    private $arrivee;
    private $date;
    private $place;
    private $etapes;
    private $road;
    private $etapes1;
    private $etapes2;
    private $final_hour;
    private $step_hour1;
    private $step_hour2;

    public function __construct($location,$heure,$arrivee,$date,$place,$etapes,$road,$etapes1,$etapes2,$final_hour,$step_hour1,$step_hour2){
        $this->location = $location;
        $this->heure = $heure;
        $this->arrivee = $arrivee;
        $this->date = $date;
        $this->place = $place;
        $this->etapes = $etapes;
        $this->road = $road;
        $this->etapes1 = $etapes1;
        $this->etapes2 = $etapes2;
        $this->final_hour = $final_hour;
        $this->step_hour1 = $step_hour1;
        $this->step_hour2 = $step_hour2;
    }
    public function newRoute(){
        if($this->emptyInputs()== false){
            echo "error! empty input!";
            header("location: ../../confirmation.php?action=emptyInputs");
            exit();
        }

        $this->setRoute($this->location,$this->heure,$this->arrivee,$this->date,$this->place,$this->etapes,$this->road,$this->etapes1,$this->etapes2,$this->final_hour,$this->step_hour1,$this->step_hour2);
    }
    
// ERROR HANDLERS---------------------------------------------------------------------------------------------
    private function emptyInputs(){
        $result;
        if(empty($this->location) || empty($this->heure) || empty($this->arrivee) || empty($this->date) || empty($this->place) || empty($this->road)){
            $result = false;
        }
        else{ $result = true;}
        return $result;
    }

}