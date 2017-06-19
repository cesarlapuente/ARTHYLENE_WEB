<p style="text-align: center">Il y a actuellement <?= $nombreEtiquette ?> etiquettes. En voici la liste :</p>
<?php
foreach ($listeEtiquette as $etiquette) {
    ?>
    <h2>
        <?= preg_replace('#[_]+#', ' ', $etiquette->getNomProduit() . " " . $etiquette->getVarieteProduit()); ?>
    </h2>
    <p>
        <a href="label-show-<?= $etiquette->getidEtiquette(); ?>.html">Afficher </a>
        <a href="label-update-<?= $etiquette->getidEtiquette(); ?>.html">Modifier </a>
        <a href="label-delete-<?= $etiquette->getidEtiquette(); ?>.html">Supprimer </a>
    </p>
    <?php
}