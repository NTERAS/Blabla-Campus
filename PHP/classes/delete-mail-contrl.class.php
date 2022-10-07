<?php

class DeleteMail extends Mail{
    
    private $id;

    public function __construct($id){
        $this->id = $id;
    }
    public function idMailToDelete(){
        $this->deleteMsg($this->id);
    }

}