<?php
$idt = $_GET["id"];
$depart = $_GET['location'];
$depart1 = $_GET['locationAdd'];
$depart2 = $_GET['locationAdd2'];
$arriver = $_GET['arrivee'];
$calendar = $_GET['date'];
$routehours = $_GET['heure'];
$routetype = $_GET['road'];
$guest = $_GET['place'];
// $gps1 = $_GET["trajet_gps1"];
// $gps2 =  $_GET["trajet_gps2"];
// $gps3 =  $_GET["trajet_gps3"];
// $hours1 =  $_GET["trajet_step_hour_1"];
// $hours2 =  $_GET["trajet_step_hour_2"];
// $hours3 =  $_GET["trajet_final_hour"];
// $intermediaire = $_GET['locationAdd'];


include('../classes/dbh.class.php');
include('../classes/edittraj.class.php');
include('../classes/edittrajcontrl.class.php');

$traject = new EditatrajContrl($idt,$depart,$depart1,$depart2,$arriver,$calendar,$routehours,$routetype,$guest);
$traject->MyEdittraj();


header('Location: ../../confirmation.php?action=edittraj');