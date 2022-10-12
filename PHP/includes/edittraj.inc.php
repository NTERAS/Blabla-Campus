<?php
$idt = $_GET["id"];
$depart = $_GET['location'];
$depart1 = $_GET['locationAdd'];
$depart2 = $_GET['locationAdd2'];
$arriver = $_GET['arrivee'];
$calendar = $_GET['date'];
$routehours = $_GET['heure'];
$time_arr = $_GET['h-arrive'];
$time1 = $_GET['h-mid1'];
$time2 = $_GET['h-mid2'];
$routetype = $_GET['road'];
$guest = $_GET['place'];
$gps1Php = $_GET['gpsCo1'];
$gps2Php = $_GET['gpsCo2'];
$gps3Php = $_GET['gpsCo3'];



include('../classes/dbh.class.php');
include('../classes/edittraj.class.php');
include('../classes/edittrajcontrl.class.php');

$traject = new EditatrajContrl($idt,$depart,$depart1,$depart2,$arriver,$calendar,$routehours,$time_arr,$time1,$time2,$routetype,$guest,$gps1Php,$gps2Php,$gps3Php);
$traject->MyEdittraj();


header('Location: ../../confirmation.php?action=edittraj');