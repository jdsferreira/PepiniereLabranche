<?php

require_once("modeles/ProduitManager.php");
require_once("modeles/PanierManager.php");

function afficherProduits()
{
    $produitManager = new ProduitManager();
    $panierManager = new PanierManager();

    $requete = $produitManager->getProduits();
    $reqQuant = $panierManager->getQuantites();
    require("vues/vueMenu.php");
}

function afficherProduit($idProduit)
{
    $produitManager = new ProduitManager();
    $panierManager = new PanierManager();

    $produit = $produitManager->getProduit($idProduit)->fetch();
    $reqQuant = $panierManager->getQuantites();
    require("vues/vueProduit.php");
}

function ajouterProduit($idProduit, $qte)
{
    $produitManager = new ProduitManager();
    $panierManager = new PanierManager();

    $reqUpdate = $produitManager->enleverDisponible($idProduit, $qte);
    $requete = $panierManager->ajouterProduitModele($idProduit, $qte);

    if ($requete->rowCount() > 0) {
        header('Location: index.php?action=produits&idProduit=' . $idProduit);
    } else {
        header('Location: index.php?erreur');
    }
}

function afficherPaniers()
{
    $panierManager = new PanierManager();
    $panier = $panierManager->getPaniers();
    $reqQuant = $panierManager->getQuantites();
    require("vues/vuePanier.php");
}

function modifierItemPanier($idProduit, $nouvelleQte)
{
    $panierManager = new PanierManager();
    $produitManager = new ProduitManager();

    $reqUpdate = $produitManager->modifierDisponible($idProduit, $nouvelleQte);
    $requete = $panierManager->modifierPanierModele($idProduit, $nouvelleQte);

    if ($requete->rowCount() > 0) {
        header('Location: index.php?action=afficherPanier&idProduit=' . $idProduit);
    } else {
        header('Location: index.php?erreur');
    }
}

function annulerItemPanier($idProduit)
{
    $panierManager = new PanierManager();
    $produitManager = new ProduitManager();

    $reqUpdate = $produitManager->mettreJourDisponible($idProduit);
    $requete = $panierManager->enleverPanierModele($idProduit);

    if ($requete->rowCount() > 0) {
        header('Location: index.php?action=afficherPanier');
    } else {
        header('Location: index.php?erreur');
    }
}

function afficherConfCommande()
{
    $panierManager = new PanierManager();
    $requete = $panierManager->getPaniers();
    require("vues/vueConfCommande.php");
}

function reinitialiserPanier()
{
    $panierManager = new PanierManager();
    $requete = $panierManager->reinitialiserPanierModele();
    if ($requete->rowCount() > 0) {
        header('Location: index.php');
    } else {
        header('Location: index.php?erreur');
    }
}
