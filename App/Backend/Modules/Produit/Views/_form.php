<form action="" method="post">
    <p>
        <?= isset($erreurs) && in_array(\Entity\Produit::NOM_PRODUIT_INVALIDE, $erreurs) ? 'Le nom du produit est invalide.<br />' : '' ?>

        <label>Nom du produit<br/>
            <input type="text" name="nom" style="text-transform: capitalize"
                   value="<?= isset($produit) ? $produit->getNomProduit() : '' ?>"/>
        </label><br/>

        <?= isset($erreurs) && in_array(\Entity\Produit::VARIETE_PRODUT_INVALIDE, $erreurs) ? 'La variété du produit est invalide.<br />' : '' ?>
        <label>Variété du produit<br/>
            <input type="text" name="variete" style="text-transform: capitalize"
                   value="<?= isset($produit) ? $produit->getVarieteProduit() : '' ?>"/><br/>
        </label><br/>

        <label>
            Présentation du produit<br/>
            <textarea name="presentation" cols="75"
                      style="resize: none"><?= isset($presentation) ? $presentation->getContenu() : '' ?></textarea>
        </label><br/>

        <label>
            Photo du produit<br/>
            <input type="file" name="photo"/>
        </label><br/>

        <label>
            Fiche de Maturite
        </label>
        <?php
        if (!isset($produit) || empty($produit->getListeMaturite())){
            ?><label>Aucune fiche</label><?php
            if (isset($produit)) {
                ?><a
                href="maturite-insert-<?= $produit->getNomProduit(); ?>-<?= $produit->getVarieteProduit(); ?>.html">
                    Ajouter une fiche</a><?php
            }
        }else{
        ?>
    <table>
        <tr>
            <th>Nom du produit</th>
            <th>Variete du produit</th>
            <th>Niveau de maturité</th>
            <th>Maturité idéale</th>
            <th></th>
        </tr>
        <?php
        foreach ($produit->getListeMaturite() as $prod) {
            ?>
            <tr>
                <td><?= $produit->getNomProduit(); ?></td>
                <td><?= $produit->getVarieteProduit(); ?></td>
                <td><?= $prod->getNiveau(); ?></td>
                <td><?php if ($prod->getMaturiteIdeale()) {
                        echo "oui";
                    } ?></td>
                <td NOWRAP>
                    <a href="maturite-.html">Afficher</a>
                    <a href="maturite-update-<?= $prod->getIdMaturite() ?>.html">Modifier</a>
                    <a href="maturite-delete-<?= $prod->getIdMaturite() ?>.html">Supprimer</a>
                </td>
            </tr>
            <?php
        } ?>
        <!--<tr><td colspan=3></td></tr>-->

    </table>
    <a href="maturite-insert-<?= $produit->getNomProduit(); ?>-<?= $produit->getVarieteProduit(); ?>.html">Ajouter une
        fiche</a>
    <?php
    } ?>

    <label>
        Fiche d'etat
    </label>
    <?php
    if (!isset($produit) || empty($produit->getListeEtat())) {
        ?><label>Aucune fiche</label><?php
        if (isset($produit)) {
            ?><a href="etat-insert-<?= $produit->getNomProduit(); ?>-<?= $produit->getVarieteProduit(); ?>.html">Ajouter
                une fiche</a><br/><?php
        }
    } else {
        ?>
        <table>
            <tr>
                <th>Nom du produit</th>
                <th>Variete du produit</th>
                <th>Niveau de l'état</th>
                <th></th>
            </tr>
            <?php
            foreach ($produit->getListeEtat() as $prod) {
                ?>
                <tr>
                    <td><?= $produit->getNomProduit(); ?></td>
                    <td><?= $produit->getVarieteProduit(); ?></td>
                    <td><?= $prod->getNiveau(); ?></td>
                    <td>
                        <a href="etat-.html">Afficher</a>
                    </td>
                </tr>
                <?php
            } ?>
            <!-- <tr><td colspan=3></td></tr>-->
        </table>
        <a href="">Ajouter une fiche</a>
        <?php
    } ?>



        <?php
        if (isset($produit) && !$produit->isNew()) {
            //$produit->setIdProduit(1);
            ?>
            <input type="hidden" name="modif"
                   value="<?= isset($produit) ? $produit->getVarieteProduit() : '' ?>"/></input>
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