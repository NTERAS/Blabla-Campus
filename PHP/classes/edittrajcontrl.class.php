<?php 


class EditatrajContrl extends Edittarj{
    public $idt;
    public $depart;
    public $arriver;
    public $calendar;
    public $routehours;
    public $routetype;
    public $guest;
    public $intermediaire;
    

    public function __construct($idt,$depart,$arriver,$calendar,$routehours,$routetype,$guest,$intermediaire){
        $this->idt = $idt;
        $this->depart = $depart;
        $this->arriver = $arriver;
        $this->calendar = $calendar;
        $this->routehours = $routehours;
        $this->routetype = $routetype;
        $this->guest = $guest;
        $this->intermediaire = $intermediaire;
    }

    public function MyEdittraj(){
        $this->Edit($this->idt,$this->depart,$this->arriver,$this->calendar,$this->routehours,$this->routetype,$this->guest,$this->intermediaire);
    }
}

?>