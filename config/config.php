<?php

$hostName = "host=localhost";
$userName = "root";
$password = "";
$dbName = "dbname=blablacampus";

try {
    $bdd = new PDO("mysql:$hostName; $dbName; charset=utf8", $userName, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    $bdd = null;
}


?>