<?php
session_start();
require("controleurs\controleurs.php");


updateAffichageQttePanier();
if (isset($_GET["action"])) 
{
    if($_GET["action"] == "afficherProduit")
    {
        afficherProduit($_GET["idProduit"]);
    }
    else if ($_GET["action"] == "afficherPanier"){
        afficherPanier();
    }
    else if($_GET["action"] == "ajouterAuPanier") 
    {
        ajouterAuPanier($_GET["idProduit"], $_POST["qtte"], $_GET["nomProduit"]);
    }
    else if ($_GET["action"] == "supprimeProduitDuPanier") {
        supprimerProduitDuPanier($_GET["idPanier"], $_GET["qtteProduitRetourStock"], $_GET["idProduit"]);
    }
    else if ($_GET["action"] == "changeCSS")
        changeCSS();
    else if ($_GET["action"] == "incrementeQtte")
        incrementeQttePanier($_GET["idPanier"], $_GET["idProduit"]);
    else if ($_GET["action"] == "decrementeQtte")
        decrementeQttePanier($_GET["idPanier"], $_GET["idProduit"]);
}
else 
{
    if (!isset($_SESSION['css']))
        $_SESSION['css'] = "PUBLIC/STYLES/style.css";
    afficherProduits();
}


