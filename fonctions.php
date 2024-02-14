<?php
session_start();

function getNbProduits(){

    $nbProduits = 0;

    foreach($_SESSION["products"] as $index => $product){
        
        $nbProduits += $product["qtt"];

    }

    return $nbProduits;
}

function getMessageFlash(){
    $message = $_SESSION['flash_message'];
    // unset($_SESSION['flash_message']);
    return $message;
}

//add flash
?>

