<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 30/05/2017
 * Time: 11:58
 */
?><h2><?= $title . " " . $produit->getVArieteProduit(); ?></h2>
<p>
<h3>Présentation</h3>
<?= $produit->getPresentation()->getContenu(); ?>
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
            <td><?= $prod->getNiveauMaturite(); ?></td>
            <td><?php if ($prod->getIdMaturite() == $produit->getMaturiteIdeale()->getIdMaturite()) {
                    echo "oui";
                } ?></td>
            <td>
                <a href="maturite-<?= $prod->getIdMaturite() ?>-<?= $prod->getNiveauMaturite() ?>-<?= $produit->getNomProduit(); ?>-<?= $produit->getVarieteProduit() ?>.html">Afficher</a>
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
            <td><?= $prod->getNiveauEtat(); ?></td>
            <td>
                <a href="etat-<?= $prod->getIdEtat() ?>-<?= $prod->getNiveauEtat() ?>-<?= $produit->getNomProduit(); ?>-<?= $produit->getVarieteProduit() ?>.html">Afficher</a>
            </td>
        </tr>
        <?php
    }
    } ?></table></p>
