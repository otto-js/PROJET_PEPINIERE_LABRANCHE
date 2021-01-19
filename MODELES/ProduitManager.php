<?php
require_once("Manager.php");

class ProduitManager extends Manager{

    function getProduits() {
        $bdd = $this->connexionDB();
        $req = $bdd->query("SELECT * FROM produits ORDER BY nomProduit");

        return $req;
    }

    function getSingleProduit($idProduit) {
        $bdd = $this->connexionDB();
        $req = $bdd->query("SELECT * FROM produits WHERE idProduit = $idProduit");

        return $req;
    }

    function updateStock($bdd, $idProduit, $qtteAjoutee) {
        $bdd->query("UPDATE produits SET stockProduit=stockProduit-$qtteAjoutee WHERE idProduit = $idProduit");
    }

    function retablirStock($idProduit, $qtteProduitRetourStock) {
        $bdd = $this->connexionDB();
        $bdd->query("UPDATE produits SET stockProduit=stockProduit+$qtteProduitRetourStock WHERE idProduit = $idProduit");
    }

    function isProduitDisponible($bdd, $idProduit) {
        return (($bdd->query("SELECT stockProduit FROM produits WHERE idProduit = $idProduit")->fetch()["stockProduit"]) > 0) ? true : false;
    }
}

