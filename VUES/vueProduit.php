<?php ob_start()?>

<?php $donnees = $req->fetch()?>

<div id="contenuPageProduit">
    <div id="produitContainer">
        <h1><?= $donnees["nomProduit"]?></h1>
        <img src="PUBLIC\IMAGES\<?=$donnees["idProduit"]?>"/>
        <p><?= $donnees["descriptionProduit"]?></p>

    <form action="index.php?action=ajouterAuPanier&idProduit=<?=$donnees["idProduit"]?>&nomProduit=<?=$donnees["nomProduit"]?>" method="post">
        <div id="cboxContainer">
        <label for="qtte"><strong>quantité:</strong></label>
            <select id="cboxQtte" name="qtte">
                <?php 
                    if ($donnees["stockProduit"] > 0){
                        for($i = 1; $i <= $donnees["stockProduit"]; $i++) { ?> 
                            <option value=<?= $i?>><?= $i?></option>
                <?php   }
                    }
                    else { ?>
                        <option>0</option>
                <?php } ?>
            </select>
        </div>
        <input id="btnAjouterAuPanier" type="submit" value="ajouter au panier" >
    </form>
            <p id="prixProduit"><?= $donnees["prixProduit"]?> $</p>
            <p id="stock"><strong>Stock : <?=$donnees["stockProduit"]?></strong></p>
    </div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require("template.php"); ?>