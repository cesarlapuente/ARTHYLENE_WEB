<form action="" method="post" xmlns="http://www.w3.org/1999/html">
    <p>
        <span style="color: red"><strong>
        <?= isset($erreurs) && in_array(\Entity\Checklist::TITLE_EMPTY, $erreurs) ? 'Veuillez remplir le champ.<br />' : '' ?>
        <?= isset($erreurs) && in_array(\Entity\Checklist::TITLE_INVALIDE, $erreurs) ? 'Valeur incorrecte.<br />' : '' ?>
            </strong></span>
        <label>
            Titre <br/>
            <input type="text" name="titre" value="<?= isset($item) ? $item->getTitle() : '' ?>"/>
        </label>

        <span style="color: red">
        <?= isset($erreursMaturite) && in_array(\Entity\Checklist::CONTENT_INVALIDE, $erreursMaturite) ? 'Valeur incorrecte.<br />' : '' ?>
        </span>
        <label>Contenu<br/>
            <input type="text" name="popup" value="<?= isset($item) ? $item->getContent() : '' ?>"/>
        </label><br/>

        <label>
            Etape Importante
            <input type="checkbox" name="ideale"
                   value="1" <?= (isset($maturite) && $maturite->getMaturiteIdeale()) ? 'checked' : ''; ?>/>
        </label><br/>


        <label>
            Photo de cette etape<br/>
            <input type="file" name="photo"/>
        </label><br/>

        <?php
        if (isset($maturite) && !$maturite->isNew()) {
            //$produit->setIdProduit(1);
            ?>

            <input type="hidden" name="id" value="<?= isset($item) ? $item->getId() : '' ?>"/>
            <?php
        } else {
            ?>
            <input type="submit" value="Ajouter"/>
            <?php
        }
        ?>
    </p>
</form>