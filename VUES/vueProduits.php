<?php ob_start()?>

<div id="contenuPageProduits">
    <h1>NOS PRODUITS </h1>
    <?php   
    while($donnees=$req->fetch()) {
    ?>
    <div id="produitContainer" > <a href="index.php?action=afficherProduit&idProduit=<?=$donnees["idProduit"]?>">
        <div id="contenuProduitContainer">
        <img src="PUBLIC\IMAGES\<?= $donnees["idProduit"]?>"/>
            <div id="descriptionContainer">
                <h2><em><?= $donnees["nomProduit"]?></em></h2>
                <p><?= $donnees["descriptionProduit"]?></p> 
            </div>
            <p id="stock"><strong>Stock : <?=$donnees["stockProduit"]?></strong></p>
    </div>
           
    </div>
    <?php
    }
    ?>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require("template.php");?>