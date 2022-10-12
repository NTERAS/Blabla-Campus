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
    public $time_arr;
    public $time1;
    public $time2;
    public $gps1Php;
    public $gps2Php;
    public $gps3Php;
    

    public function __construct($idt,$depart,$depart1,$depart2,$arriver,$calendar,$routehours,$time_arr,$time1,$time2,$routetype,$guest,$gps1Php,$gps2Php,$gps3Php){
        $this->idt = $idt;
        $this->depart1 = $depart1;
        $this->depart2 = $depart2;
        $this->depart = $depart;
        $this->arriver = $arriver;
        $this->calendar = $calendar;
        $this->routehours = $routehours;
        $this->routetype = $routetype;
        $this->guest = $guest;
        $this->time_arr = $time_arr;
        $this->time1 = $time1;
        $this->time2 = $time2;
        $this->gps1Php = $gps1Php;
        $this->gps2Php = $gps2Php;
        $this->gps3Php = $gps3Php;
    }

    public function MyEdittraj(){
        $this->Edit($this->idt,$this->depart,$this->depart1,$this->depart2,$this->arriver,$this->calendar,$this->routehours,$this->time_arr,$this->time1,$this->time2,$this->routetype,$this->guest,$this->gps1Php,$this->gps2Php,$this->gps3Php);
    }
}

?>