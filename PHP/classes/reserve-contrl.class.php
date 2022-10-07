<?php

class RouteByIdsContrl extends Routes{
    
    private $id;

    public function __construct($id){
        $this->id = $id;
    }
    public function specificRoute(){
        $this->searchRoute($this->id);
    }

}