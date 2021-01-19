<?php
require("modeles\ProduitManager.php");
require("modeles\PanierManager.php");

function afficherProduits() {
    $produitManager = new ProduitManager();
    $req = $produitManager->getProduits();

    require("vues\\vueProduits.php");
}

function afficherProduit($idProduit) {
    $produitManager = new ProduitManager();
    $req = $produitManager->getSingleProduit($idProduit);
    require("vues\\vueProduit.php");
}

function ajouterAuPanier($idProduit, $qttePanier, $nomProduit) {
    $panierManager = new PanierManager();
    $ajouts = $panierManager->ajouterAuPanier($idProduit, $qttePanier, $nomProduit);
    if ($ajouts > 0)
    header("Location:index.php?action=afficherProduit&idProduit=$idProduit");
    else
    header("Location:vues\pageErreur.php");
}

function afficherPanier() {
    $panierManager = new PanierManager();
    $reqPanier = $panierManager->getPanier();
    require("vues\\vuePanier.php");
}

//remettre qtte produit supprime dans stock / supprimer produit du panier
function supprimerProduitDuPanier($idPanierSupprime, $qtteProduitRetourStock, $idProduit){
    $produitManager = new ProduitManager();
    $produitManager->retablirStock($idProduit, $qtteProduitRetourStock);

    $panierManager = new PanierManager();
    $reqPanier = $panierManager->supprimerProduitPanier($idPanierSupprime);
    //repasse par index pour updater affichage qtte panier
    header("Location:index.php?action=afficherPanier");
}

function updateAffichageQttePanier() {
    $panierManager = new PanierManager();
    $total = $panierManager->getTotalPanier();
    if ($total != null)
    {
        $_SESSION["totalPanier"] = $total;
    }
    else 
    {
        $_SESSION["totalPanier"] = 0;
    }
}

function incrementeQttePanier ($idPanier, $idProduit) {
    $panierManager = new PanierManager();

    $panierManager->incrementePanier($idPanier, $idProduit);
    header("Location:index.php?action=afficherPanier");
}

function decrementeQttePanier ($idPanier, $idProduit) {
    $panierManager = new PanierManager();

    $panierManager->decrementePanier($idPanier, $idProduit);
    header("Location:index.php?action=afficherPanier");
}

function changeCSS() {
    if ($_SESSION['css'] == "PUBLIC/STYLES/style2.css") {
        $_SESSION['css'] = "PUBLIC/STYLES/style.css";
    }
    else 
    {
        $_SESSION['css'] = "PUBLIC/STYLES/style2.css";
    }
    header("Location:index.php");
}






