<?php

require_once("Manager.php");
require_once("ProduitManager.php");

class PanierManager extends Manager {

    function getPanier() 
    {
        $bdd = $this->connexionDB();
        return $bdd->query("SELECT panier.idPanier, panier.idProduit, produits.nomProduit, panier.qttePanier, produits.prixProduit FROM panier, produits WHERE panier.idProduit = produits.idProduit");
    }

    function ajouterAuPanier($idProduit, $qttePanier, $nomProduit) 
    {
        $bdd = $this->connexionDB();
        
        if ((new ProduitManager())->isProduitDisponible($bdd, $idProduit))
        {
            $req = $bdd->query("SELECT qttePanier FROM panier WHERE idProduit=$idProduit");
            $qtteAjoutee = (int)($req->fetch()["qttePanier"]) + $qttePanier;
             
            $req = $this->modifierQttePanier($bdd, $qtteAjoutee, $idProduit);
            $lignesAffectees = $req->rowCount();
            if($lignesAffectees <= 0 )
            {
                $req = $bdd->prepare("INSERT INTO panier (idProduit, qttePanier) VALUES (:idProduit, :qtteProduit)");
                $req->execute(array("idProduit"=>$idProduit, "qtteProduit"=>$qttePanier));
                $lignesAffectees = $req->rowCount();
            }
            (new ProduitManager())->updateStock($bdd, $idProduit, $qttePanier);
        }
        return $lignesAffectees;
    }

    function getTotalPanier() {
        $bdd = $this->connexionDB();
        return $bdd->query("SELECT SUM(qttePanier) as qtte FROM panier")->fetch()["qtte"];  
    }

    function supprimerProduitPanier($idProduitSupprime) {
        $bdd = $this->connexionDB();
        $bdd->query("DELETE FROM panier WHERE panier.idPanier = $idProduitSupprime");
    }

    function modifierQttePanier($bdd, $qtteAjoutee, $idProduit) {
        return $bdd->query("UPDATE panier SET qttePanier=$qtteAjoutee WHERE idProduit=$idProduit");
    }

    function incrementePanier($idPanier, $idProduit) {
        $bdd = $this->connexionDB();

        $stock = $bdd->query("SELECT stockProduit FROM produits WHERE idProduit = $idProduit")->fetch()["stockProduit"];

        if ($stock > 0) {
        $bdd->query("UPDATE panier SET qttePanier = qttePanier + 1 WHERE idPanier = $idPanier");
        $bdd->query("UPDATE produits SET stockProduit = stockProduit - 1 WHERE idProduit = $idProduit");
        }
    }

    function decrementePanier($idPanier, $idProduit) {
        $bdd = $this->connexionDB();
        $limite = $bdd->query("SELECT qttePanier FROM panier WHERE idpanier = $idPanier")->fetch()["qttePanier"];
        
        if ($limite > 0){
        $bdd->query("UPDATE panier SET qttePanier = qttePanier - 1 WHERE idPanier = $idPanier");
        $bdd->query("UPDATE produits SET stockProduit = stockProduit + 1 WHERE idProduit = $idProduit");

        }
    }
}