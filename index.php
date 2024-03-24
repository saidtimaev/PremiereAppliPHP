<?php
  include "fonctions.php";
  
?>
      
       
    
      
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
        $styleCSS = '<link rel="stylesheet" href="css/index.css">';
        $titrePage = "Ajout produit";
        $pageActive = '<li><a class="nav-link active" href="index.php">Enregistrer des produits</a></li>
                            <li><a class="nav-link" href="recap.php">Récapitulatif</a></li>';
        $content = ob_get_clean();

        require_once "template.php";

    ?>    
        
    





