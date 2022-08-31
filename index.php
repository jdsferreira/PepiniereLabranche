<!--     À FAIRE -->
<!-- 3 fonctionnalités JS (animations, etc)-->
<!-- Mettre le modèle MVC en Orienté Objet-->

<?php

require("controleurs/controleurs.php");
if (isset($_GET['action'])) {
    if ($_GET['action'] == "produit") {
        if (isset($_GET['idProduit'])) {
            afficherProduit($_GET['idProduit']);

        } else {
            afficherProduits();
            
        }
    } else if($_GET['action'] == "ajoutProduit"){
        if(isset($_GET['idProduit'])){
            ajouterProduit($_GET['idProduit'],$_POST['qte']);

        }
        else
        {
            afficherProduits();
            
        }
    }else if($_GET['action'] == "afficherPanier"){
        afficherPaniers();
    }
    else if($_GET['action'] == "modifierItemPanier"){
        if(isset($_GET['idProduit'])){
            modifierItemPanier($_GET['idProduit'],$_POST['nouvelleQte']);
        }
        else
        {
            afficherProduits();
            
        }
            
    }
    else if($_GET['action'] == "annulerItemPanier"){
        if(isset($_GET['idProduit'])){
            annulerItemPanier($_GET['idProduit']);
        }
        else
        {
            afficherProduits();
            
        }
            
    }else if($_GET['action'] == "confirmation"){
        afficherConfCommande();
    }
    else if($_GET['action'] == "reinitialiserPanier"){
        reinitialiserPanier();
    }
    else {
        afficherProduits();
        
    }
} else {
    afficherProduits();
    
}
