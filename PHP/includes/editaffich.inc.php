<?php
$idt = $_GET['id'];

include('../classes/dbh.class.php');
include('../classes/editaffich.class.php');
include('../classes/editaffichcontrl.class.php');

$traject = new EditaffichContrl($idt);
$traject->MyEditaffich();
// var_dump($traject);


header('Location: ../../editer.php?id='.$idt.'');