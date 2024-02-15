<?php
    include "fonctions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/recap.css">
    <title>Récapitulatif des produits</title>
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
    <div class="nbProduitsSess">
                <p>Nombre de produits enregistrés : <?php echo getNbProduits(); ?></p>
            </div>
    <div class="containerRecap">
        <?php

            

            if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                echo "<p>Aucun produit en session...</p>";
            } else {
                echo "<table>",
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th class='thNom'>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                            "<th>Supprimer ce produit</th>",
                        "</tr>",
                    "</thead>",
                    "<tbody>";
                
                $totalGeneral = 0;

                foreach($_SESSION["products"] as $index => $product){
                    echo "<tr>",
                            "<td>".$index."</td>",
                            "<td class='tdNom'>".$product["name"]."</td>",
                            "<td>".number_format($product["price"], 2, ",", "&nbsp;")."&nbsp;€</td>",
                            "<td>".$product["qtt"]."</td>",
                            "<td>".number_format($product["total"], 2, ",", "&nbsp;")."&nbsp;€</td>",
                            "<td>
                                <form action='traitement.php' method='post'>
                                    <label>
                                    <input type='submit' name='supprimer' value='Supprimer le produit'>
                                    </label>
                                </form>
                            </td>",
                        "</tr>";
                    
                    $totalGeneral += $product["total"];   

                }
                echo        "<tr>",
                                "<td colspan=4>Total général : </td>",
                                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                        "</tbody>",
                        "</table";

            }
        ?>
    </div>
    
</body>
</html>