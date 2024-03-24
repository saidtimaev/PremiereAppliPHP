<?php
    include "fonctions.php";
   
?>
        
       
    
        
        <?php ob_start(); ?>
        <div class="nbProduitsSess">
            <p>Nombre de produits enregistrés : <?php echo getNbProduits(); ?></p>
        </div>
        <div class="messageActionEffectuee">
            <p> <?php echo getMessageFlashRecap(); ?></p>
        </div>
        <div class="containerRecap">
            
            <?php
    
                // Si aucun produit n'a été enrégistré
                if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                    echo "<p>Aucun produit en session...</p>";
                } else {
                    // Début table
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
                    
                    // Initialisation du compteur du total général
                    $totalGeneral = 0;

                    // Boucle qui permet d'afficher les produits et leur éléments
                    foreach($_SESSION["products"] as $index => $product){
                        echo "<tr>",
                                "<td>".$index."</td>",
                                "<td class='tdNom'>".$product["name"]."</td>",
                                "<td>".number_format($product["price"], 2, ",", "&nbsp;")."&nbsp;€</td>",
                                "<td>
                                    <form action='traitement.php' method='get'>
                                        <label>
                                            <input type='hidden' name='index' value='$index'>
                                            <input type='submit' name='enleverUn' value='-'>
                                        </label>
                                    </form> "
                                    .$product["qtt"].
                                    " <form action='traitement.php' method='get'>
                                        <label>
                                            <input type='hidden' name='index' value='$index'>
                                            <input type='submit' name='ajouterUn' value='+'>
                                        </label>
                                    </form>
                                </td>",
                                "<td>".number_format($product["total"], 2, ",", "&nbsp;")."&nbsp;€</td>",
                                "<td>
                                    <form action='traitement.php' method='get'>
                                        <label>
                                        <input type='hidden' name='index' value='$index'>
                                        <input type='submit' name='supprimer' value='Supprimer ce produit'>
                                        </label>
                                    </form>
                                </td>",
                            "</tr>";
                        
                        // On ajoute le total du produit au total général
                        $totalGeneral += $product["total"];   
                        

                    }
                    echo        "<tr>",
                                    "<td colspan=5>Total général : </td>",
                                    "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                                "</tr>",
                                "<tr>
                                    <td colspan=6>
                                        <form action='traitement.php' method='get'>
                                            <label>
                                                <input type='submit' name='supprimerTout' value='Supprimer tous les produits'>
                                            </label>
                                        </form>
                                    </td>
                                </tr>",
                            "</tbody>",
                            "</table";
                            // Fin tableau

                            // var_dump($_SESSION);
                }
            ?>
        </div>
    <?php

        $styleCSS = '<link rel="stylesheet" href="css/recap.css">';
        $titrePage = "Récapitulatif des produits";
        $pageActive = '<li><a class="nav-link" href="index.php">Enregistrer des produits</a></li>
                        <li><a class="nav-link active" href="recap.php">Récapitulatif</a></li>';
        $content = ob_get_clean();

        require_once "template.php";

    ?>   
    



    