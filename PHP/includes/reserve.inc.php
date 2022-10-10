<?php
session_start();

    // grabbing values----------------------------------------------------------------------------------
    $idt = $_GET["idt"];
    $idowner = $_GET["idowner"];
    $_SESSION["idowner"] = $idowner;

    //instantiate class-----------------------------------------------------------------------------
    include "../classes/dbh.class.php";
    include "../classes/routes.class.php";
    include "../classes/reserve-contrl.class.php";
    $route = new RouteByIdsContrl($idt);

    // error handlers and got o controler ----------------------------------------------------------
    $route->specificRoute();

    //back to page--------------------------------------------------------------------------------------
    header("location: ../../reserver.php?error=none");
