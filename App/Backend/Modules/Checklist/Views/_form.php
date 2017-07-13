<form enctype="multipart/form-data" action="" method="post" xmlns="http://www.w3.org/1999/html">
    <p>
        <span style="color: red"><strong>
        <?= isset($erreurs) && in_array(\Entity\Checklist::TITLE_EMPTY, $erreurs) ? 'Veuillez remplir le champ.<br />' : '' ?>
        <?= isset($erreurs) && in_array(\Entity\Checklist::TITLE_INVALIDE, $erreurs) ? 'Valeur incorrecte.<br />' : '' ?>
            </strong></span>
        <label>
            Titre <br/>
            <input type="text" name="titre" value="<?= isset($item) ? $item->getTitre() : '' ?>"/>
        </label>

        <span style="color: red">
        <?= isset($erreur) && in_array(\Entity\Checklist::CONTENT_INVALIDE, $erreur) ? 'Valeur incorrecte.<br />' : '' ?>
        </span>
        <label>Contenu<br/>
            <input type="text" name="contenu" value="<?= isset($item) ? $item->getContenu() : '' ?>"/>
        </label><br/>

        <label>
            Etape Importante<br/>
            <input type="checkbox" name="important"
                   value="1" <?= (isset($item) && $item->getIsImportant()) ? 'checked' : ''; ?>/>
        </label><br/>


        <label>
            Photo de cette etape<br/>
            <?= isset($photo) ? '<img src=' . $photo->getPhoto() . ' border="0"><br/>' : '' ?>
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
            <input type="file" name="photo" value="<?= isset($photo) ? $photo->getPhoto() : '' ?>"/>
        </label><br/>

        <?php
        if (isset($item) && !$item->isNew()) {
            //$produit->setIdProduit(1);
            ?>
            <input type="hidden" name="lastTitle" value="<?= isset($item) ? $item->getTitre() : '' ?>"/>
            <input type="hidden" name="id" value="<?= isset($item) ? $item->getId() : '' ?>"/>
            <input type="hidden" name="idPhoto" value="<?= isset($item) ? $item->getIdPhoto() : '' ?>"/>
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