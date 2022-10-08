<?php
$title = "messagerie - Blabla Campus";
include_once 'header.php';
session_start();
if(isset($_SESSION["username"]) && isset($_SESSION["rc"])){
    $rc = $_SESSION["rc"]; 
  }
  else{
    header("location: index.php");
  }
?>

<body>
  <section id="containerbox" class="w100 minh100 is-flex is-justify-content is-align-items-center">
    <div id="divleft" class="posre h100 w55 is-justify-content-center is-align-items-start is-flex-direction-column">
      <?php include_once 'vitrineLeft.php'; ?>
    </div>

    <div id="divright"
      class="w35 posre is-flex is-justify-content-center is-align-items-center is-flex-direction-column">

      <!-- <main class="dekstop box"> -->
        <main class="dekstop">
        <header id="headerprofil"
          class="connexion w100 mt-5 is-flex is-justify-content-space-between is-align-items-center">
          <a href="index.php" class="btnbacknone"><img src="assets/img/logo/logo.svg" alt="Le logo Blabla Campus"></a>
          <a href="profil.php" class="btnbacknone"><img src="assets/img/icones/People.svg" alt="Icon d'une personne"></a>
        </header>
        <div class="container my-5 is-flex is-justify-content-center is-flex-direction-column is-align-items-center">
          <p class="bungee my-4 mx-5 w90">Mes trajets</p>
          <!-- grey area date/trajet/arrow -->
          <?php 
                
                for ($i=0; $i <$rc ; $i++) { 
                   
                    $cal = $_SESSION["calendar".$i];
                    $dep = $_SESSION["depart".$i];
                    $arr = $_SESSION["arriver".$i];
                    $rou = $_SESSION["routetype".$i];
                    $idt = $_SESSION["id_trajet".$i];

                    $cal = explode('-', $cal);
                    $year = $cal[0];
                    $month = $cal[1];
                    $day = $cal[2];

                    switch($month) {
                        case '01': $month = 'Jan'; break;
                        case '02': $month = 'Février'; break;
                        case '3': $month = 'Mars'; break;
                        case '4': $month = 'Avril'; break;
                        case '5': $month = 'Mai'; break;
                        case '6': $month = 'Juin'; break;
                        case '7': $month = 'Juillet'; break;
                        case '8': $month = 'Août'; break;
                        case '9': $month = 'Sep'; break;
                        case '10': $month = 'Oct'; break;
                        case '11': $month = 'Nov'; break;
                        case '12': $month = 'Dec'; break;
                        default: $month =''; break;
                      }

                    echo '<div class="is-flex is-justify-content-space-between w90 dsn optionEditDel">
                    <div class="btnEditContainer is-flex is-justify-content-center is-align-items-center">
                    <a class="btnEdit bungee" href="PHP/includes/editaffich.inc.php?id='.$idt.'">editer</a>
                    </div>
                    <div class="btnDelContainer is-flex is-justify-content-center is-align-items-center">
                    <a class="btnDel bungee" href="supprimer.php?id='.$idt.'">supprimer</a>
                    </div>';

                    
                      echo '</div>
                      <div class="greyBack is-flex is-justify-content-space-between is-align-items-center w90 mx-auto greyArea my-3 p-5 trajets">
                      <div class="date_D_M">
                          <p class="bungee redColor">'.$day.'</p>
                          <p class="bungee">'.$month.'</p>
                      </div>
                      <div class="trajet w60">
                          <p class="bungee greyText epilogue">'.$dep.'</p>
                          <p class="bungee greyText epilogue">'.$arr.'</p>
                      </div>
                      <div class="arrow redColor">';
                      if($rou=="simple"){
                        echo "<img src=\"assets/img/icones/arrowDown.svg\" alt=\"flèche\">";
                      }else{
                        echo "<img src=\"assets/img/icones/arrow.svg\" alt=\"flèche\">";
                      }
                      echo '</div>
                       
                      </div>';
                }
                ?>
  </div>
</main>

<script src="assets/js/app.js"></script>
</body>

</html>