<p style="text-align: center">Il y a actuellement <?= $nombreProduit ?> produit. En voici la liste :</p>
<?php
foreach ($listeProduit as $produit) {
    ?>
    <h2>
        <?= $produit->getNomProduit() . " " . $produit->getVarieteProduit(); ?>
    </h2>
    <p>
        <a href="produit<?= $produit->getVarieteProduit(); ?>.html">Afficher </a>
        <a href="produit-update-<?= $produit->getVarieteProduit(); ?>.html">Modifier </a>
        <a href="produit-delete-<?= preg_replace('#[ ]+#', '_', $produit->getVarieteProduit()); ?>.html">Supprimer </a>
    </p>
    <?php
}
