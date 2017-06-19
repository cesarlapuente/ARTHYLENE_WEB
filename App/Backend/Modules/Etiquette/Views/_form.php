<form action="" method="post">
    <p>
        <span style="color: red"><strong>
        <?= isset($erreurs) && in_array(\Entity\Produit::NOM_PRODUIT_INVALIDE, $erreurs) ? 'Le nom du produit est invalide.<br />' : '' ?>
        <?= isset($erreurs) && in_array(\Entity\Produit::NOM_PRODUIT_EMPTY, $erreurs) ? 'Veuillez remplir ce champ.<br />' : '' ?>
            </strong></span>

        <label>Nom du produit<br/>
            <input type="text" name="nom" style="text-transform: capitalize"
                   value="<?= isset($etiquette) ? preg_replace('#[_]+#', ' ', $etiquette->getNomProduit()) : '' ?>"/>
        </label><br/>

        <span style="color: red"><strong>
        <?= isset($erreurs) && in_array(\Entity\Produit::VARIETE_PRODUT_INVALIDE, $erreurs) ? 'La variété du produit est invalide.<br />' : '' ?>
        <?= isset($erreurs) && in_array(\Entity\Produit::VARIETE_PRODUIT_EMPTY, $erreurs) ? 'Veuillez remplir ce champ.<br />' : '' ?>
        </strong></span>
        <label>Variété du produit<br/>
            <input type="text" name="variete" style="text-transform: capitalize"
                   value="<?= isset($etiquette) ? preg_replace('#[_]+#', ' ', $etiquette->getVarieteProduit()) : '' ?>"/><br/>
        </label><br/>

        <label>Code de l'étiquette<br/>
            <input type="text" name="code" style="text-transform: capitalize"
                   value="<?= isset($etiquette) ? $etiquette->getCode() : '' ?>"/>
        </label><br/>

        <label>
            Photo de l'étiquette<br/>
            <input type="file" name="photo"/>
        </label><br/>

    <h3>Presentation</h3>
    <p>
        <label>Emplacement dans le rayon été<br/>
            <input type="number" name="ete" style="text-transform: capitalize"
                   value="<?= isset($etiquette) ? $etiquette->getOrdreEte() : '' ?>"/>
        </label><br/>

        <label>Emplacement dans le rayon automne<br/>
            <input type="number" name="automne" style="text-transform: capitalize"
                   value="<?= isset($etiquette) ? $etiquette->getOrdreAutomne() : '' ?>"/>
        </label><br/>

        <label>Emplacement dans le rayon hiver<br/>
            <input type="number" name="hiver" style="text-transform: capitalize"
                   value="<?= isset($etiquette) ? $etiquette->getOrdreHiver() : '' ?>"/>
        </label><br/>

        <label>Emplacement dans le rayon printemps<br/>
            <input type="number" name="printemps" style="text-transform: capitalize"
                   value="<?= isset($etiquette) ? $etiquette->getOrdrePRintemps() : '' ?>"/>
        </label><br/>

        <label>Nombre de couche max<br/>
            <input type="number" name="couche" style="text-transform: capitalize"
                   value="<?= isset($etiquette) ? $etiquette->getNombreDeCouche() : '' ?>"/>
        </label><br/>

    </p>

    <h3>Reception</h3>
    <p>
        <label>Maturité minimale<br/>
            <input type="number" name="matMin" style="text-transform: capitalize"
                   value="<?= isset($etiquette) ? $etiquette->getMaturiteMin() : '' ?>"/>
        </label><br/>

        <label>Maturité maximale<br/>
            <input type="number" name="matMax" style="text-transform: capitalize"
                   value="<?= isset($etiquette) ? $etiquette->getMaturiteMax() : '' ?>"/>
        </label><br/>

        <label>Emplacement idéal dans le chariot<br/>
            <input type="number" name="chariot" style="text-transform: capitalize"
                   value="<?= isset($etiquette) ? $etiquette->getEmplacementChariot() : '' ?>"/>
        </label><br/>
    </p>

    <?php
    if (isset($etiquette) && !$etiquette->isNew()) {
        ?>
        <input type="hidden" name="id"
               value="<?= isset($etiquette) ? $etiquette->getIdEtiquette() : '' ?>"/>
            <input type="submit" value="Modifier" name="modifier"/>
        </label>
        <?php
    } else {
        ?>
        <label>
            <input type="submit" value="Ajouter"/>
        </label>
        <?php
    }
    ?>
    </p>
</form>