<?php
$title = "Annulation réservation - Blabla Campus";
include 'headerSimple.php';

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    header("location: index.php");
}


?>


<main>
    <div class="container my-5 is-flex is-justify-content-center is-flex-direction-column is-align-items-center">
        <p class="bungee my-4 mx-5 w90">Annulation</p>
        <p class="greyText">Etes vous sûr de vouloir annuler cette réservation ?</p>
        <form action="" method="post">
            <!-- form submit -->
            <a class="button redBtn mx-auto my-3 largeBtn" href="PHP/includes/delete-mail.inc.php?id=<?php echo $id;?>">Annuler ma réservation</a>
        </form>
        <a href="PHP/includes/search-mail-type-2.inc.php" class="redText mx-auto my-5 forget">Retour</a>
        </form>

</main>
</body>

</html>