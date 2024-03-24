<?php
    session_start();
    
    // On vide le message flash
    $_SESSION['flash_message_index'] = "";
    $_SESSION['flash_message_recap'] = "";


    // Permet d'enregister un produit

    //Si $_POST contient une clé submit
    if(isset($_POST['submit'])){

        // on crée nos variables qui vont récupérer les valeurs qu'on a saisies qui seront filtrées
        $name = filter_input(INPUT_POST, "name",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price",FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST, "qtt",FILTER_VALIDATE_INT);

        // Si tous les champs on bien été remplis
        if($name && $price && $qtt){
            
            // on crée un tableau avec nos caractéristiques
            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];

            // On enregistre les produits dans $_SESSION dans la clé "products"
            $_SESSION["products"][]= $product;

            // On crée un message flash de succès
            $_SESSION['flash_message_index'] = "Enregistrement effectué !";
 
        } else {

            // Si tous les champs n'ont pas été remplis on crée un message flash d'erreur
            $_SESSION['flash_message_index'] = "L'enregistrement n'a pu être effectué !";
    
    
        }

        // Redirection sur index.php
        header("Location:index.php");
    
    }

    // Permet de supprimer un produit

    //Si $_GET contient une clé supprimer
    if(isset($_GET['supprimer'])){

        // On définit l'index du produit
        $index = $_GET['index'];

        $_SESSION['flash_message_recap'] = "Le produit ".$_SESSION["products"][$index]['name']. " a été supprimé!" ;

        // On supprime le tableau de ce produit de $_SESSION["products"]
        unset($_SESSION["products"][$index]);

        // Redirection
        header("Location:recap.php");

        
    
    }

    // Permet de supprimer tous les produits en une fois

    //Si $_GET contient une clé supprimerTout
    if(isset($_GET['supprimerTout'])){

        // Supprime tous les elements de $_SESSION['products']
        unset($_SESSION['products']);

        // $_SESSION['products'] = [];

        // array_splice($_SESSION, 1, 1);

        $_SESSION['flash_message_recap'] = "Tous les produits ont étés supprimés!";

        header("Location:recap.php");

    }

    // Permet de diminuer la quantité d'un produit de 1

    //Si $_GET contient une clé enleverUn
    if(isset($_GET['enleverUn'])){

        

        // On définit l'index du produit
        $index = $_GET['index'];

        $_SESSION['flash_message_recap'] = "La quantité du produit ".$_SESSION["products"][$index]['name']. " a été diminuée de 1!";
        
        // On diminue la quantité de ce produit de 1
        $_SESSION["products"][$index]["qtt"] -= 1;

        // On fait une MAJ du total de ce produit
        $_SESSION["products"][$index]["total"] = $_SESSION["products"][$index]["price"] * $_SESSION["products"][$index]["qtt"];


        header("Location:recap.php");

    }


    // Permet d'augmenter la quantité d'un produit de 1

    //Si $_GET contient une clé ajouterUn
    if(isset($_GET['ajouterUn'])){

        // On définit l'index du produit
        $index = $_GET['index'];

        $_SESSION['flash_message_recap'] = "La quantité du produit ".$_SESSION["products"][$index]['name']. " a été augmentée de 1!";

        // On augmente la quantité de ce produit de 1
        $_SESSION["products"][$index]["qtt"] += 1;

        // On fait une MAJ du total de ce produit
        $_SESSION["products"][$index]["total"] = $_SESSION["products"][$index]["price"] * $_SESSION["products"][$index]["qtt"];
        
        header("Location:recap.php");

    }


  