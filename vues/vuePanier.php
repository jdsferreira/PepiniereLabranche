<?php $titre = 'Votre panier' ?>;

<?php ob_start(); ?>

<?php
        $total = null;
        while ($quantite = $reqQuant->fetch()) {
            $total = $total + $quantite['Qte'];
        }
        if ($total == 0){
            echo '<h2 style="text-align: center;">Votre panier est vide ! </h2>';
        }else {
        ?>
            <h2 style="text-align: center;">Voici votre panier d'achat ! </h2>
            <table class="zui-table zui-table-rounded">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Article</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th colspan="2">Sous-Total</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    
                    while ($donnees = $panier->fetch()) {
                        if($donnees['Qte']>0){
                        ?>
                    
                            <tr>
                                <td>
                                    <?php
                                    echo $i.' ';
                                    ?>              
                                </td>
                                <td>
                                    <?php
                                    echo $donnees['Nom'].' ';
                                    ?>    
                                </td>
                                <td>
                                    <?php
                                    echo $donnees['Prix'].' ';
                                    ?>    
                                </td>
                                <td>
                                    
                                    <form action = "index.php?action=modifierItemPanier&idProduit=<?= $donnees['ProduitID']?>" method="post">	
                                        <input type="number" name="nouvelleQte" placeholder="<?=$donnees['Qte']?>" min="0" max="<?= $donnees['QteDisp']?>"/>
                                        <input type="submit" value="Modifier"/>
                                    </form>
                                </td>
                                <td>
                                    <?php
                                    echo ($donnees['Prix']*$donnees['Qte']).' ';
                                    ?>    
                                </td>
                                <td>
                                    <form action = "index.php?action=annulerItemPanier&idProduit=<?= $donnees['ProduitID']?>" method="post">
                                        <input type="submit" onclick="return checkDelete()"value="Supprimer"/>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                
                        $i++; 
                    } ?>
                </tbody> 
            </table>
<?php
}
?>
</div>

<div class="form-style-10">
<h1>Vos informations<span>Entrez les details pour votre commande</span></h1>

<form action="index.php?action=confirmation" method="post" id="formulaire">
    <div class="section"><span>1</span>Prenom et Adresse</div>
    <div class="inner-wrap">
        <label>Votre nom <input type="text" name="field1" /></label>
        <label>adresse <textarea name="field2"></textarea></label>
    </div>

    <div class="section"><span>2</span>Courreil et telephone</div>
    <div class="inner-wrap">
        <label>Adresse courriel <input type="email" name="field3" /></label>
        <label>numero de telephone <input type="text" name="field4" /></label>
    </div>

    <div class="section"><span>3</span>mot de passe</div>
        <div class="inner-wrap">
        <label>mot de passe <input type="password" name="field5" /></label>
        <label>Confirmer votre mot de passe <input type="password" name="field6" /></label>
    </div>
    <div class="button-section">
     <input type="submit" value="Valider" name="Sign Up" />
     <span class="privacy-policy">
     <input type="checkbox" name="field7">Vous acceptez nos termes et modalites. 
     </span>
    </div>

</div>
        
    
</form>
</div>
<?php $contenu = ob_get_clean(); ?>


<?php require('template2.php'); ?>