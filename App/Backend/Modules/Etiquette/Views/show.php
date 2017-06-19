<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 30/05/2017
 * Time: 11:58
 */
?><h2><?= $title; ?></h2>
<p>
<h4>Nom du produit</h4>
<div>
    <?= $etiquette->getNomProduit(); ?>
</div>
</p>

<p>
<h4>Variete du produit</h4>
<div>
    <?= $etiquette->getVarieteProduit(); ?>
</div>
</p>
<p>
<h4>Code de l'étiquette</h4>
<div>
    <?= $etiquette->getCode(); ?>
</div>
</p>
<p>
<h4>Emplacement dans le rayon été</h4>
<div>
    <?= $etiquette->getOrdreEte(); ?>
</div>
</p>
<p>
<h4>Emplacement dans le rayon automne</h4>
<div>
    <?= $etiquette->getOrdreAutomne(); ?>
</div>
</p>
<p>
<h4>Emplacement dans le rayon hiver</h4>
<div>
    <?= $etiquette->getOrdreHiver(); ?>
</div>
</p>
<p>
<h4>Emplacement dans le rayon printemps</h4>
<div>
    <?= $etiquette->getOrdrePrintemps(); ?>
</div>
</p>
<p>
<h4>Nombre de couche max</h4>
<div>
    <?= $etiquette->getNombreDeCouche(); ?>
</div>
</p>
<p>
<h4>Maturite minimale</h4>
<div>
    <?= $etiquette->getMaturiteMin(); ?>
</div>
</p>
<p>
<h4>Maturite maximale</h4>
<div>
    <?= $etiquette->getMaturiteMax(); ?>
</div>
</p>
<p>
<h4>Emplacement ideal dans le chariot</h4>
<div>
    <?= $etiquette->getEmplacementChariot(); ?>
</div>
</p>