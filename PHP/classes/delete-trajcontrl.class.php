<?php 


class DeleteContrl extends Deletetraj{
    public $idt;

    public function __construct($idt){
        $this->idt = $idt;
    }

    public function Myidt(){
        $this->Delete($this->idt);
    }
}

?>