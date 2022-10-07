<?php
session_start();
if(isset($_SESSION["username"])){
    $c = $_SESSION["image"];
    $a = $_SESSION["username"];
    $d = $_SESSION["biog"];





    }
    else{
    
    echo "NOT logged in";
    header('Location: index.php?error=NotLoggedInYet');
    }




$title = "profil Blalba Campus";
include_once "headerSimple.php";
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
                <div id="cardgeneral" class="w100 is-flex is-justify-content-center mt-5">
                    <div id="bulleprofil"
                        class="box w90 is-flex is-justify-content-space-evenly is-align-items-center is-flex-direction-column">
                        <span id="triangle"></span>
                        <figure id="profil"
                            class="w100 is-flex is-justify-content-flex-start is-align-items-center pl-1">
                            <?php
                echo '<img class="is-rounded" src="data:image;base64,' . $c . '" alt="Image dune personne"/>';
                // <img class="is-rounded" src="assets/img/logo/Pauline.png" alt="Image d'une personne">
                ?>
                            <div class="text is-flex is-justify-content-flex-start is-flex-direction-column">
                                <h2 class="redColor bungee"><?php echo $a; ?></h2>
                                <p><?php echo $d; ?></p>
                            </div>
                        </figure>
                        <a href="proposer.php" id="protrajet"
                            class="w100 redBtn is-flex is-justify-content-center is-align-items-center mt-3 p-5">
                            <img src="assets/img/icones/road.svg" alt="logo d'une route avec un plus">
                            <h3>PROPOSER UN TRAJET</h3>
                        </a>
                        <div id="prolien"
                            class="w100 is-flex is-justify-content-space-around is-align-items-flex-start is-flex-direction-column">
                            <button class=" btnbacknone is-flex is-justify-content-center align-items-center is-flex">
                                <img src="assets/img/icones/person.svg" alt="Logo d'une personne">
                                <a href="PHP/includes/my-routes.inc.php" class="ml-4 blackColor">Mes trajets</a>
                            </button>
                            <button class=" btnbacknone is-flex is-justify-content-center align-items-center is-flex">
                                <img src="assets/img/icones/book.svg" alt="Logo d'un livre">
                                <a href="PHP/includes/search-mail-type-2.inc.php" class="ml-4 blackColor">Mes
                                    réservations</a>
                            </button>
                            <button class=" btnbacknone is-flex is-justify-content-center align-items-center is-flex">
                                <img src="assets/img/icones/person.svg" alt="Logo d'une personne">
                                <a href="editCompte.php" class="ml-4 blackColor">Modifier mes informations</a>
                            </button>
                            <button class=" btnbacknone is-flex is-justify-content-center align-items-center is-flex">
                                <img src="assets/img/icones/message.svg" alt="Logo d'une bulle de message">
                                <a href="PHP/includes/search-mail.inc.php" class="ml-4 blackColor">Messagerie</a>
                            </button>
                            <button class=" btnbacknone is-flex is-justify-content-center align-items-center is-flex">
                                <img src="assets/img/icones/lineleft.svg" alt="Logo d'une flèche par la gauche">
                                <a href="PHP/includes/logout.inc.php" class="ml-4 blackColor">Se déconnecter</a>
                            </button>
                        </div>
                    </div>
                </div>
            </main>
</body>

</html>