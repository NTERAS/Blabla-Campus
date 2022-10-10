<?php

class SearchRoutesContrl extends Routes{
    
    private $req;
    private $value;
    private $original_location;
    private $original_arrival;
    private $original_date;

    public function __construct($req,$value,$original_location,$original_arrival,$original_date){
        $this->req = $req;
        $this->value = $value;
        $this->original_location = $original_location;
        $this->original_arrival = $original_arrival;
        $this->original_date = $original_date;
    }
    public function theirRoutes(){
        $this->showRoutes($this->req,$this->value,$this->original_location,$this->original_arrival,$this->original_date);
    }

}