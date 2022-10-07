<?php
session_start();

class Routes extends Dbh {

    protected function searchRoute($id){
        $stmt = $this->connect()->prepare('SELECT * FROM trajet INNER JOIN utilisator ON trajet.id_utilsateur = utilisator.id_user WHERE id_trajet = ?');

        $resultat = $stmt->execute(array($id));
        echo "julieeeeenn!!!!";
        // $stmt->debugDumpParams();
        // var_dump($result);
        if($resultat==false){
            $stmt = null; //delete the statement
            echo "stmt failed";
            header("location: ../../resultat.php?error=stmtFailed");
            exit();
        }
        
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $_SESSION["specific_calendar"] = $user[0]["calendar"];
        $_SESSION["specific_depart"] = $user[0]["depart"];
        $_SESSION["specific_arriver"] = $user[0]["arriver"];
        $_SESSION["specific_routetype"] = $user[0]["routetype"];
        $_SESSION["specific_owner"] = $user[0]["pseudo"];

        $_SESSION["trajet_id_k"] = $id;

        $a = $_SESSION["specific_calendar"];
        $b = $_SESSION["specific_depart"];
        $c = $_SESSION["specific_arriver"];
        $d = $_SESSION["specific_routetype"];
        $e = $_SESSION["specific_owner"];
        $f = $_SESSION["trajet_id_k"];
     


        echo $a."<br>";
        echo $b."<br>";
        echo $c."<br>";
        echo $d."<br>";
        echo $e."<br>";
        echo $f."<br>";


            // var_dump($user);

            $stmt = null;
        }

    }