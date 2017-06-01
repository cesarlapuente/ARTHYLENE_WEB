<form action="" method="post">
    <p>
        <?= isset($erreurs) && in_array(\Entity\Produit::NOM_PRODUIT_INVALIDE, $erreurs) ? 'Le nom du produit est invalide.<br />' : '' ?>
        <label>Nom du produit</label>
        <input type="hidden" name="modif" value="<?= isset($produit) ? $produit->getVarieteProduit() : '' ?>"/></input>
        <input type="text" name="nom" value="<?= isset($produit) ? $produit->getNomProduit() : '' ?>"/><br/>

        <?= isset($erreurs) && in_array(\Entity\Produit::VARIETE_PRODUT_INVALIDE, $erreurs) ? 'La variété du produit est invalide.<br />' : '' ?>
        <label>Variété du produit</label><input type="text" name="variete"
                                                value="<?= isset($produit) ? $produit->getVarieteProduit() : '' ?>"/><br/>

        <?php
        if (isset($produit) && !$produit->isNew()) {
            ?>

            <input type="submit" value="Modifier" name="modifier"/>
            <?php
        } else {
            ?>
            <input type="submit" value="Ajouter"/>
            <?php
        }
        ?>
    </p>
</form>