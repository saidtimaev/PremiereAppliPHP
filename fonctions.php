<?php
session_start();

// Fonction qui permet de compter le nombre de produits total
function getNbProduits(){

    $nbProduits = 0;

    // Si $_SESSION["products"] est null alors $produits = []
    $produits = $_SESSION["products"] ?? [];

    foreach($produits as $index => $product){
        
        $nbProduits += $product["qtt"];

    }

    return $nbProduits;
}


// Fonction qui permet de récupérer le message flash
function getMessageFlashIndex(){
    $message = $_SESSION['flash_message_index'] ?? "";
    // unset($_SESSION['flash_message']);
    return $message;
}

// Fonction qui permet de récupérer le message flash
function getMessageFlashRecap(){
    $message = $_SESSION['flash_message_recap'] ?? "";
    // unset($_SESSION['flash_message']);
    return $message;
}

?>

