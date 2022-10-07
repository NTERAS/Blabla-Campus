<?php

class Mail extends Dbh {

    protected function setMail($id_receiver, $id_sender,$msg,$name_sender,$name_receiver,$dep,$arr,$msg_type,$id_trajet){
        // $msg_type = "Demande";
        $stmt = $this->connect()->prepare('INSERT INTO messagerie (id_receiver, id_sender, full_message, msg_type, name_sender,name_receiver,trip_depart,trip_arrival,id_trajet_msg) VALUES (?,?,?,?,?,?,?,?,?)');
        $result = $stmt->execute(array($id_receiver,$id_sender,$msg, $msg_type, $name_sender,$name_receiver,$dep,$arr,$id_trajet));
        $stmt->debugDumpParams();
        // var_dump($result);
        if($result==false){
            $stmt = null; //delete the statement
            echo "stmt failed";
            // header("location: ../../index.html?error=stmtFailed");
            exit();
        }
        $stmt = null;
    }

    protected function deleteMsg($id){
        // $msg_type = "Demande";
        $stmt = $this->connect()->prepare('DELETE FROM messagerie WHERE id_msg = ?');
        $result = $stmt->execute(array($id));
        // $stmt->debugDumpParams();
        // var_dump($result);
        if($result==false){
            $stmt = null; //delete the statement
            echo "stmt failed";
            header("location: ../../annulationReservation.php?error=stmtFailed");
            exit();
        }
        $stmt = null;
    }

    // protected function checkMail($id_receiver, $id_sender,$msg,$name_sender,$name_receiver){
    //     $stmt = $this->connect()->prepare('SELECT * FROM messagerie WHERE id_receiver = ? AND id_sender= ? AND full_message= ? AND msg_type= ? AND name_sender= ? AND name_receiver= ? ;');
    //     $msg_type = "Demande";
    //     $resultCheck=$stmt->execute(array($id_receiver,$id_sender,$msg, $msg_type, $name_sender,$name_receiver));
    //     // echo $resultCheck;
    //     $stmt->debugDumpParams();
    //     if($resultCheck==true){
    //         $resultCheck=false;
    //         $stmt = null; //delete the statement
    //         header("location: ../../reserver.php?error=stmtFailedMailChecked");
    //         exit();
    //     }else{
    //         $resultCheck=true;
    //     }
        
    //     return $resultCheck;
    // }

    protected function findMail($user_id){
        //
        $stmt = $this->connect()->prepare('SELECT * FROM messagerie INNER JOIN utilisator ON messagerie.id_sender = utilisator.id_user WHERE id_receiver = ?;');
        $resultCheck=$stmt->execute(array($user_id));
        // echo $resultCheck;
        $stmt->debugDumpParams();
        if($resultCheck==false){
            $stmt = null; //delete the statement
            header("location: ../../profil.php?error=stmtFailedMailChecked");
            exit();
        }else{
            
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $rc = $stmt->rowCount();
            if($rc==0){
                $stmt = null;
                header("location: ../../confirmation.php?action=noMails");
                exit();
            }
            // session_start();
            for ($i=0; $i <$rc ; $i++) { 
                $_SESSION["id-sender".$i] = $user[$i]["id_sender"];
                $_SESSION["full-message".$i] = $user[$i]["full_message"];
                $_SESSION["msg-type".$i] = $user[$i]["msg_type"];
                $_SESSION["name-sender".$i] = $user[$i]["name_sender"];
                $_SESSION["image-sender".$i] = $user[$i]["avatar"];
                $_SESSION["trip_depart".$i] = $user[$i]["trip_depart"];
                $_SESSION["trip_arrival".$i] = $user[$i]["trip_arrival"];
                $_SESSION["id_trajet_inc_msg".$i] = $user[$i]["id_trajet_msg"];

                $a=$_SESSION["id_trajet_inc_msg".$i];
                echo "<br>";
                echo $a;
            }
            $_SESSION["mail-rc"] = $rc;
            $_SESSION["id_receiver"] = $user[0]["id_receiver"];

            $stmt = null;
            
        }
        
    }

