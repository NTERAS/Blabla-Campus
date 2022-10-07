<?php

class MailUpContrl extends Mail{
    
    private $tr;

    public function __construct($tr){
        $this->tr = $tr;
    }
    public function mailUpdate(){
        
        
        $this->updateMessage($this->tr);
    }

}