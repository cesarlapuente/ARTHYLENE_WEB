<form action="" method="post">
    <p>
        <?= isset($erreurs) && in_array(\Entity\Produit::NOM_PRODUIT_INVALIDE, $erreurs) ? 'Le nom du produit est invalide.<br />' : '' ?>
        <label>
            Niveau de maturite <br/>
            <input type="number" name="niveauM" value="<?= isset($produit) ? $produit->getNiveauMaturite() : '' ?>"/>
        </label>

        <label>Message du popup<br/>
            <input type="text" name="popup" value="<?= isset($maturite) ? $maturite->getTextePopup() : '' ?>"/>
        </label><br/>

        <label>
            Contenu de la fiche<br/>
            <textarea name="contenu" cols="75"
                      style="resize: none"><?= isset($maturite) ? $maturite->getContenu() : '' ?></textarea>
        </label><br/>

        <label>
            Photo de cette maturite<br/>
            <input type="file" name="photo"/>
        </label><br/>

        <label>
            Maturite ideale
            <input type="checkbox" name="ideale"
                   value="1" <?= (isset($maturite) && $maturite->getMaturiteIdeale()) ? 'checked' : ''; ?>/>
        </label><br/>

        <?php
        if (isset($maturite) && !$maturite->isNew()) {
            //$produit->setIdProduit(1);
            ?>

            <input type="hidden" name="id" value="<?= isset($maturite) ? $maturite->getIdMaturite() : '' ?>"/>
            <input type="hidden" name="idProduit" value="<?= isset($maturite) ? $maturite->getIdProduit() : '' ?>"/>
            <input type="submit" value="Modifier" name="modifier"/>
            <?php
        } else {
            ?>
            <input type="hidden" name="variete" value="<?= isset($variete) ? $variete : '' ?>"/>
            <input type="hidden" name="nomProduit" value="<?= isset($nom) ? $nom : '' ?>"/>
            <input type="submit" value="Ajouter"/>
            <?php
        }
        ?>
    </p>
</form>