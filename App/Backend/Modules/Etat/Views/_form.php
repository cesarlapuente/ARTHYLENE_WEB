<form action="" method="post">
    <p>
        <?= isset($erreurs) && in_array(\Entity\Produit::MATURITE_EMPTY, $erreurs) ? 'Veuillez remplir le champ.<br />' : '' ?>
        <?= isset($erreurs) && in_array(\Entity\Produit::MATURITE_INVALIDE, $erreurs) ? 'Valeur incorrecte.<br />' : '' ?>
        <input type="hidden" name="ancienNiveau" value="<?= isset($produit) ? $produit->getNiveauEtat() : '' ?>"/>
        <label>
            Niveau d'état <br/>
            <input type="number" name="niveauE" value="<?= isset($produit) ? $produit->getNiveauEtat() : '' ?>"/>
        </label>

        <?= isset($erreursEtat) && in_array(\Entity\Etat::POPUP_INVALIDE, $erreursEtat) ? 'Veuillez remplir le champ.<br />' : '' ?>
        <label>Message du popup<br/>
            <input type="text" name="popup" value="<?= isset($etat) ? $etat->getTextePopup() : '' ?>"/>
        </label><br/>

        <?= isset($erreursEtat) && in_array(\Entity\Etat::CONTENU_INVALIDE, $erreursEtat) ? 'Veuillez remplir le champ.<br />' : '' ?>
        <label>
            Contenu de la fiche<br/>
            <textarea name="contenu" cols="75"
                      style="resize: none"><?= isset($etat) ? $etat->getContenu() : '' ?></textarea>
        </label><br/>

        <label>
            Photo de cet etat<br/>
            <input type="file" name="photo"/>
        </label><br/>

        <?php
        if (isset($etat) && !$etat->isNew()) {
            ?>

            <input type="hidden" name="id" value="<?= isset($etat) ? $etat->getIdEtat() : '' ?>"/>
            <input type="hidden" name="idProduit" value="<?= isset($etat) ? $etat->getIdProduit() : '' ?>"/>
            <input type="submit" value="Modifier" name="modifier"/>
            <?php
        } else {
            ?>
            <input type="hidden" name="variete" value="<?= isset($variete) ? $variete : '' ?>"/>
            <input type="hidden" name="nomProduit" value="<?= isset($nom) ? $nom : '' ?>"/>
            <input type="hidden" name="idPresentation" value="<?= isset($prod) ? $prod->getIdPresentation() : '' ?>"/>
            <input type="submit" value="Ajouter"/>
            <?php
        }
        ?>
    </p>
</form>