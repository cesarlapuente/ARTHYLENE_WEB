<form action="" method="post">
    <p>
        <span style="color: red"><strong>
        <?= isset($erreurs) && in_array(\Entity\Produit::MATURITE_EMPTY, $erreurs) ? 'Veuillez remplir le champ.<br />' : '' ?>
        <?= isset($erreurs) && in_array(\Entity\Produit::MATURITE_INVALIDE, $erreurs) ? 'Valeur incorrecte.<br />' : '' ?>
            </strong></span>
        <input type="hidden" name="ancienNiveau" value="<?= isset($produit) ? $produit->getNiveauEtat() : '-1' ?>"/>
        <label>
            Niveau d'état <br/>
            <input type="number" name="niveauE" min="<?= \Entity\Produit::NIVEAU_MIN ?>"
                   value="<?= isset($produit) ? $produit->getNiveauEtat() : '' ?>"/>
        </label>

        <span style="color: red">
        <?= isset($erreursEtat) && in_array(\Entity\Etat::POPUP_INVALIDE, $erreursEtat) ? 'Veuillez remplir le champ.<br />' : '' ?>
        </span>
        <label>Message du popup<br/>
            <input type="text" name="popup" value="<?= isset($etat) ? $etat->getTextePopup() : '' ?>"/>
        </label><br/>

        <span style="color: red">
        <?= isset($erreursEtat) && in_array(\Entity\Etat::CONTENU_INVALIDE, $erreursEtat) ? 'Veuillez remplir le champ.<br />' : '' ?>
        </span>
        <label>
            Contenu de la fiche<br/>
            <textarea name="contenu" cols="56"
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