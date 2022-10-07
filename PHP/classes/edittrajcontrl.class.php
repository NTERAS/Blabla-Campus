<?php 


class EditatrajContrl extends Edittarj{
    public $idt;
    public $depart;
    public $depart1;
    public $depart2;
    public $arriver;
    public $calendar;
    public $routehours;
    public $routetype;
    public $guest;
    

    public function __construct($idt,$depart,$depart1,$depart2,$arriver,$calendar,$routehours,$routetype,$guest){
        $this->idt = $idt;
        $this->depart1 = $depart1;
        $this->depart2 = $depart2;
        $this->depart = $depart;
        $this->arriver = $arriver;
        $this->calendar = $calendar;
        $this->routehours = $routehours;
        $this->routetype = $routetype;
        $this->guest = $guest;
    }

    public function MyEdittraj(){
        $this->Edit($this->idt,$this->depart,$this->depart1,$this->depart2,$this->arriver,$this->calendar,$this->routehours,$this->routetype,$this->guest);
    }
}

?>