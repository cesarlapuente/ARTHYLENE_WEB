<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 30/05/2017
 * Time: 17:31
 */
?><h2><?= $produit->getNomProduit() . " " . $produit->getVarieteProduit() ?></h2>
<h3>Fiche pour l'état <?= $produit->getNiveauEtat() ?></h3>

<p>
    <h4>Texte de la fenêtre popup</h4>
<div style="border:solid 1px darkgrey;height:20px;width: auto">
    <?= $etat->getTextePopup(); ?>
</div>
</p>

<p>
    <h4>Contenu de la fiche</h4>
<div style="border:solid 1px darkgrey;height:120px;width: auto">
    <?= $etat->getContenu(); ?>
</div>
</p>
