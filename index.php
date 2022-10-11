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

            <div class="leftDesc">
                <div id="fond" class="posab w100">
                    <img src="assets/img/fond/road.svg" alt="Image d'une route" class="w100">
                </div>
                <div>
                    <img class="logodivleft" src="assets/img/Logo/logoName.svg" alt="logo de blabla campus">
                </div>
                <div class="pb-6">
                    <div id="texttitle" class="merriweather w80">
                        <p>Trouver <span class="redColor">facilement</span> un covoiturage pour se rendre en <span
                                class="redColor">formation</span></p>
                    </div>
                    <div id="textpara" class="w77 overpass">
                        <p class="overpass">Tu es nouveau dans la formation et tu cherches quelqu'un faisant le même
                            chemin que toi pour
                            venir en
                            formation.</p>
                        <p class="overpass" class="overpass">Pas de soucis <span class="redColor">Blabla Campus</span> est là pour toi.
                        </p>
                        <p class="overpass" class="overpass">Crée toi un compte ou connecte toi pour soit proposer un covoiturage, soit
                            pour voir toutes
                            les
                            offres disponibles des trajets.</p>
                        <p class="overpass"><span class="redColor">Blabla Campus</span> est un service gratuit, il n'est
                            en aucun cas
                            question de mettre en place
                            une monétisation des trajets.</p>
                        <p class="overpass">Bon voyage à toutes et à tous !</p>
                    </div>
                </div>
                <div id="textmention" class="posab">
                    <a class="overpass redColor" href="legale.php">Mentions Légales</a>
                </div>
            </div>
        </div>

        <div id="divright"
            class="w35 posre is-flex is-justify-content-center is-align-items-center is-flex-direction-column">
            <div class="mainSection">
                <div id="positionpos">
                    <img class="posabVl" src="assets/img/autres/pos1.svg" alt="">
                    <img class="posabVr" src="assets/img/autres/pos2.svg" alt="">
                </div>
                <div class="boxvritine w45 is-flex-direction-column is-justify-content-center is-align-items-center">
                    <img class="logoAnim" src="assets/img/logo/logoName.svg" alt="Logo du site">
                    <img id="picpaysage" src="assets/img/autres/paysage3.svg" alt="Paysage">
                    <form action="" class="is-flex is-flex-direction-column">
                        <a class="button workSans redBtn thebegin btnworksansred mb-5 connect"><img class="pr-5"
                                src="assets/img/icones/car.svg" alt="image d'une voiture">
                            <p>COMMENCER</p>
                        </a>
                        <a href="connexion.php" class="workSans btnworksanswhite redText ">SE
                            CONNECTER</a></button>
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
    <script>
        const logoReplace = document.querySelector('.logoAnim');
        let connect = document.querySelector(".connect");
        connect.addEventListener("click", function () {
            logoReplace.classList.add("opac");
            logoReplace.style.marginLeft = "49px";
            logoReplace.style.marginBottom = "-9px";
            logoReplace.style.width = "77%";
            logoReplace.src = "assets/img/logo/logoAnim.svg";
            setTimeout(function () {
                window.location.href = "inscription.php";
            }, 2500);
        });
    </script>
</body>

</html>