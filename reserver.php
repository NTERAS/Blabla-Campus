<?php
session_start();
if(isset($_SESSION["username"]) && isset($_SESSION["specific_calendar"])){
    $user_connected = $_SESSION["userid"];
    $user_name = $_SESSION["username"];
}else{
    header("location: index.php");
}

$cal = $_SESSION["specific_calendar"];
$dep = $_SESSION["specific_depart"];
$arr = $_SESSION["specific_arriver"];
$retour = $_SESSION["specific_routetype"];
$id_owner = $_SESSION["specific_owner"];
$tr_trajet = $_SESSION["idowner"];

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

$title = "Réservation - Blabla Campus";
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
            <img class="posabL" src="assets/img/autres/pos1.svg" alt="">
            <img class="posabR" src="assets/img/autres/pos2.svg" alt="">
            <!-- <main class="dekstop box"> -->
            <main class="dekstop">
                <header id="headerprofil"
                    class="connexion w100 mt-5 is-flex is-justify-content-space-between is-align-items-center">
                    <a href="index.php" class="btnbacknone"><img src="assets/img/logo/logo.svg"
                            alt="Le logo Blabla Campus"></a>
                    <a href="profil.php" class="btnbacknone"><img src="assets/img/icones/People.svg"
                            alt="Icon d'une personne"></a>
                </header>
                <div
                    class="container my-5 is-flex is-justify-content-center is-flex-direction-column is-align-items-center">
                    <!-- coordonnées -->
                    <p class="bungee my-4 mx-5 w90">réserver une place</p>

                    <!-- grey area date/trajet/arrow -->
                    <div
                        class="greyBack is-flex is-justify-content-space-between is-align-items-center w90 mx-auto greyArea p-5">
                        <div class="date_D_M">
                            <p class="bungee redColor"><?php echo $day; ?></p>
                            <p class="bungee"><?php echo $month; ?></p>
                        </div>
                        <div class="trajet w60">
                            <p class="bungee greyText epilogue"><?php echo $dep; ?></p>
                            <p class="bungee greyText epilogue"><?php echo $arr; ?></p>
                        </div>
                        <div class="arrow redColor">
                            <?php 
                if($retour == "simple"){
                    echo '<img src="assets/img/icones/arrowDown.svg" alt="flèche">';
                }else{
                    echo '<img src="assets/img/icones/arrow.svg" alt="flèche">';
                }
                
                ?>
                        </div>
                    </div>

                    <!-- message prédéfini -->
                    <div class="w90 mx-auto epilogue greyText px-4 ">
                        <p class="my-3">Bonjour <span class="redColor"><?php echo $id_owner; ?></span></p>
                        <p class="my-2">Je souhaiterai réserver une place dans ta voiture pour le trajet <span
                                class="redColor"><?php
                    echo $dep."-".$arr; ?></span></p>
                        <p class="my-3">En te remerciant.</p>
                    </div>

                    <form action="PHP/includes/mail.inc.php" method="post">
                        <div>
                            <input type="hidden" name="id_receiver" value="<?php echo $id_owner; ?>">
                            <input type="hidden" name="name_sender" value="<?php echo $user_name; ?>">
                            <input type="hidden" name="id_sender" value="<?php echo $user_connected; ?>">
                            <input type="hidden" name="depart" value="<?php echo $dep; ?>">
                            <input type="hidden" name="arriver" value="<?php echo $arr; ?>">
                            <input type="hidden" name="day" value="<?php echo $day; ?>">
                            <input type="hidden" name="month" value="<?php echo $month; ?>">
                            <input type="hidden" name="year" value="<?php echo $year; ?>">
                            <button class="button redBtn mt-5" name="submit" value="reserver">
                                <p>Envoyer ma demande</p>
                            </button>
                        </div>
                    </form>

                </div>
            </main>
</body>

</html>