<?php
$title = "Validation - Blabla Campus";
include_once 'header.php';

session_start();
if(isset($_GET['i'])){
    $i = $_GET["i"];
$tr = $_GET["tr"];
$name_sender = $_SESSION["name-sender".$i];
$msg_type = $_SESSION["msg-type".$i];
$full_message = $_SESSION["full-message".$i];
$img_sender = $_SESSION["image-sender".$i];
$trip_depart = $_SESSION["trip_depart".$i];
$trip_arrival = $_SESSION["trip_arrival".$i];
}else{
    header("location: index.php");
}


// echo $i."<-rc<br>"; 
// echo $name_sender."<br>";
// echo $msg_type."<br>";
// echo $full_message."<br>";
// echo '<img class="is-rounded ppTrajet" src="data:image;base64,' . $img_sender . '" alt="Image d`une personne">';
?>


<body>
    <section id="containerbox" class="w100 minh100 is-flex is-justify-content is-align-items-center">
        <div id="divleft"
            class="posre h100 w55 is-justify-content-center is-align-items-start is-flex-direction-column">
            <?php include_once 'vitrineLeft.php'; ?>
        </div>

        <div id="divright"
            class="w35 posre is-flex is-justify-content-center is-align-items-center is-flex-direction-column">

            <header id="headerprofil"
                class="connexion w100 mt-5 is-flex is-justify-content-space-between is-align-items-center">
                <a href="index.php" class="btnbacknone"><img src="assets/img/logo/logo.svg"
                        alt="Le logo Blabla Campus"></a>
                <a href="profil.php" class="btnbacknone"><img src="assets/img/icones/People.svg"
                        alt="Icon d'une personne"></a>
            </header>
            <!-- <main class="dekstop box"> -->
            <main class="dekstop box">
                <main>
                    <div
                        class="container my-5 is-flex is-justify-content-center is-flex-direction-column is-align-items-center">
                        <!-- coordonnées -->
                        <p class="bungee my-4">Validation de la réservation</p>

                        <figure class="is-flex my-5 w90 profil">
                            <img class="is-rounded ppTrajet" src="data:image;base64,<?php echo $img_sender;?>"
                                alt="Image d'une personne">
                            <div class="text">
                                <h2 class="epilogue"><strong class="redColor"><?php echo $name_sender;?></strong></h2>
                                <p class="subtitle"><i><?php echo $msg_type." de "; echo $full_message;?></i></p>
                            </div>
                        </figure>

                        <!-- message prédéfini -->
                        <div class="w90 mx-auto epilogue greyText px-4 ">
                            <p class="my-3">Bonjour <span class="redColor"><?php echo $name_sender;?></span></p>
                            <p class="my-2">Je t'informe qu'une place t'attend dans ma voiture pour le <span
                                    class="redColor"><?php echo $trip_depart." - ".$trip_arrival;?></span></p>
                            <p class="my-3">A tout bientôt.</p>
                        </div>

                        <form action="PHP/includes/toValidate.inc.php?i=<?php echo $i; ?>&tr=<?php echo $tr; ?>"
                            method="post">
                            <div>
                                <button name="submit" class="button redBtn mt-5">
                                    <p>Valider la réservation</p>
                                </button>
                            </div>
                        </form>

                    </div>

                </main>
</body>

</html>