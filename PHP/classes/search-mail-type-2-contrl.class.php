<?php

class MailSearchTwo extends Mail{
    
    private $user_id;
    private $msg_type;

    public function __construct($user_id,$msg_type){
        $this->user_id = $user_id;
        $this->msg_type = $msg_type;
    }
    public function mailFinder(){
        $this->findMailTwo($this->user_id,$this->msg_type);
    }

}