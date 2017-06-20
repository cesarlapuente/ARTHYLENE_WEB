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
        <a href="label-delete-<?= $etiquette->getidEtiquette(); ?>.html"
           onclick="return confirm('Etes vous sûr de vouloir supprimer ?')">Supprimer </a>
    </p>
    <?php
}
?>
<button onclick="window.location.href='label-insert.html'">Ajouter une etiquette</button></br>
