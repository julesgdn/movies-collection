<?php
require("connexion.php");
try{
    $connexion = connect_bd();
    $recherche = "SELECT * FROM FILMS";
    $result = $connexion->query($recherche);
        echo $result;

    $connexion = null;
}
catch (PDOException $e) {
    echo $e−>getMessage();
}