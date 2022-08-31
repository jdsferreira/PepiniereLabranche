<?php

require_once("Manager.php");
require_once("modeles/PanierManager.php"); //


class ProduitManager extends Manager
{

    public function getProduits()
    {
        $bdd = $this->connexionBD();
        $requete = $bdd->query('SELECT * FROM produit ORDER BY Nom');
        return $requete;
    }

    public function getProduit($idProduit)
    {
        $bdd = $this->connexionBD();
        $requete = $bdd->prepare('SELECT * FROM produit WHERE ProduitID=?');
        $requete->execute(array($idProduit));

        return $requete;
    }

    public function getColProduit($idProduit)
    {
        $bdd = $this->connexionBD();

        $requete = $bdd->prepare('SELECT * FROM produit WHERE ProduitID = ?');
        $requete->execute(array($idProduit));

        return $requete->fetch();
    }

    public function modifierDisponible($idProduit, $nouvelleQte)
    {
        $panierManager = new PanierManager(); //

        $produit = $this->getColProduit($idProduit); //
        $quantDisp = $produit['Quantite'];

        $panier = $panierManager->getColPanier($idProduit);
        $qte = $panier['Qte'];

        $quantDisp2 = $quantDisp + $qte - $nouvelleQte;
        $bdd = $this->connexionBD();
        $reqUpdate = $bdd->prepare('UPDATE produit SET Quantite = ? WHERE ProduitID = ?');
        $reqUpdate->execute(array($quantDisp2, $idProduit));

        return $reqUpdate->fetch();
    }

    public function enleverDisponible($idProduit, $qte)
    {
        $produit = $this->getColProduit($idProduit); //
        $quantDisp = $produit['Quantite'];
        $quantDisp2 = $quantDisp - $qte;
        $bdd = $this->connexionBD();
        $reqUpdate = $bdd->prepare('UPDATE produit SET Quantite = ? WHERE ProduitID = ?');
        $reqUpdate->execute(array($quantDisp2, $idProduit));

        return $reqUpdate->fetch();;
    }

    public function mettreJourDisponible($idProduit)
    {
        $panierManager = new PanierManager(); //

        $produit = $this->getColProduit($idProduit); //
        $quantDisp = $produit['Quantite'];

        $panier = $panierManager->getColPanier($idProduit);
        $qte = $panier['Qte'];

        $quantDisp2 = $quantDisp + $qte;
        $bdd = $this->connexionBD();
        $reqUpdate = $bdd->prepare('UPDATE produit SET Quantite = ? WHERE ProduitID = ?');
        $reqUpdate->execute(array($quantDisp2, $idProduit));

        return $reqUpdate->fetch();
    }

}
