<?php
$title = "BlaBla Campus";
include_once 'headerSimple.php';

session_start();
if(isset($_SESSION["username"])){
    header("location: rechercher.php?connected");
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
            <div class="mainSection">
                <div id="positionpos">
                    <img class="posab" src="assets/img/autres/pos1.svg" alt="Logo d'une position">
                    <img class="posab" src="assets/img/autres/pos2.svg" alt="Logo d'une position">
                </div>
                <div class="boxvritine w45 is-flex-direction-column is-justify-content-center is-align-items-center">
                    <img src="assets/img/logo/logoName.svg" alt="Logo du site">
                    <img id="picpaysage" src="assets/img/autres/paysage.svg" alt="Paysage">
                    <form action="" class="is-flex is-flex-direction-column">
                        <a href="inscription.php" class="button workSans redBtn thebegin btnworksansred mb-5"><img
                                class="pr-5" src="assets/img/icones/car.svg" alt="image d'une voiture">
                            <p>COMMENCER</p>
                        </a>
                        <a href="connexion.php" class="workSans btnworksanswhite redText">SE CONNECTER</a></button>
                    </form>
                </div>
                <div id="blocphone" class="pt-5 is-justify-content-center is-align-items-center">
                    <img src="assets/img/autres/phone.svg" alt="Téléphone rouge">
                    <div id="recom">
                        <p class="bungee">CETTE APPLICATION</p>
                        <p class="bungee">EST MIEUX SUR MOBILE</p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script src="assets/js/app.js"></script>

</body>

</html>