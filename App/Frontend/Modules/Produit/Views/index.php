<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 29/05/2017
 * Time: 10:39
 */

foreach ($listeProduits as $produit) {
    ?>
    <h2><a href="produit-<?= $produit['id'] ?>.html"><?= $produit['nomProduit'] ?></a></h2>
    <p><?= nl2br($produit['contenu']) ?></p>
    <?php
}