<form action="" method="post">
    <p>
        <span style="color: red"><strong>
        <?= isset($erreurs) && in_array(\Entity\Produit::NOM_PRODUIT_INVALIDE, $erreurs) ? 'Le nom du produit est invalide.<br />' : '' ?>
        <?= isset($erreurs) && in_array(\Entity\Produit::NOM_PRODUIT_EMPTY, $erreurs) ? 'Veuillez remplir ce champ.<br />' : '' ?>
            </strong></span>

        <label>Nom du produit<br/>
            <input type="text" name="nom" style="text-transform: capitalize"
                   value="<?= isset($produit) ? preg_replace('#[_]+#', ' ', $produit->getNomProduit()) : '' ?>"/>
        </label><br/>

        <span style="color: red"><strong>
        <?= isset($erreurs) && in_array(\Entity\Produit::VARIETE_PRODUT_INVALIDE, $erreurs) ? 'La variété du produit est invalide.<br />' : '' ?>
        <?= isset($erreurs) && in_array(\Entity\Produit::VARIETE_PRODUIT_EMPTY, $erreurs) ? 'Veuillez remplir ce champ.<br />' : '' ?>
        </strong></span>
        <label>Variété du produit<br/>
            <input type="text" name="variete" style="text-transform: capitalize"
                   value="<?= isset($produit) ? preg_replace('#[_]+#', ' ', $produit->getVarieteProduit()) : '' ?>"/><br/>
        </label><br/>

        <label>Code de l'étiquette<br/>
            <input type="text" name="code" style="text-transform: capitalize"
                   value=""/>
        </label><br/>

        <label>
            Photo de l'étiquette<br/>
            <input type="file" name="photo"/>
        </label><br/>

    <h3>Presentation</h3>
    <p>
        <label>Emplacement dans le rayon été<br/>
            <input type="number" name="ete" style="text-transform: capitalize"
                   value=""/>
        </label><br/>

        <label>Emplacement dans le rayon automne<br/>
            <input type="number" name="automne" style="text-transform: capitalize"
                   value=""/>
        </label><br/>

        <label>Emplacement dans le rayon hiver<br/>
            <input type="number" name="hiver" style="text-transform: capitalize"
                   value=""/>
        </label><br/>

        <label>Emplacement dans le rayon printemps<br/>
            <input type="number" name="printemps" style="text-transform: capitalize"
                   value=""/>
        </label><br/>

        <label>Nombre de couche max<br/>
            <input type="number" name="couche" style="text-transform: capitalize"
                   value=""/>
        </label><br/>

    </p>

    <h3>Reception</h3>
    <p>
        <label>Maturité minimale<br/>
            <input type="number" name="matMin" style="text-transform: capitalize"
                   value=""/>
        </label><br/>

        <label>Maturité maximale<br/>
            <input type="number" name="matMax" style="text-transform: capitalize"
                   value=""/>
        </label><br/>

        <label>Emplacement idéal dans le chariot<br/>
            <input type="number" name="chariot" style="text-transform: capitalize"
                   value=""/>
        </label><br/>
    </p>

    <?php
    if (isset($produit) && !$produit->isNew()) {
        ?>
        <input type="hidden" name="modif"
               value="<?= isset($produit) ? $produit->getVarieteProduit() : '' ?>"/>
        <input type="hidden" name="modifName"
               value="<?= isset($produit) ? $produit->getNomProduit() : '' ?>"/>
        <input type="hidden" name="idPres"
               value="<?= isset($produit) ? $produit->getIdPresentation() : '' ?>"/>
        <label>
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