<?php
session_start();

if(isset($_GET["action"]) && $_GET["action"]=="newTrajet" ){
    
    $req = array();
    $value = array();
    
    // grabbing values--------------------------------------------------------
    
    $b = $_SESSION["userid"];
    $try = $_SESSION["rc_search"];
    $see = $_SESSION["route_id_owner".$try];

 if (!empty($_GET['location'])) {
    array_push($req, 'AND ""?"" IN(depart, depart1, depart2) ');
    array_push($value, $_GET['location']);
    $original_location = $_GET['location'];
}else{
    $original_location =null;
}

if (!empty($_GET['arrivee'])) {
    array_push($req, 'AND arriver = ""?""');
    array_push($value, $_GET['arrivee']);
    $original_arrival = $_GET['arrivee'];
}else{
    $original_arrival =null;
}

if (!empty($_GET['date'])) {
    array_push($req, 'AND calendar = ""?""');
    array_push($value, $_GET['date']);
    $original_date = $_GET['date'];
}else{
    $original_date =null;
}
array_push($req, 'AND id_utilsateur NOT IN (""?"")');
array_push($value, $b);
array_push($req, 'AND guest NOT IN (""?"")');
array_push($value, '0');

   //instantiate class------------------------------------------------------------------------------
    include "../classes/dbh.class.php";
    include "../classes/search-routes.class.php";
    include "../classes/search-routecontrl.class.php";
    $search = new SearchRoutesContrl($req,$value,$original_location,$original_arrival,$original_date);

// error handlers and class --------------------------------------------------------------------------
    $search->theirRoutes();

    //back to page------------------------------------------------------------
    if(empty($_GET["location"]) && empty($_GET["arrivee"]) && empty($_GET["date"])){
        header("location: ../../rechercher.php?error=allempty");
    }else{
        header("location: ../../resultat.php");
    }
    
    
}