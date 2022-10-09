<?php

class ModifyContrl extends Modify{
    private $pseudo;
    private $password;
    private $email;
    private $biographie;
    private $image;

    public function __construct($pseudo,$password,$email,$biographie,$image){
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->email = $email;
        $this->biographie = $biographie;
        $this->image = $image;
    }
    public function myChanges(){
        if($this->email != "empty"){
            if($this->invalidEmail()== false){
                echo "error! invalid email!";
                header("location: ../../confirmation.php?action=invalidmail");
                exit();
            }
        }

        $this->modifyUser($this->pseudo,$this->password,$this->email,$this->biographie,$this->image);
    }
    
// ERROR HANDLERS-----------------------------------------------------------------------------------------------------------------

    private function invalidEmail(){
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }
        
        return $result;
    }

}