<?php

class LoginContrl extends Login{
    
    private $pseudo;
    private $password;

    public function __construct($pseudo,$password){
        $this->pseudo = $pseudo;
        $this->password = $password;
    }
    public function loginUser(){
        if($this->emptyInputs()== false){
            header("location: ../../confirmation.php?action=emptyInputs");
            exit();
        }
        
        $this->getUser($this->pseudo,$this->password);
    }
    
// ERROR HANDLERS
    private function emptyInputs(){
        $result;
        if(empty($this->pseudo) || empty($this->password)){
            $result = false;
        }
        else{ $result = true;}
        return $result;
    }

    

}