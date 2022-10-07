<?php

class LoginContrl extends Login{
    
    private $pseudo;
    private $password;
    // private $image;

    public function __construct($pseudo,$password){
        $this->pseudo = $pseudo;
        $this->password = $password;
        // $this->image = $image;
    }
    public function loginUser(){
        if($this->emptyInputs()== false){
            echo "error! empty input!";
            header("location: ../../inscription.php?error=emptyinput");
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