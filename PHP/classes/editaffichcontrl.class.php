<?php 


class EditaffichContrl extends Editaffich{
    public $idt;
    

    public function __construct($idt){
        $this->idt = $idt;
    }

    public function MyEditaffich(){
        $this->Edit($this->idt);
    }
}

?>