<?php
$title = 'Réservation - Blabla Campus';
include_once 'header.php';

session_start();

if(isset($_SESSION["reserve_rc"])){

}else{
    header("location: index.php");
}

?>

<body>
    <section id="containerbox" class="w100 minh100 is-flex is-justify-content is-align-items-center">
        <div id="divleft"
            class="posre h100 w55 is-justify-content-center is-align-items-start is-flex-direction-column">
            <?php include_once 'vitrineLeft.php'; ?>
        </div>

        <div id="divright"
            class="w35 posre is-flex is-justify-content-center is-align-items-center is-flex-direction-column">
            <img class="posabL" src="assets/img/autres/pos1.svg" alt="">
            <img class="posabR" src="assets/img/autres/pos2.svg" alt="">
            <!-- <main class="dekstop box"> -->
            <main class="mainh100 dekstop">
                <header id="headerprofil"
                    class="connexion w100 mt-5 is-flex is-justify-content-space-between is-align-items-center">
                    <a href="index.php" class="btnbacknone"><img src="assets/img/logo/logo.svg"
                            alt="Le logo Blabla Campus"></a>
                    <a href="profil.php" class="btnbacknone"><img src="assets/img/icones/People.svg"
                            alt="Icon d'une personne"></a>
                </header>
                <div
                    class="container my-5 is-flex is-justify-content-center is-flex-direction-column is-align-items-center ">
                    <p class="bungee my-4 mx-5 w90">Mes réservations</p>
                    <!-- grey area date/trajet/arrow -->
                    <?php
    $res_rc =$_SESSION["reserve_rc"];
    for ($i=0; $i <$res_rc ; $i++) { 
        $res_cal = $_SESSION["reserve_calendar".$i];
        $res_dep =$_SESSION["reserve_depart".$i];
        $res_arr =$_SESSION["reserve_arrival".$i];
        $res_rtype =$_SESSION["reserve_rtype".$i];
        $res_id =$_SESSION["reserve_idmsg".$i];

        $cal = explode('-', $res_cal);
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

        echo '<div class="greyBack is-flex is-justify-content-space-between is-align-items-center w90 mx-auto greyArea p-5 my-3 reservation">
            <div class="date_D_M">
                <p class="bungee redColor">'.$day.'</p>
                <p class="bungee">'.$month.'</p>
            </div>
            <div class="trajet w60">
                <p class="bungee greyText epilogue">'.$res_dep.'</p>
                <p class="bungee greyText epilogue">'.$res_arr.'</p>
            </div>
            <div class="arrow redColor">';
            if($res_rtype=="simple"){
                echo '<img src="assets/img/icones/arrowDown.svg" alt="flèche">';
            }else{
                echo '<img src="assets/img/icones/arrow.svg" alt="flèche">';
            }
            echo ' </div>
            </div>

            <div class="is-flex is-justify-content-center w90 optionAnnulation dsn">
                <div class="btnAnnulationContainer is-flex is-justify-content-center is-align-items-center">
                    <a class="btnAnnulation bungee" href="annulationReservation.php?id='.$res_id.'">annuler</a>
                </div>
                </div>';  
    }
?>

                </div>
            </main>
            <script src="assets/js/app.js"></script>
</body>

</html>