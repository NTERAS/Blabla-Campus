<?php
$title = "Supprimer - Blabla Campus";
include_once 'header.php';
if(isset($_GET['id'])){
    $idt = $_GET['id'];
}else{
    header("location: index.php");
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
            <!-- <main class="dekstop box"> -->
                <main class="dekstop">
                
                            <header id="headerprofil"
                                class="connexion w100 mt-5 is-flex is-justify-content-space-between is-align-items-center">
                                <a href="index.php" class="btnbacknone"><img src="assets/img/logo/logo.svg"
                                        alt="Le logo Blabla Campus"></a>
                                <a href="profil.php" class="btnbacknone"><img src="assets/img/icones/People.svg"
                                        alt="Icon d'une personne"></a>
                            </header>
                <main>
                    <div
                        class="container my-5 is-flex is-justify-content-center is-flex-direction-column is-align-items-center">
                        <p class="bungee my-4 mx-5 w90">Supprimer</p>
                        <p class="greyText">Etes vous sûr de vouloir supprimer ce trajet ?</p>
                        <form action="PHP/includes/delete-traj.inc.php" method="post">
                            <!-- form submit -->
                            <a href="PHP/includes/delete-traj.inc.php?id=<?php echo $idt;?>"
                                class="button redBtn mx-auto my-3 largeBtn">Supprimer</a>

                        </form>
                        <a href="mesTrajets.php" class="redText mx-auto my-5 forget">Retour</a>
                        </form>


    </main>
</body> 

</html>