    protected function findMailTwo($user_id,$msg_type){
        $_SESSION["reserve_rc"] = 0;
        //
        $stmt = $this->connect()->prepare('SELECT * FROM trajet INNER JOIN messagerie ON messagerie.id_receiver = trajet.id_utilsateur WHERE id_receiver =? AND msg_type =?;');
        $resultCheck=$stmt->execute(array($user_id,$msg_type));
        // echo $resultCheck;
        // $stmt->debugDumpParams();
        if($resultCheck==false){
            $stmt = null; //delete the statement
            // header("location: ../../profil.php?error=stmtFailedMailChecked");
            exit();
        }else{
            
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $rc = $stmt->rowCount();
            if($rc==0){
                $stmt = null;
                header("location: ../../confirmation.php?action=noMailsResevation");
                exit();
            }
            // session_start();
            for ($i=0; $i <$rc ; $i++) { 
                
                $_SESSION["reserve_calendar".$i] = $user[$i]["calendar"];
                $_SESSION["reserve_depart".$i] = $user[$i]["trip_depart"];
                $_SESSION["reserve_arrival".$i] = $user[$i]["trip_arrival"];
                $_SESSION["reserve_rtype".$i] = $user[$i]["routetype"];
                $_SESSION["reserve_idmsg".$i] = $user[$i]["id_msg"];
            }
            $_SESSION["reserve_rc"] = $rc;
            // $_SESSION["id_receiver"] = $user[0]["id_receiver"];

            $stmt = null;
            
        }
        
    }

    protected function updateMessage($tr){
        $id_receiver;
            $id_sender;
            $msg_type;
            $name_sender;
            $name_receiver;
            $guest_number;

        $stmt = $this->connect()->prepare('SELECT * FROM messagerie WHERE id_trajet_msg = ?;');
        $resultCheck=$stmt->execute(array($tr));
        $stmt->debugDumpParams();
        if($resultCheck==false){
            $stmt = null; //delete the statement
            header("location: ../../profil.php?error=stmtFailedMailChecked");
            exit();
        }else{
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $rc = $stmt->rowCount();
            if($rc==0){
                $stmt = null;
                header("location: ../../profil.php?error=nomails");
                exit();
            }
            // session_start();
            $id_receiver = $user[0]["id_receiver"];
            $id_sender = $user[0]["id_sender"];
            $msg_type = $user[0]["msg_type"];
            $name_sender = $user[0]["name_sender"];
            $name_receiver = $user[0]["name_receiver"];
            // var_dump($guest_number);

            echo "<br>";
            // echo $id_receiver."<br>";
            // echo $id_sender."<br>";
            // echo $msg_type."<br>";
            // echo $name_sender."<br>";
            // echo $name_receiver."<br>";

            $stmt = null;
            
        }
        $id_receiver2 = $id_sender;
            $id_sender2 = $id_receiver;
            $msg_type2 = "Validation";
            $name_sender2 = $name_receiver;
            $name_receiver2 = $name_sender;

            // echo $id_receiver2."<br>";
            // echo $id_sender2."<br>";
            // echo $msg_type2."<br>";
            // echo $name_sender2."<br>";
            // echo $name_receiver2."<br>";

        $stmt = $this->connect()->prepare('UPDATE messagerie SET id_receiver = ?, id_sender=?, msg_type=?, name_sender=?, name_receiver=? WHERE id_trajet_msg = ?');
        $resultCheck=$stmt->execute(array($id_receiver2,$id_sender2,$msg_type2,$name_sender2,$name_receiver2,$tr));
        $stmt->debugDumpParams();
        if($resultCheck==false){
            $stmt = null; //delete the statement
            echo 'error'."<br>";
            header("location: ../../profil.php?error=stmtFailedMailChecked");
            exit();
        }else{
            $stmt = null;
        }

        $stmt = $this->connect()->prepare('SELECT * FROM trajet WHERE id_trajet = ?;');
        $resultCheck=$stmt->execute(array($tr));
        $stmt->debugDumpParams();
        // echo $resultCheck;
        $stmt->debugDumpParams();
        if($resultCheck==false){
            $stmt = null; //delete the statement
            echo 'error2'."<br>";
            header("location: ../../profil.php?error=stmtFailedMailChecked");
            exit();
        }else{
            
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $rc = $stmt->rowCount();
            if($rc==0){
                $stmt = null;
                header("location: ../../profil.php?error=nomails");
                exit();
            }
            // session_start();
            
            $guest_number = $user[0]["guest"];
            var_dump($guest_number);
            $guest_number = $guest_number - 1;
            var_dump($guest_number);

            echo "<br>";
            // echo $id_receiver."<br>";
          
            $stmt = null;
            
        }

        $stmt = $this->connect()->prepare('UPDATE trajet SET guest=? WHERE id_trajet = ?');
        $resultCheck=$stmt->execute(array($guest_number, $tr));
        $stmt->debugDumpParams();
        if($resultCheck==false){
            $stmt = null; //delete the statement
            header("location: ../../profil.php?error=stmtFailedMailChecked");
            exit();
        }else{
            $stmt = null;
        }
        
    }

}