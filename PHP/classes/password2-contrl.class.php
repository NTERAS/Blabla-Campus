<?php

class Password2 extends Masterword2{
    
    private $pwd;
    private $token;

    public function __construct($pwd,$token){
        $this->pwd = $pwd;
        $this->token = $token;
    }
    public function goPasswordGo(){
        $this->passwordFinallyReplaced($this->pwd,$this->token);
    }

}