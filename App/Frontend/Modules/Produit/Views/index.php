<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 29/05/2017
 * Time: 10:39
 */
foreach ($listeProduit as $produit) {
    ?>
    <h2><a href="produit-<?= $produit->getNomProduit(); ?>-<?= $produit->getVarieteProduit(); ?>.html">
            <?= $produit->getNomProduit() . " " . $produit->getVarieteProduit(); ?></a></h2></br>
    <?php
}