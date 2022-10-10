<?php
session_start();
if(isset($_SESSION["rc_search"])){
$rc = $_SESSION["rc_search"];
}else{
    header("location: index.php");
}
// $o_loc = $_SESSION["original_location"];
$o_date = $_SESSION["original_date"];

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

<body>
    <section id="containerbox" class="w100 minh100 is-flex is-justify-content is-align-items-center">
        <div id="divleft"
            class="posre h100 w55 is-justify-content-center is-align-items-start is-flex-direction-column">
            <?php include_once 'vitrineLeft.php'; ?>
        </div>

        <div id="divright"
            class="w35 posre is-flex is-justify-content-center is-align-items-center is-flex-direction-column">

            <!-- <main class="dekstop box"> -->
                
                <main class="dekstop">
                <header id="headerprofil"
                    class="connexion w100 mt-5 is-flex is-justify-content-space-between is-align-items-center">
                    <a href="index.php" class="btnbacknone"><img src="assets/img/logo/logo.svg"
                            alt="Le logo Blabla Campus"></a>
                    <a href="profil.php" class="btnbacknone"><img src="assets/img/icones/People.svg"
                            alt="Icon d'une personne"></a>
                </header>
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
                $depart1_search = $_SESSION["depart1_search".$i];
                $depart2_search = $_SESSION["depart2_search".$i];
                $arriver_search = $_SESSION["arriver_search".$i];
                $routetype_search = $_SESSION["routetype_search".$i];
                $time_search = $_SESSION["time_search".$i];
                $place_search = $_SESSION["place_search".$i];
                $avatar_search = $_SESSION["avatar_search".$i];
                $bio_search = $_SESSION["bio_search".$i];
                $pseudo_search = $_SESSION["pseudo_search".$i];
                $route_id = $_SESSION["route_id".$i];
                $route_id_owner = $_SESSION["route_id_owner".$i];
                $t1_search = $_SESSION["time_step1_search".$i];
                $t2_search = $_SESSION["time_step2_search".$i];
                $t_fin_search = $_SESSION["time_final_search".$i];
        
                // $time = $time_search;
                $time_search = explode(':', $time_search);
                $hours = $time_search[0];
                $min = $time_search[1];
                $sec = $time_search[2];

                $t1_search = explode(':', $t1_search);
                $hours1 = $t1_search[0];
                $min1 = $t1_search[1];
                // $sec = $time_search[2];
                $t2_search = explode(':', $t2_search);
                $hours2 = $t2_search[0];
                $min2 = $t2_search[1];

                $t_fin_search = explode(':', $t_fin_search);
                $hours3 = $t_fin_search[0];
                $min3 = $t_fin_search[1];

                echo '<a href="PHP/includes/reserve.inc.php?idt='.$route_id.'&idowner='.$route_id_owner.'"><div class=" card w90 mx-auto">
                <div class="workSansUppercase greyText has-text-right pr-4 pt-5">
                    <p>
                        Place disponible : <strong class="redColor">'.$place_search.' </strong>
                    </p>
                </div>
                <div classe="trajet w30">
                    <div class="firstLine is-flex w60 pl-5">
                        <p class="h_depart redColor epilogue mb-5"><strong class="redColor">'.$hours.'H'.$min.'</strong>
                        </p>
                        <div>
                            <div class="circle1"></div>
                        </div>
                        <div class="l_depart epilogue mb-5"><strong>'.$depart_search.'</strong></div>
                    </div>
                    
                    <div class="etapeAdd">';
                    if($depart1_search!=NULL){
                        echo '<div class="etape1 is-flex w60 pl-5">
                        <div class="h_depart redColor epilogue mb-5"><strong>'.$hours1.'H'.$min1.'</strong>
                        </div>
                        <div>
                            <div class="circle1"></div>
                        </div>
                        <div class="l_depart epilogue mb-5"><strong>'.$depart1_search.'</strong></div>
                    </div>';
                    }
                       if($depart2_search!=NULL){
                        echo '<div class="etape2 is-flex w60 pl-5">
                        <div class="h_depart redColor epilogue mb-5"><strong>'.$hours2.'H'.$min2.'</strong></div>
                        <div>
                            <div class="circle1"></div>
                        </div>
                        <div class="l_depart epilogue mb-5"><strong>'.$depart2_search.'</strong></div>
                    </div>';
                       } 
                        
                        echo '</div>
                    
                        <div class="secondLine is-flex w60 pl-5">
                            <div class="h_arrivee epilogue redColor"><strong>'.$hours3.'H'.$min3.'</strong></div>
                            <div class="">
                                <div class="circle"></div>
                            </div>
                            <div class="l_arrivee epilogue"><strong>'.$arriver_search.'</strong>
                        </div>
                    </div>
                </div>
    
                <div class="is-flex is-align-items-center my-5 profil px-5 py-5">
                    <img class="is-rounded ppTrajet" src="data:image;base64,'.$avatar_search.'" alt="Avatar">
                    <div class="text">
                        <h2 class="epilogue"><strong>'.$pseudo_search.'</strong></h2>
                        <p class="subtitle"><i><'.$bio_search.'></i></p>
                    </div>
                </div>
            </div></a>';
                    


      

    } ?>
        
        
    






    </div>

    </body>

    </html>