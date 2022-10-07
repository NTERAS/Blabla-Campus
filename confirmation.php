<?php
session_start();
$title = 'Confirmation';
include 'headerSimple.php';
// header('Refresh: 1; profil.php');
if(isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    header("location: index.php");
}

?>

<body>
    <header id="headerprofil"
        class="connexion w100 mt-5 is-flex is-justify-content-space-between is-align-items-center">
        <a href="index.php" class="btnbacknone"><img src="assets/img/logo/logo.svg" alt="Le logo Blabla Campus"></a>
        <p>Confirmation</p>
    </header>



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
            <main class="mainh100 dekstop box">


                <?php if ($action == 'edittraj') { ?>
                <div class="container  my-5">
                    <p class="greyText my-5 mx-5">Votre trajet a bien été modifié !</p>
                </div>
                <?php
header("Refresh: 1; mesTrajets.php"); 
?>
                <?php } ?>


                <?php

function positiveMsg(){
echo '<div class="container is-flex is-justify-content-center is-flex-direction-column my-5">
<!-- coordonnées -->
<p class="bungee my-3 mx-3">Félicitation</p>
</div>';
}

function negativeMsg(){
echo '<div class="container is-flex is-justify-content-center is-flex-direction-column my-5">
<!-- coordonnées -->
<p class="bungee my-3 mx-3">ERREUR</p>
</div>';
}



 if ($action == "delete") { ?>
                <div class="container  my-5">
                    <p class="greyText my-5 mx-5">Votre trajet a bien été supprimer ! :)</p>
                </div>
                <?php header("Refresh: 1; PHP/includes/redirection.inc.php"); ?>
                <?php } ?>

                <?php
if($action == "accountCreation"){
    echo '<div class="container  my-5"><p class="greyText my-5 mx-5">Votre compte a bien été crée ! :)</p></div>';
    header("Refresh: 1; connexion.php");
}
if($action == "trajetCreation"){
    echo '<div class="container  my-5">
    <p class="greyText my-5 mx-5">Votre trajet a bien été crée ! :)</p>
</div>';
header("Refresh: 1; rechercher.php");
}

if($action == "loggedIn"){
    positiveMsg();
    echo '<div class="container  my-5"><p class="greyText my-5 mx-5">Vous êtes bien connecté ! :)</p></div>';
    header("Refresh: 1; rechercher.php");
}
if($action == "msgSent"){
    positiveMsg();
    echo '<div class="container  my-5"><p class="greyText my-5 mx-5">Votre message a bien été envoyé ! :)</p></div>';
    header("Refresh: 1; rechercher.php");
}
if($action == "deleteMsg"){
    positiveMsg();
    echo '<div class="container  my-5"><p class="greyText my-5 mx-5">Votre reservation a bien été annulée ! :)</p></div>';
    header("Refresh: 1; rechercher.php");
}
if($action == "creationtr"){
    positiveMsg();
    echo '<div class="container  my-5"><p class="greyText my-5 mx-5">Votre trajet est bien crée ! :)</p></div>';
    header("Refresh: 1; rechercher.php");
}

// -------------------------ERRORS--------------------------------------------------------------------------------
if($action == "emptyInputs"){
    negativeMsg();
    echo '<div class="container  my-5"><p class="greyText my-5 mx-5">empty inputs!!!</p></div>';
    header("Refresh: 1; rechercher.php");
}

if($action == "NotloggedIn"){
    negativeMsg();
    echo '<div class="container  my-5"><p class="greyText my-5 mx-5">Vous n\'êtes pas connecté :(</p></div>';
    header("Refresh: 1; index.php");
}
if($action == "wrongpassword"){
    negativeMsg();
    echo '<div class="container  my-5"><p class="greyText my-5 mx-5">Votre mot de passe est incorrect :(</p></div>';
    header("Refresh: 1; connexion.php");
}
if($action == "usernotfound"){
    negativeMsg();
    echo '<div class="container  my-5"><p class="greyText my-5 mx-5">Cet utilisateur n\'existe pas :(</p></div>';
    header("Refresh: 1; connexion.php");
}
if($action == "noMails"){
    negativeMsg();
    echo '<div class="container  my-5"><p class="greyText my-5 mx-5">Votre messagerie est vide :(</p></div>';
    header("Refresh: 1; profil.php");
}
if($action == "noTrajets"){
    negativeMsg();
    echo '<div class="container  my-5"><p class="greyText my-5 mx-5">Vous n avez pas les trajets :(</p></div>';
    header("Refresh: 1; profil.php");
}
if($action == "noMailsResevation"){
    negativeMsg();
    echo '<div class="container  my-5"><p class="greyText my-5 mx-5">Aucune réservations trouvées :(</p></div>';
    header("Refresh: 1; profil.php");
}
if($action == "0rowcounts"){
    negativeMsg();
    echo '<div class="container  my-5"><p class="greyText my-5 mx-5">Aucun résultat suite à votre recherche :(</p></div>';
    header("Refresh: 1; rechercher.php");
}
if($action == "nameAlreadyExist"){
    negativeMsg();
    echo '<div class="container  my-5"><p class="greyText my-5 mx-5">Le nom d utilisateur ou email deja existe, choisi un autre.</p></div>';
    header("Refresh: 1; rechercher.php");
}


?>


                <!-- <div class="container my-5">
    <p class="greyText my-5 mx-5 w80">Un email vient de vous être envoye pour réinitialiser votre mot de passe
    </p>
</div> -->
                <!--  -->


                <!-- <div class="container my-5"> -->
                <!-- <p class="greyText my-5 mx-5 w80">Un email vient de vous être envoyé pour réinitialiser votre mot de passe ! -->
                <!-- </p> -->
                <!-- </div> -->
            </main>
</body>

</html>