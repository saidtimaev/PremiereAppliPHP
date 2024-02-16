<?php
    session_start();
    
    $_SESSION['flash_message'] = "";

    if(isset($_POST['submit'])){

        $name = filter_input(INPUT_POST, "name",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price",FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST, "qtt",FILTER_VALIDATE_INT);

        if($name && $price && $qtt){
            
            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];

            $_SESSION["products"][]= $product;

            $_SESSION['flash_message'] = "Enregistrement effectué !";
 
        } else {

            $_SESSION['flash_message'] = "L'enregistrement n'a pu être effectué !";
    
    
        }

        header("Location:index.php");
    
    }

    if(isset($_GET['supprimer'])){

        $index = $_GET['index'];

        unset($_SESSION["products"][$index]);

        header("Location:recap.php");

        
    
    }

    if(isset($_GET['supprimerTout'])){

        
        unset($_SESSION['products']);

        // $_SESSION['products'] = [];

        // array_splice($_SESSION, 1, 1);

        header("Location:recap.php");

        
    
    }

  