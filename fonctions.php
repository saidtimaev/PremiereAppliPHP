<?php
session_start();

function getNbProduits(){

    $nbProduits = 0;

    foreach($_SESSION["products"] as $index => $product){
        
        $nbProduits += $product["qtt"];

    }

    return $nbProduits;
}

//add flash
?>

