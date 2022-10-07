<?php

class MailContrl extends Mail{
// class MailContrl {
    private $id_receiver;
    private $name_receiver;
    private $name_sender;
    private $id_sender;
    private $depart;
    private $arriver;
    private $day;
    private $month;
    private $year;
    private $msg_type;
    private $id_trajet;

    public function __construct($id_receiver,$name_receiver,$name_sender,$id_sender,$depart,$arriver,$day,$month,$year,$msg_type,$id_trajet){
        $this->id_receiver = $id_receiver;
        $this->name_receiver = $name_receiver;
        $this->name_sender = $name_sender;
        $this->id_sender = $id_sender;
        $this->depart = $depart;
        $this->arriver = $arriver;
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
        $this->msg_type = $msg_type;
        $this->id_trajet = $id_trajet;
    }

    public function mailCreation(){
        $msg = $this->bodymsg();
        
        // $continue = $this->checkMail($this->id_receiver,$this->id_sender,$msg,$this->name_sender,$this->name_receiver);
        // echo "<br>".$continue."<br>";
            $this->setMail($this->id_receiver,$this->id_sender,$msg,$this->name_sender,$this->name_receiver,$this->depart,$this->arriver,$this->msg_type,$this->id_trajet);
        
    }
    
// FUNCTIONS OF CLASS -------------------------------------------------------------------------------------------------------------------
    private function bodymsg(){
        $result = "réservation pour le trajet ".$this->depart." ".$this->arriver." du ".$this->day." ".$this->month." ".$this->year;
        echo $result;
        return $result;
    }

}