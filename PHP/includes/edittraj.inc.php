<?php
$idt = $_GET["id"];
$depart = $_GET['location'];
$arriver = $_GET['arrivee'];
$calendar = $_GET['date'];
$routehours = $_GET['heure'];
$routetype = $_GET['road'];
$guest = $_GET['place'];
$intermediaire = $_GET['locationAdd'];


include('../classes/dbh.class.php');
include('../classes/edittraj.class.php');
include('../classes/edittrajcontrl.class.php');

$traject = new EditatrajContrl($idt,$depart,$arriver,$calendar,$routehours,$routetype,$guest,$intermediaire);
$traject->MyEdittraj();


header('Location: ../../confirmation.php?action=edittraj');