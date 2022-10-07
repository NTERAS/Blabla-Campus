<?php
session_start();

if(isset($_SESSION["username"])){

    // grabbing values----------------------------------------------------------------------------------
    if(isset($_GET["idimport"])){
        $myid = $_GET["idimport"];
    }else{
        $myid = $_SESSION["userid"];
    }
    
    echo "your id is: $myid <br>";
    //instantiate class-----------------------------------------------------------------------------
    include "../classes/dbh.class.php";
    include "../classes/my-routes.class.php";
    include "../classes/my-routescontrl.class.php";
    $myroutes = new MyRoutesContrl($myid);

    // error handlers and got o controler ----------------------------------------------------------
    $myroutes->myRoutes();

    //back to page--------------------------------------------------------------------------------------
    header("location: ../../mesTrajets.php?error=none");
    
    }
    else{ echo "NOT logged in"; // header("location: ../../connexion.php?empty-inputs");}
}


   