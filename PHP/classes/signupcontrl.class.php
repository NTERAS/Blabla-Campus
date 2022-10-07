<?php

// Controllers permet dans cette situation de faire des fonctions sans utiliser la base de donnée.

class SignupContrl extends Signup{
    private $name;
    private $pseudo;
    private $password;
    private $email;
    private $answer;
    private $biographie;
    private $image;

    public function __construct($name,$pseudo,$password,$email,$answer,$biographie,$image){
        $this->name = $name;
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->email = $email;
        $this->answer = $answer;
        $this->biographie = $biographie;
        $this->image = $image;
    }
    public function signupUser(){
        if($this->emptyInputs()== false){
            echo "error! empty input!";
            header("location: ../../inscription.php?error=emptyinput");
            exit();
        }
        if($this->invalidEmail()== false){
            echo "error! invalid email!";
            header("location: ../../inscription.php?error=invalidmail");
            exit();
        }
        if($this->nameAlreadyTaken()== false){
            echo "error! name already taken!";
            header("location: ../../confirmation.php?action=nameAlreadyExist");
            exit();
        }

        $this->setUser($this->name,$this->pseudo,$this->password,$this->email,$this->answer,$this->biographie,$this->image);
    }
    
// ERROR HANDLERS
    private function emptyInputs(){
        $result;
        if(empty($this->name) || empty($this->pseudo) || empty($this->password) || empty($this->email) || empty($this->biographie)){
            $result = false;
        }
        else{ $result = true;}
        return $result;
    }

    // private function defaultImage(){
    //     $result;
    //     if(empty($this->image)){
    //         $result = false;
    //     }
    //     else{ 

    //         $result = true;
    //     }
    //     return $result;
    // }

    // private function invalidName(){}
    // private function passwordMatch(){}

    private function invalidEmail(){
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function nameAlreadyTaken(){
        // $result;
        if(!$this->checkUser($this->pseudo, $this->email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

}