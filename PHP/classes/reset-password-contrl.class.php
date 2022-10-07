<?php

class PasswordForgot extends ForgetPassword{
    private $email;
   

    public function __construct($email){
        $this->email = $email;
     
    }
   public function changePassword(){
    $this->changeMyPassword($this->email);
   }


}