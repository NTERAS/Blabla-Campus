<?php
session_start();
$b = $_SESSION["userid"];

$idt = $_GET['id'];

include('../classes/dbh.class.php');
include('../classes/delete-traj.class.php');
include('../classes/delete-trajcontrl.class.php');

$delete = new DeleteContrl($idt);
$delete->Myidt();


// header('Location: ../includes/my-routes.inc.php?idimport='.$b);
header('Location: ../../confirmation.php?action=deletetraj');