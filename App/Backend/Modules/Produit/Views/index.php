<p style="text-align: center">Il y a actuellement <?= $nombreProduit ?> produit. En voici la liste :</p>
<?php
foreach ($listeProduit as $produit) {
    ?>
    <h2>
        <a href="produit-<?= $produit->getVarieteProduit(); ?>.html"><?= $produit->getNomProduit() . " " . $produit->getVarieteProduit(); ?></a>
    </h2>
    <p>
        <a href="produit-show-<?= $produit->getVarieteProduit(); ?>.html">Afficher </a>
        <a href="produit-update-<?= $produit->getVarieteProduit(); ?>.html">Modifier </a>
        <a href="produit-remove-<?= $produit->getVarieteProduit(); ?>.html">Supprimer </a>
    </p>
    <?php
}
