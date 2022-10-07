<?php

class MailSearch extends Mail{
    
    private $user_id;

    public function __construct($user_id){
        $this->user_id = $user_id;
    }
    public function mailFinder(){
        $this->findMail($this->user_id);
    }

}