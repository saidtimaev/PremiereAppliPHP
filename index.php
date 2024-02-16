<?php
  include "fonctions.php";
  
?>
        <?php ob_start(); ?>
        <link rel="stylesheet" href="css/index.css">
        <?php $styleCSS = ob_get_clean(); ?>
        <?php ob_start(); ?>
        <title>Ajout produit</title>
        <?php $titrePage = ob_get_clean(); ?>
    
        <?php ob_start(); ?>
        <ul class="navigation">
                    <li><a class="nav-link active" href="index.php">Enregistrer des produits</a></li>
                    <li><a href="recap.php">Afficher tous les produits en session</a></li>
        </ul>
        <?php $navigation = ob_get_clean(); ?>
        <?php ob_start(); ?>
        <main>
            <div class="nbProduitsSess">
                <p>Nombre de produits enregistrés : <?php echo getNbProduits(); ?></p>
            </div>
            <div class="enregistrement">
                <p> <?php echo getMessageFlashIndex(); ?></p>
            </div>
            <div class="containerFormulaire">
                <h1>Ajouter un produit</h1>
                <form action="traitement.php" method="post">
                    <p>
                        <label>
                            Nom du produit :
                            <input type="text" name="name">
                        </label>
                    </p>
                    <p>
                        <label>
                            Prix du produit :
                            <input type="number" step="any" name="price">
                        </label>
                    </p>
                    <p>
                        <label>
                            Quantité désirée :
                            <input type="number" name="qtt" value="1">
                        </label>
                    </p>
                    <p>
                        <label>
                            <input type="submit" name="submit" value="Ajouter le produit">
                        </label>
                    </p>
                </form>
            </div>
        </main>
    <?php

        $content = ob_get_clean();

        require_once "template.php";

    ?>    
        
    





