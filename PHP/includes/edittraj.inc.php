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
// $intermediaire = $_GET['locationAdd'];


include('../classes/dbh.class.php');
include('../classes/edittraj.class.php');
include('../classes/edittrajcontrl.class.php');

$traject = new EditatrajContrl($idt,$depart,$depart1,$depart2,$arriver,$calendar,$routehours,$routetype,$guest);
$traject->MyEdittraj();


header('Location: ../../confirmation.php?action=edittraj');