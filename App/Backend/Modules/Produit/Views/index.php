<p style="text-align: center">Il y a actuellement <?= $nombreProduit ?> produit. En voici la liste :</p>
<?php
foreach ($listeProduit as $produit) {
    ?>
    <h2>
        <?= preg_replace('#[_]+#', ' ', $produit->getNomProduit() . " " . $produit->getVarieteProduit()); ?>
    </h2>
    <p>
        <a href="produit-show-<?= $produit->getNomProduit(); ?>-<?= $produit->getVarieteProduit(); ?>.html">Afficher </a>
        <a href="produit-update-<?= $produit->getNomProduit(); ?>-<?= $produit->getVarieteProduit(); ?>.html">Modifier </a>
        <a href="produit-delete-<?= $produit->getNomProduit(); ?>-<?= preg_replace('#[ ]+#', '_', $produit->getVarieteProduit()); ?>.html">Supprimer </a>
    </p>
    <?php
}
