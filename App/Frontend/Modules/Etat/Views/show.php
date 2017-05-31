<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 30/05/2017
 * Time: 17:31
 */
?><h2><?= $produit ?> <?= $variete ?></h2>
<h3>Fiche pour la état <?= $niveau ?></h3>
<div>
    <p>
    <h4>Texte de la fenêtre popup</h4>
    <?= $etat->getTextePopup(); ?>
    </p>
</div>
<div>
    <p>
    <h4>Contenu de la fiche</h4>
    <?= $etat->getContenu(); ?>
    </p>
</div>