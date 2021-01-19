<!DOCTYPE html>
<html>
    <head> <metacharset="utf-8">
        <title="PÉPINIÈRE LABRANCHE">
        <link id="leStyle" href=<?=$_SESSION['css']?> rel="stylesheet"/>
    </head>
    <body>
    <p id="message">LES PEPINIERES LABRANCHE VOUS SOUHAITE LA BIENVENUE</P>
    <div id="navigation">
    <img id="feuille" src="PUBLIC\IMAGES\feuille.png"?>
    <p id="titre">PEPINIERES LABRANCHE</p>
    <img id="clickMe" src="PUBLIC\IMAGES\clickMe.png" alt='clic me'></img>
        <ul>
            <div id="navLeft">
            <li><a class="menuItems" href="index.php">PRODUITS</a></li>
            <li><a id="apparence" class="menuItems" href="index.php?action=changeCSS">APPARENCE</a></li>
            <li><a class="menuItems" href="PUBLIC\DOX\rapport.pdf">RAPPORT</a></li>
            </div>
            <div id="panier">
                <li><a class="menuItems" href="index.php?action=afficherPanier">PANIER</a></li>
                <p id="totalPanier"><?= $_SESSION["totalPanier"] ?></p>
            </div>
        </ul>
    </div>
        <?= $contenu ?>

     <footer id="footer">
        <div>Date : <?=strftime('%d %B %Y')?></div>
        <div>Pépinière Labranche</div>
    </footer>
    </body>
    <script src="\PUBLIC\JS\script.js"></script>


</html>

