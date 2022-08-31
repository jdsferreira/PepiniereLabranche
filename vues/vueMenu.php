<?php $titre = 'Pépinière Labranche !' ?>;

<?php ob_start(); ?>

<main>
    <div class="featured">
        <h2>Pepiniere Labranche</h2>
        <p>Votre paysage de reves aux bouts des doigts</p>
    </div>


    <div class="circle"></div>


    <div class="recentlyadded content-wrapper">
        <h2>Nos nouveaux arrivages</h2>
        <div class="products">

            <table>
                <?php
                while ($donnees = $requete->fetch()) {
                ?>

                    <tr>
                        <td>
                            <h3><a href="index.php?action=produit&idProduit=<?= $donnees['ProduitID'] ?>"><?= $donnees['Nom'] ?></a></h3>
                            <!--AJOUTER LE HREF DU LIEN--GET ET RESULTAT PAGE DU PRODUIT-->
                            <p>
                                <?php
                                echo 'Prix : ' .  $donnees['Prix'] . '<br />' . 'Quantité disponible : ' . $donnees['Quantite'] . '<br />' . 'Description : ' . $donnees['Descr'] . '<br />';
                                ?>
                            </p>

                        </td>
                        <td>
                            <h4><a href="index.php?action=produit&idProduit=<?= $donnees['ProduitID'] ?>"><img id="image" src="<?= $donnees['Image'] ?>" title="<?= $donnees['Nom'] ?>" width="200" alt="<?= $donnees['Nom'] ?>"></img></a></h4>
                        </td>
                    </tr>
                <?php
                } ?>
            </table>
</main>
<?php
$requete->closeCursor();
?>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>