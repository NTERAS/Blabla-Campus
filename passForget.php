<?php
$title = "Réinitialisation Mot de Passe - Blabla Campus";
include_once 'headerSimple.php';
?>


<body>
    <header id="headerprofil"
        class="connexion w100 mt-5 is-flex is-justify-content-space-between is-align-items-center">
        <a href="index.php" class="btnbacknone"><img src="assets/img/logo/logo.svg" alt="Le logo Blabla Campus"></a>
        <p>MOT DE PASSE PERDU</p>
    </header>

    <main class="main100w">
        <div class="container is-flex is-justify-content-center is-flex-direction-column my-5">
            <p class="bungee mt-5 mx-3">PAS DE STRESS</p>
            <p class="my-5 mx-2 px-3 greyText">Vous ne vous souvenez plus de votre mot de passe et ne parvenez plus à
                vous connecter. Entrez votre email et réinitialisez le.</p>
            <form method="GET" action="PHP/includes/resetpassword.inc.php"
                class="loginForm is-flex is-flex-direction-column container">
                <!-- form login -->
                <input type="text" name="email" id="email" class="input is-medium" placeholder="Email">
                <!-- bouton submit Reinitialiser le mot de passe, avec un retour à la ligne -->
                <div class="mx-auto">
                    <button name="submit" class="button redBtn mt-5">
                        <p>Réinitialiser le mot de passe</p>
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
