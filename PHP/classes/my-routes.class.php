<?php
session_start();

class MyRoutes extends Dbh {

    protected function showRoutes($id){
        $stmt = $this->connect()->prepare('SELECT * FROM trajet WHERE id_utilsateur = ?');

        $resultat = $stmt->execute(array($id));
        echo "julieeeeenn!!!!";
        // $stmt->debugDumpParams();
        // var_dump($result);
        if($resultat==false){
            $stmt = null; //delete the statement
            echo "stmt failed";
            header("location: ../../mesTrajets.php?error=stmtFailed");
            exit();
        }
        if($stmt->rowCount()==0){
            $stmt = null;
            header("location: ../../confirmation.php?action=noTrajets");
            exit();
        }
        
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rc = $stmt->rowCount();

for ($i=0; $i < $rc ; $i++) { 
    // Natan : Ajout de l'id pour edit/delete.
    $_SESSION["id_trajet".$i] = $user[$i]["id_trajet"];
    $_SESSION["calendar".$i] = $user[$i]["calendar"];
    $_SESSION["depart".$i] = $user[$i]["depart"];
    $_SESSION["arriver".$i] = $user[$i]["arriver"];
    $_SESSION["routetype".$i] = $user[$i]["routetype"];
}
            
            
            $_SESSION["rc"] = $rc;
            // var_dump($user);

            $stmt = null;
        }

    }