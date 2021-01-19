<?php ob_start()?>





<h1>PANIER</h1>
<table id="panierTable">
    <tr>
        <th></th>
        <th>PRODUIT</th>
        <th>QUANTITE</th>
        <th>PRIX</th>
        <th></th>

    </tr>
    <?php
    $prixLigne = 0;
        $prixTotal = 0;
        while ($donneesPanier = $reqPanier->fetch()) 
        {
    ?>
        <tr>
            <td><a href="index.php?action=afficherProduit&idProduit=<?= $donneesPanier["idProduit"]?>"><img id="imgPanier" src="PUBLIC\IMAGES\<?= $donneesPanier["idProduit"]?>"></img></a></td>
            <td><?= $donneesPanier["nomProduit"]?></td>
            <td>
                <form >
                    <input formaction="..\index.php?action=incrementeQtte&idPanier=<?= $donneesPanier["idPanier"]?>&idProduit=<?=$donneesPanier["idProduit"]?>" formmethod="POST" type="submit" class="changeQtte" id="incremente" value="+"></input>
                    <p id="qttePanierTable"><?= $donneesPanier["qttePanier"]?></p>
                    <input formaction="..\index.php?action=decrementeQtte&idPanier=<?= $donneesPanier["idPanier"]?>&idProduit=<?=$donneesPanier["idProduit"]?>" formmethod="POST" type="submit" class="changeQtte" id="decremente" value="-"></input>
                </form>
            </td>
            <td><?=$prixLigne = $donneesPanier['prixProduit'] * $donneesPanier['qttePanier']?>$</td>
            <td><a href="index.php?action=supprimeProduitDuPanier&idPanier=<?=$donneesPanier["idPanier"]?>&qtteProduitRetourStock=<?=$donneesPanier["qttePanier"]?>&idProduit=<?=$donneesPanier["idProduit"]?>"><img id="imgTrash" src="PUBLIC\IMAGES\trash.png"/></a></td>
        </tr>
    <?php
        $prixTotal += $prixLigne;
        }     
    ?>
            <tr>
            <td colSpan="3"> <?php  if($prixTotal == 0) echo "Votre panier est vide"; else echo 'Prix Total' ?></td>
            <td><?= $prixTotal.'$'?> </td>
        </tr>
</table>


<?php $contenu = ob_get_clean(); ?>

<?php require("template.php"); ?>