<?php 
    require_once __DIR__.'/../config/config.php';
    if(isset($_GET['u']) && !empty($_GET['u'])){
        $token = htmlspecialchars(base64_decode($_GET['u']));
        $check = $bdd->prepare('SELECT * FROM password_recover WHERE token_user = ?');
        $check->execute(array($token));
        $row = $check->rowCount();

        if($row == 0){
            echo "Lien non valide";
            die();
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/icones/faveicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title><?php echo $title; ?></title>
</head>

<body>
    <!-- <div class="">
        <div class="">
            <div class="">
                <div class="">
                    <h4 class="">Réinitialiser mon mot de passe</h4>
                    <div class="">
                        <form action="password_change_post.php" method="POST">
                            <input type="hidden" name="token"
                                value="<?php echo base64_decode(htmlspecialchars($_GET['u'])); ?>" />
                            <input type="password" name="password" class="" placeholder="Nouveau mot de passe"
                                required />
                            <br />
                            <input type="password" name="password_repeat" class=""
                                placeholder="Nouveau mot de passe" required />
                            <button type="submit" class="redBtn">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html> -->

    <body>
        <section id="containerbox" class="w100 minh100 is-flex is-justify-content is-align-items-center">
            <div id="divleft"
                class="posre h100 w55 is-justify-content-center is-align-items-start is-flex-direction-column">
                <div class="leftDesc">
                    <div id="fond" class="posab w100">
                        <img src="../assets/img/fond/road.svg" alt="Image d'une route" class="w100">
                    </div>
                    <div>
                        <img class="logodivleft" src="../assets/img/Logo/logoName.svg" alt="logo de blabla campus">
                    </div>
                    <div class="pb-6">
                        <div id="texttitle" class="merriweather w80">
                            <p>Trouver <span class="redColor">facilement</span> un covoiturage pour se rendre en <span
                                    class="redColor">formation</span></p>
                        </div>
                        <div id="textpara" class="w65">
                            <p>Tu es nouveau dans la formation et tu cherches quelqu'un faisant le même chemin que toi
                                pour
                                venir en
                                formation.</p>
                            <p>Pas de soucis <span class="redColor">blabla Campus</span> est là pour toi.</p>
                            <p>Crée toi un compte ou connecte toi pour soit proposer un covoiturage, soit pour voir
                                toutes
                                les
                                offres disponibles des trajets.</p>
                            <p><span class="redColor">blabla Campus</span> est un service gratuit, il n'est en aucun cas
                                question de mettre en place
                                une monétisation des trajets.</p>
                            <p>Bon voyage à toutes et à tous !</p>
                        </div>
                    </div>
                    <div id="textmention" class="posab">
                        <a class="overpass redColor" href="#">Mentions Légales</a> - <a class="overpass redColor"
                            href="#">Politique de
                            confidentialité</a>
                    </div>
                </div>
            </div>

            <div id="divright"
                class="w35 posre is-flex is-justify-content-center is-align-items-center is-flex-direction-column">
                <img class="posabL" src="../assets/img/autres/pos1.svg" alt="">
                <img class="posabR" src="../assets/img/autres/pos2.svg" alt="">



                <main class='dekstop'>
                    <header id="headerprofil"
                        class="connexion w100 mt-5 is-flex is-justify-content-space-between is-align-items-center">
                        <a href="../index.php" class="btnbacknone"><img src="../assets/img/logo/logo.svg"
                                alt="Le logo Blabla Campus"></a>
                        <p>se connecter</p>
                    </header>
                    <div class="container is-flex is-justify-content-center is-flex-direction-column my-5">
                        <p class="bungee my-5 mx-3">Réinitialiser mon mot de passe </p>
                        <form action="password_change_post.php" method="POST"
                            class="loginForm is-flex is-flex-direction-column container">
                            <!-- form hidden -->
                            <input type="hidden" name="token"
                                value="<?php echo base64_decode(htmlspecialchars($_GET['u'])); ?>" />
                            <!-- form password -->
                            <input type="password" name="password" class="input is-medium mb-5" placeholder="Nouveau mot de passe"
                                required />
                            <!-- form submit -->
                            <input type="password" name="password_repeat" class="input is-medium mb-5"
                                placeholder="Confirmation de mot de passe" required />
                            <button type="submit" class="button redBtn mx-auto my-3">Modifier</button>
                        </form>
                    </div>
                </main>
            </div>
        </section>
        <script src="assets/js/app.js"></script>

    </body>

</html>