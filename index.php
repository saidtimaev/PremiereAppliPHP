<?php
  require "fonctions.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
        <title>Ajout produit</title>
    </head>
    <body>
        <header>
            <nav >
                <ul class="navigation">
                    <li><a href="index.php">Enregistrer des produits</a></li>
                    <li><a href="recap.php">Afficher tous les produits en session</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="nbProduitsSess">
                <p>Nombre de produits enregistrés : <?php echo getNbProduits(); ?></p>
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
        
        
    </body>
</html>




