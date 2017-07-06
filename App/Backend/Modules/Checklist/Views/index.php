<p style="text-align: center">Il y a actuellement <?= $nombreItem ?> item. En voici la liste :</p>
<?php
foreach ($checklist as $item) {
    ?>
    <h2>
        <?= $item->getTitre(); ?>
    </h2>
    <p>
        <a href="checklist-show-<?= $item->getid(); ?>.html">Afficher </a>
        <a href="checklist-update-<?= $item->getid(); ?>.html">Modifier </a>
        <a href="checklist-delete-<?= $item->getid(); ?>.html"
           onclick="return confirm('Etes vous sûr de vouloir supprimer ?')">Supprimer </a>
    </p>
    <?php
} ?>
<button onclick="window.location.href='checklist-insert.html'">Ajouter un item</button></br>
