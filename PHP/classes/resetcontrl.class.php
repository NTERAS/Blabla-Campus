<?php 
use ResetMDP;

class ResetContrl {
    public $email;

    public function __construct($email){
        $this->email = $email;
    }
    public function Myemail(){
        if($this->Reset($this->email)){
            $header ="MINE-Version: 1.0\r\n";
            $header.='Support - Blabla Campus'."\n";
            $header.='Content-Type:text/html; charset="utf-8"'."\n";
            $header.='Content-Transfer-Encoding: 8bit';

            $message='
                <html>
                    <body>
                        <div>
                            <br />
                            <u>Mail de l\'expéditeur :</u> '.$_POST['mail'].'
                            <br />
                            '.$_POST['message'].'
                            <br />
                        </div>
                    </body>
                </html>
            ';
            mail($email, "CONTACT - natandavid.fr", $message, $header);
            $msg="Vos informations ont été envoyé avec succès !";
        }else{
            $msg="Une erreur à été trouvé. :(";
        }
    }
}

?>