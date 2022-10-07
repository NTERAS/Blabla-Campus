<?php
$title = "Supprimer - Blabla Campus";
include_once 'header.php';
if(isset($_GET['id'])){
    $idt = $_GET['id'];
}else{
    header("location: index.php");
}

?>

<main>
    <div class="container my-5 is-flex is-justify-content-center is-flex-direction-column is-align-items-center">
        <p class="bungee my-4 mx-5 w90">Supprimer</p>
        <p class="greyText">Etes vous sûr de vouloir supprimer ce trajet ?</p>
        <form action="PHP/includes/delete-traj.inc.php" method="post">
            <!-- form submit -->
            <a href="PHP/includes/delete-traj.inc.php?id=<?php echo $idt;?>" class="button redBtn mx-auto my-3 largeBtn">Supprimer</a>
      
        </form>
         <a href="mesTrajets.php" class="redText mx-auto my-5 forget">Retour</a>
        </form>


    </main>
</body> 

</html>