<?php

class MyRoutesContrl extends MyRoutes{
    
    private $id;

    public function __construct($id){
        $this->id = $id;
    }
    public function myRoutes(){
        $this->showRoutes($this->id);
    }

}