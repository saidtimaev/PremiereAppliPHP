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
function getMessageFlash(){
    $message = $_SESSION['flash_message'] ?? "";
    // unset($_SESSION['flash_message']);
    return $message;
}

?>

