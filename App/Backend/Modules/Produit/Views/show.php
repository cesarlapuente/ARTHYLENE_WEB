<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 30/05/2017
 * Time: 11:58
 */
?><h2><?= $title . " " . preg_replace('#[_]+#', ' ', $produit->getVArieteProduit()); ?></h2>
<p>
<h3>Présentation</h3>
<div style="border:solid 1px darkgrey;height:120px;">
    <?= $presentation->getContenu(); ?>
</div>
</p>
<p><h3>Fiches des maturités du produit</h3>
<?php
if (empty($produit->getListeEtat())){
    ?><h4>Aucune fiche</h4><?php
}else{
?>
<table>
    <tr>
        <th>Nom du produit</th>
        <th>Variete du produit</th>
        <th>Niveau de maturité</th>
        <th>Maturité idéale</th>
        <th></th>
    </tr>
    <?php
    foreach ($produit->getListeMaturite() as $prod) {
        ?>
        <tr>
            <td><?= $produit->getNomProduit(); ?></td>
            <td><?= $produit->getVarieteProduit(); ?></td>
            <td><?= $prod->getNiveau(); ?></td>
            <td><?php if ($prod->getMaturiteIdeale()) {
                    echo "oui";
                } ?></td>
            <td>
                <a href="maturite-show-<?= $prod->getIdMaturite() ?>.html">Afficher</a>
            </td>
        </tr>
        <?php
    }
    } ?></table></p>
<p><h3>Fiches des états du produit</h3>
<?php
if (empty($produit->getListeEtat())){
    ?><h4>Aucune fiche</h4><?php
}else{
?>
<table>
    <tr>
        <th>Nom du produit</th>
        <th>Variete du produit</th>
        <th>Niveau de l'état</th>
        <th></th>
    </tr>
    <?php
    foreach ($produit->getListeEtat() as $prod) {
        ?>
        <tr>
            <td><?= $produit->getNomProduit(); ?></td>
            <td><?= $produit->getVarieteProduit(); ?></td>
            <td><?= $prod->getNiveau(); ?></td>
            <td>
                <a href="etat-show-<?= $prod->getIdEtat() ?>.html">Afficher</a>
            </td>
        </tr>
        <?php
    }
    } ?></table></p>
