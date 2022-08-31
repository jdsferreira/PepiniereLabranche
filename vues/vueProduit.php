<?php $titre = $produit['Nom'] ?>;

<?php ob_start(); ?>

<body>
	</div>
	<div class="produit">
		<h1   id="titre"><?= $produit['Nom'] ?></h1>
   
		<img id="image" class="center" onmouseover="bigImg(this)" onmouseout="normalImg(this)"  src="<?= $produit['Image'] ?>" title="<?= $produit['Nom'] ?>" alt="<?= $produit['Nom'] ?>" width="300" />
		<hr>

		<h3>
			<p>
				<?php
				echo 'Prix : ' .  $produit['Prix'] . '<br />' . 'Quantité disponible : ' . $produit['Quantite'] . '<br />' . 'Description : ' . $produit['Descr'] . '<br />';
				?>
			</p>
   
		</h3>
		<form action = "index.php?action=ajoutProduit&idProduit=<?= $produit['ProduitID']?>" method="post">	
			
			<p>Ajoutez la quantité à acheter :
			<input type="number" name="qte" placeholder="Quantité" value="0" min="0" max="<?= $produit['Quantite']?>"/>
				<input type="submit" value="Ajouter" />
			</p>
		</form>

		<p><?= $produit['NomDetaille'] ?></p>

		<h2>Plus d'information sur le produit : </h2>
		<div class="liste">
		<ul >
			<?= $produit['Details'] ?>

		</ul>
        </div>
     </div>
	</div>

	<?php $contenu = ob_get_clean(); ?>

	<?php require('template.php'); ?>