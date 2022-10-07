<?php
session_start();
// $test1 = $_SESSION["username"];
// $test2 = $_SESSION["userid"];
if(isset($_SESSION["username"])){
    $a = $_SESSION["username"];

    header("location: rechercher.php?connected");
    // echo $test2;
    }
    else{
    
    // echo "NOT logged in, $test2";
    }
    $title = "connexion";
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


            <main class='dekstop'>
                <header id="headerprofil"
                    class="connexion w100 mt-5 is-flex is-justify-content-space-between is-align-items-center">
                    <a href="index.php" class="btnbacknone"><img src="assets/img/logo/logo.svg"
                            alt="Le logo Blabla Campus"></a>
                    <p>se connecter</p>
                </header>
                <div class="container is-flex is-justify-content-center is-flex-direction-column my-5">
                    <p class="bungee my-5 mx-3">ENTREZ VOS INFORMATIONS</p>
                    <form action="PHP/includes/login.inc.php" method="POST"
                        class="loginForm is-flex is-flex-direction-column container">
                        <!-- form login -->
                        <input type="text" name="login" id="login" class="input is-medium"
                            placeholder="Nom d'utilisateur">
                        <!-- form password -->
                        <input type="password" name="password" id="password" class="input is-medium mb-5"
                            placeholder="********************">
                        <!-- form submit -->
                        <button class="button redBtn mx-auto my-3" name="action">SE CONNECTER</button>
                    </form>
                    <a href="passForget.php" class="redText mx-auto my-5 forget">Mot de passe oublié</a>
                </div>
            </main>




        </div>

    </section>
    <script src="assets/js/app.js"></script>

</body>

</html>