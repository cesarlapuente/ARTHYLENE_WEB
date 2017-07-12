<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 30/05/2017
 * Time: 17:31
 */
?><h2>Item de la checklist</h2>

<p>
<h4>Titre</h4>
<div style="border:solid 1px darkgrey;height:20px;width: auto">
    <?= $item->getTitre(); ?>
</div>
</p>

<p>
<h4>Contenu</h4>
<div style="border:solid 1px darkgrey;height:120px;width: auto">
    <?= $item->getContenu(); ?>
</div>
</p>

<p>
<h4>Photo</h4>
<img src="<?= $photo->getPhoto() ?>" border="0">
</p>
