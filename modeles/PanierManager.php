<?php

require_once("Manager.php");
require_once("modeles/ProduitManager.php"); //

class PanierManager extends Manager
{
    public function getColPanier($idProduit)
    {
        $bdd = $this->connexionBD();

        $requete = $bdd->prepare('SELECT * FROM panier WHERE ProduitID = ?');
        $requete->execute(array($idProduit));

        return $requete->fetch();
    }

    public function ajouterProduitModele($idProduit, $qte)
    {
        $produitManager = new ProduitManager(); //

        $produit = $produitManager->getColProduit($idProduit);

        $nom = $produit['Nom'];
        $prix = $produit['Prix'];
        $qteDisp = $produit['Quantite'];

        $bdd = $this->connexionBD();
        $requete = $bdd->prepare('INSERT INTO panier (ProduitID, Qte, Nom, Prix, QteDisp) VALUES (:ProduitID, :Qte, :Nom, :Prix, :QteDisp)');

        $requete->execute(
            array(
                'ProduitID' => $idProduit,
                'Qte' => $qte,
                'Nom' => $nom,
                'Prix' => $prix,
                'QteDisp' => $qteDisp
            )
        );
        return $requete;
    }

    public function modifierPanierModele($idProduit, $nouvelleQte)
    {
        $bdd = $this->connexionBD();
        $requete = $bdd->prepare('UPDATE panier SET Qte = ? WHERE ProduitID = ?');
        $requete->execute(array($nouvelleQte, $idProduit));
        return $requete;
    }

    public function getPaniers()
    {
        $bdd = $this->connexionBD();
        $panier = $bdd->query('SELECT * FROM panier');
        return $panier;
    }

    public function getQuantites()
    {
        $bdd = $this->connexionBD();
        $reqQuant = $bdd->query('SELECT Qte FROM panier');
        return $reqQuant;
    }

    public function enleverPanierModele($idProduit)
    {
        $bdd = $this->connexionBD();
        $requete = $bdd->prepare('DELETE FROM panier WHERE produitID= ?');
        $requete->execute(array($idProduit));
        return $requete;
    }

    public function reinitialiserPanierModele()
    {
        $bdd = $this->connexionBD();
        $requete = $bdd->prepare('DELETE FROM panier');
        $requete->execute();

        return $requete;
    }
}
