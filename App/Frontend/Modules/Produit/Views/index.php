<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 29/05/2017
 * Time: 10:39
 */

foreach ($listeProduit as $produit) {
    ?>
    <h2><a href="produit-<?= $produit->getVarieteProduit(); ?>.html"><?= $produit->getNomProduit(); ?></a></h2>
    <p><?= nl2br($produit->getVarieteProduit()); ?></p>
    <?php
}