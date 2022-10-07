<?php
session_start();

if(isset($_SESSION["username"])){
    $a = $_SESSION["username"];
    $b = $_SESSION["userid"];

    echo "hello $a <br>";
    echo "your id is: $b <br>";
 
    }
    else{
    
        header('Location: confirmation.php?action=NotloggedIn');
    }
$title = "rechercher Blabla Campus";
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

            <main class="dekstop box">
                <div class="container is-flex is-justify-content-center is-flex-direction-column my-5">
                    <!-- coordonnées -->
                    <p class="bungee my-4 mx-3">rechercher un trajet</p>

                    <form action="PHP/includes/search-route.inc.php"
                        class="loginForm is-flex is-flex-direction-column container" method="GET"
                        enctype="multipart/form-data" autocomplete="false">

                        <!-- depart -->
                        <div class="control has-icons-left">
                            <label for="depart" class="greyText">D'où partez vous ?</label>
                            <span class="icon is-small is-left mt-3">
                                <svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.657 14.6567L10.414 18.8997C10.2284 19.0854 10.0081 19.2328 9.76556 19.3333C9.52303 19.4339 9.26305 19.4856 9.0005 19.4856C8.73796 19.4856 8.47798 19.4339 8.23544 19.3333C7.99291 19.2328 7.77256 19.0854 7.587 18.8997L3.343 14.6567C2.22422 13.5379 1.46234 12.1124 1.15369 10.5606C0.845043 9.00873 1.00349 7.40022 1.60901 5.93844C2.21452 4.47665 3.2399 3.22725 4.55548 2.34821C5.87107 1.46918 7.41777 1 9 1C10.5822 1 12.1289 1.46918 13.4445 2.34821C14.7601 3.22725 15.7855 4.47665 16.391 5.93844C16.9965 7.40022 17.155 9.00873 16.8463 10.5606C16.5377 12.1124 15.7758 13.5379 14.657 14.6567V14.6567Z"
                                        stroke="#333333" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M12 8.99969C12 9.79534 11.6839 10.5584 11.1213 11.121C10.5587 11.6836 9.79565 11.9997 9 11.9997C8.20435 11.9997 7.44129 11.6836 6.87868 11.121C6.31607 10.5584 6 9.79534 6 8.99969C6 8.20405 6.31607 7.44098 6.87868 6.87837C7.44129 6.31576 8.20435 5.99969 9 5.99969C9.79565 5.99969 10.5587 6.31576 11.1213 6.87837C11.6839 7.44098 12 8.20405 12 8.99969V8.99969Z"
                                        stroke="#333333" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></span>
                            <div class="autocomplete-container" id="autocomplete-container">
                                <input type="text" placeholder="etapes" id="location" name="location"
                                    class="input my-3 py-5" value="">
                            </div>

                        </div>
                        <!-- arrivée -->
                        <div class="control has-icons-left mb-3">
                            <div class="select w100">
                                <label for="arrivee" class="greyText py-2">Pour allez où ?</label>
                                <select name="arrivee" id="arrivee">
                                    <option value="" disabled selected>Destination</option>
                                    <option value="Centre Avenue du Stade">Centre Avenue du Stade</option>
                                    <option value="Campus numérique">Campus numérique</option>
                                </select>
                            </div>
                            <div class="icon is-small is-left">
                                <svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.657 14.6567L10.414 18.8997C10.2284 19.0854 10.0081 19.2328 9.76556 19.3333C9.52303 19.4339 9.26305 19.4856 9.0005 19.4856C8.73796 19.4856 8.47798 19.4339 8.23544 19.3333C7.99291 19.2328 7.77256 19.0854 7.587 18.8997L3.343 14.6567C2.22422 13.5379 1.46234 12.1124 1.15369 10.5606C0.845043 9.00873 1.00349 7.40022 1.60901 5.93844C2.21452 4.47665 3.2399 3.22725 4.55548 2.34821C5.87107 1.46918 7.41777 1 9 1C10.5822 1 12.1289 1.46918 13.4445 2.34821C14.7601 3.22725 15.7855 4.47665 16.391 5.93844C16.9965 7.40022 17.155 9.00873 16.8463 10.5606C16.5377 12.1124 15.7758 13.5379 14.657 14.6567V14.6567Z"
                                        stroke="#333333" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M12 8.99969C12 9.79534 11.6839 10.5584 11.1213 11.121C10.5587 11.6836 9.79565 11.9997 9 11.9997C8.20435 11.9997 7.44129 11.6836 6.87868 11.121C6.31607 10.5584 6 9.79534 6 8.99969C6 8.20405 6.31607 7.44098 6.87868 6.87837C7.44129 6.31576 8.20435 5.99969 9 5.99969C9.79565 5.99969 10.5587 6.31576 11.1213 6.87837C11.6839 7.44098 12 8.20405 12 8.99969V8.99969Z"
                                        stroke="#333333" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        <!-- date départ -->
                        <div class="control has-icons-left pt-3 my-3">
                            <label for="date" class="greyText py-2">Quand partez vous ?</label>
                            <div class="icon is-small is-left calendar">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.4 2.79999H4.6C2.61177 2.79999 1 4.41176 1 6.39999V15.4C1 17.3882 2.61177 19 4.6 19H15.4C17.3882 19 19 17.3882 19 15.4V6.39999C19 4.41176 17.3882 2.79999 15.4 2.79999Z"
                                        stroke="#333333" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M6.4 1V4.6M13.6 1V4.6M1 8.2H19" stroke="#333333" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <input type="date" name="date" id="date" class="input is-medium" placeholder="Aujourd'hui">
                        </div>
                        <!-- **** bouton **** -->
                        <div class="mx-auto">
                            <button class="button redBtn mt-5 px-5" name="action" value="newTrajet">
                                <p class="px-5">Rechercher</p>
                            </button>
                        </div>
                    </form>

                </div>

        </div>

    </section>
    <div class="hidden addNbLocation"></div>
    <script src="assets/js/geoapify2.js"></script>
    <script src="assets/js/app.js"></script>

</body>

</html>