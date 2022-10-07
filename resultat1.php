<?php
session_start();
$rc = $_SESSION["rc_search"];

// $o_loc = $_SESSION["original_location"];
$o_date = $_SESSION["original_date"];
// echo $o_loc;
// echo $o_arr;
echo $o_date;
echo $rc;


if($rc>0){
    
    if($_SESSION["original_date"] != null){
        $cal = $_SESSION["original_date"];
        $cal = explode('-', $cal);
        $year = $cal[0];
        $month = $cal[1];
        $day = $cal[2];

        switch($month) {
            case '01': $month = 'Jan'; break;
            case '02': $month = 'Février'; break;
            case '3': $month = 'Mars'; break;
            case '4': $month = 'Avril'; break;
            case '5': $month = 'Mai'; break;
            case '6': $month = 'Juin'; break;
            case '7': $month = 'Juillet'; break;
            case '8': $month = 'Août'; break;
            case '9': $month = 'Sep'; break;
            case '10': $month = 'Oct'; break;
            case '11': $month = 'Nov'; break;
            case '12': $month = 'Dec'; break;
            default: $month =''; break;
        }
    }else{
        $year = null;
        $month = null;
        $day = null;
    }

    $o_loc = $_SESSION["original_location"];


    $o_arr = $_SESSION["original_arrival"];



}


$title = "Résultat - Blabla Campus";
include_once 'header.php';
?>

<main>
    <div class="container my-5">
        <!-- coordonnées -->
        <p class="bungee my-4 mx-3">Trajets disponibles</p>

        <!-- grey area date/trajet/arrow -->
        <div class="greyBack is-flex is-justify-content-space-between is-align-items-center w90 mx-auto greyArea p-5">
            <div class="date_D_M">
                <p class="bungee redColor"><?php echo $day; ?></p>
                <p class="bungee"><?php echo $month; ?></p>
            </div>
            <div class="trajet w60">
                <p class="bungee greyText epilogue"><?php echo $o_loc; ?></p>
                <p class="bungee greyText epilogue"><?php echo $o_arr; ?></p>
            </div>
            <div class="arrow redColor">
                <img src="assets/img/icones/arrow.svg" alt="flèche">
            </div>
        </div>
        <!-- nombre de trajets disponibles -->
        <p class="epilogue greyText my-1 mx-3 p-3"> <span class="redColor"><?php echo $rc; ?> </span>trajets
            disponible(s)</p>
        <div class="is-flex w90 mx-auto mb-5">
            <img src="assets/img/icones/horloge.svg" alt="horloge">
            <p class="epilogue greyText my-1 px-3">Les trajets sont triés chronologiquement par heure de départ.</p>
        </div>

        <!-- cards Trajet -->
        <?php

            for ($i=0; $i < $rc; $i++) {
                $cal_search = $_SESSION["cal_search".$i];
                $depart_search = $_SESSION["depart_search".$i];
                $arriver_search = $_SESSION["arriver_search".$i];
                $routetype_search = $_SESSION["routetype_search".$i];
                $time_search = $_SESSION["time_search".$i];
                $place_search = $_SESSION["place_search".$i];
                $avatar_search = $_SESSION["avatar_search".$i];
                $bio_search = $_SESSION["bio_search".$i];
                $pseudo_search = $_SESSION["pseudo_search".$i];
                $route_id = $_SESSION["route_id".$i];
                
                // echo "<br>";
                // echo $route_id;

                $time = $time_search;
                $time_search = explode(':', $time_search);
                $hours = $time_search[0];
                $min = $time_search[1];
                $sec = $time_search[2];
                
                echo "<a href=\"PHP/includes/reserve.inc.php?idt=".$route_id."\"><div class=\"card w90 mx-auto\" >
                <div class=\"card-content\">
                  <div class=\"content\">
                    <!-- nombre de place disponible -->
                    <div class=\"placeDispo\">
                        <p class=\"workSans txtEnd\">PLACES DISPONIBLES : <strong class=\"redColor\">".$place_search."</strong></p>
                    </div>
                  </div>
                  <!-- heure des départs et arrivées -->
                    <div class=\"trajets is-flex\">
                        <div class=\"horaire\">
                            <p class=\"h_depart redColor epilogue mb-5\"><strong class=\"redColor\">".$hours."H".$min."</strong></p>
                            <p class=\"h_arrivee epilogue \"><strong class=\"redColor\">?php H arrivée </strong></p>
                        </div>
                        <!-- illustration, y a pas de php ici -->
                        <div class=\"schemaTraj is-flex is-flex-direction-column\">
                            <span class=\"circle\"></span>
                            <span class=\"line\"></span>
                            <span class=\"circle\"></span>
                        </div>
                        <!-- localisation -->
                        <div class=\"lieux\">
                            <p class=\"l_depart epilogue mb-5\"><strong>".$depart_search."</strong></p>
                            <p class=\"l_arrivee epilogue \"><strong>".$arriver_search."</strong></p>
                        </div>
                    </div>
                    <!-- profil -->
                    <figure class=\"is-flex is-align-items-center my-5 profil\">
                        <img class=\"is-rounded ppTrajet\" src=\"data:image;base64,".$avatar_search."\" alt=\"Image d'une personne\">
                        
                        <div class=\"text\">
                            <h2 class=\"epilogue\"><strong>".$pseudo_search."</strong></h2>
                            <p class=\"subtitle\"><i>".$bio_search."</i></p>
                        </div>
                    </figure>
              </div>
        </div></a>";
            }
            ?>
        <a href="reserver.php?day=place_search"></a>

        </body>

        </html>