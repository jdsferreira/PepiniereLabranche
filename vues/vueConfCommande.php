<?php $titre = 'Confirmation de votre commande' ?>;

<?php ob_start(); ?>

<p style="text-align: center;">Merci de votre achat ! </p>

<p style="text-align: center;">Un courriel de confirmation avous a été envoyé à : <strong><?php echo htmlspecialchars($_POST['field3']); ?> </strong></p>
</div>
<h3 style="text-align: center;"> Facture : </h3>
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
    $prixTotal = 0;
    while ($donnees = $requete->fetch()) {
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
                    
                <?php
                    echo $donnees['Qte'].' ';
                    ?>  
                </td>
                <td>
                    <?php
                    echo ($donnees['Prix']*$donnees['Qte']).' ';
                    $prixTotal += ($donnees['Prix']*$donnees['Qte']);
                    ?>    
                </td>
             
            </tr>
        <?php
        }
  
        $i++; 
    } ?>
    <tr>
        <td><strong>Prix total:</strong> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td><?= $prixTotal?></td>
      </tr>
</tbody>
</table>



<p style="text-align: center;"><strong>Pour effectuer d'autres achats, <a href="index.php?action=reinitialiserPanier">cliquez-ici</a></strong></p>

</br></br>
<br> Politiques de livraison et de retour : </p>
<ul>
    <li>Délai de livraison : 5-7 jours ouvrables.</li>
    <li>Livraison et retour : gratuit ! </li>
    <li>Retours acceptés d'ici 10 jours ouvrables ! </li>
</ul>


<?php $contenu = ob_get_clean(); ?>

<?php require('template2.php'); ?>