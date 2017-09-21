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

        <span style="color: red"><strong>
        <?= isset($erreursPresentation) && in_array(\Entity\Presentation::CONTENU_EMPTY, $erreursPresentation) ? 'Veuillez remplir ce champ.<br />' : '' ?>
            </strong></span>
        <label>
            Présentation du produit<br/>
            <textarea name="presentation" cols="56"
                      style="resize: none"><?= isset($presentation) ? $presentation->getContenu() : '' ?></textarea>
        </label><br/>

        <label>
            Photo du produit<br/>
            <input type="file" name="photo"/>
        </label><br/>

        <?php
        if (!isset($insert)){
        ?>
        <label>
            Fiche de Maturite
        </label>
        <?php
        if (!isset($produit) || empty($produit->getListeMaturite())){
            ?><label>Aucune fiche</label><?php
            if (isset($produit)) {
                ?><a
                href="maturite-insert-<?= preg_replace('#[ ]+#', '_', $produit->getNomProduit()); ?>-<?= preg_replace('#[ ]+#', '_', $produit->getVarieteProduit()); ?>.html">
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
                <td><?= preg_replace('#[_]+#', ' ', $produit->getNomProduit()); ?></td>
                <td><?= preg_replace('#[_]+#', ' ', $produit->getVarieteProduit()); ?></td>
                <td><?= $prod->getNiveau(); ?></td>
                <td><?php if ($prod->getMaturiteIdeale()) {
                        echo "oui";
                    } ?></td>
                <td NOWRAP>
                    <a href="maturite-show-<?= $prod->getIdMaturite() ?>.html">Afficher</a>
                    <a href="maturite-update-<?= $prod->getIdMaturite() ?>.html">Modifier</a>
                    <a href="maturite-delete-<?= $prod->getIdMaturite() ?>.html"
                       onclick="return confirm('Etes vous sûr de vouloir supprimer ?')">Supprimer</a>
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
                    <td><?= preg_replace('#[_]+#', ' ', $produit->getNomProduit()); ?></td>
                    <td><?= preg_replace('#[_]+#', ' ', $produit->getVarieteProduit()); ?></td>
                    <td><?= $prod->getNiveau(); ?></td>
                    <td NOWRAP>
                        <a href="etat-show-<?= $prod->getIdEtat() ?>.html">Afficher</a>
                        <a href="etat-update-<?= $prod->getIdEtat() ?>.html">Modifier</a>
                        <a href="etat-delete-<?= $prod->getIdEtat() ?>.html"
                           onclick="return confirm('Etes vous sûr de vouloir supprimer ?')">Supprimer</a>
                    </td>
                </tr>
                <?php
            } ?>
            <!-- <tr><td colspan=3></td></tr>-->
        </table>
        <a href="etat-insert-<?= $produit->getNomProduit(); ?>-<?= $produit->getVarieteProduit(); ?>.html">Ajouter une
            fiche</a>
        <?php
    }
    } ?>

        <label>
            Caractéristiques
        </label>
            <?php
            if(isset($produit) && $produit->getListeCaracteristique() != null)
            {
                $caracteristique = $produit->getListeCaracteristique();
                $caracteristique = $caracteristique[0];

            ?>
            <table>
                <input type="hidden" name="idCaracteristique"value="<?= isset($caracteristique) ? $caracteristique->getIdCaracteristique() : '' ?>"/>
                <tr>
                    <th>Famille</th>
                    <td><textarea name="famille" cols="30" style="resize: none"><?= isset($caracteristique) ? $caracteristique->getFamille() : '' ?></textarea></td>
                </tr>
                <tr>
                    <th>Espece</th>
                    <td><textarea name="espece" cols="30" style="resize: none"><?= isset($caracteristique) ? $caracteristique->getEspece() : '' ?></textarea></td>
                </tr>
                <tr>    
                    <th>Origine</th>
                    <td><textarea name="origine" cols="30" style="resize: none"><?= isset($caracteristique) ? $caracteristique->getOrigine() : '' ?></textarea></td>
                </tr>    
                <tr>
                    <th>Forme</th>
                    <td><textarea name="forme" cols="30" style="resize: none"><?= isset($caracteristique) ? $caracteristique->getForme() : '' ?></textarea></td>
                </tr>    
                <tr>
                    <th>Taille et poids</th>
                    <td><textarea name="tailleEtPoids" cols="30" style="resize: none"><?= isset($caracteristique) ? $caracteristique->getTaillePoids() : '' ?></textarea></td>
                </tr>    
                <tr>
                    <th>Couleur et Texture</th>
                    <td><textarea name="couleurEtTexture" cols="30" style="resize: none"><?= isset($caracteristique) ? $caracteristique->getCouleurTexture() : '' ?></textarea></td>
                </tr>    
                <tr>
                    <th>Saveur</th>
                    <td><textarea name="saveur" cols="30" style="resize: none"><?= isset($caracteristique) ? $caracteristique->getSaveur() : '' ?></textarea></td>
                </tr>    
                <tr>
                    <th>Principaux producteurs</th>
                    <td><textarea name="principauxProducteur" cols="30" style="resize: none"><?= isset($caracteristique) ? $caracteristique->getPrincipauxProducteurs() : '' ?></textarea></td>
                </tr>
            </table>

                <a href="caracteristique-delete-<?= isset($caracteristique) ? $caracteristique->getIdCaracteristique() : '' ?>.html" onclick="return confirm('Etes vous sûr de vouloir supprimer ?')">Supprimer</a>
            <?php
        }
        else if(isset($produit))
        {
            ?>
        <a href="caracteristique-insert-<?= $produit->getNomProduit(); ?>-<?= $produit->getVarieteProduit(); ?>.html">Ajouter une fiche</a>
        <?php
        }
             ?>

        <label>
            Conseil de consommation
        </label>
                <?php
                if(isset($produit) && $produit->getListeConseil() != null)
                {
                    $conseil = $produit->getListeConseil();
                    $conseil = $conseil[0];
                ?>
            <table>
                <input type="hidden" name="idConseil"value="<?= isset($conseil) ? $conseil->getIdConseil() : '' ?>"/>
                    <tr>
                        <td><textarea name="conseil1" cols="30" style="resize: none"><?= isset($conseil) ? $conseil->getConseil1() : '' ?></textarea></td>
                        <td><textarea name="conseil2" cols="30" style="resize: none"><?= isset($conseil) ? $conseil->getConseil2() : '' ?></textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="conseil3" cols="30" style="resize: none"><?= isset($conseil) ? $conseil->getConseil3() : '' ?></textarea></td>
                        <td><textarea name="conseil4" cols="30" style="resize: none"><?= isset($conseil) ? $conseil->getConseil4() : '' ?></textarea></td>
                    </tr>
                    <tr>    
                        <td><textarea name="conseil5" cols="30" style="resize: none"><?= isset($conseil) ? $conseil->getConseil5() : '' ?></textarea></td>
                        <td><textarea name="conseil6" cols="30" style="resize: none"><?= isset($conseil) ? $conseil->getConseil6() : '' ?></textarea></td>
                    </tr>  
                </table>
                <a href="conseil-delete-<?= isset($conseil) ? $conseil->getIdConseil() : '' ?>.html" onclick="return confirm('Etes vous sûr de vouloir supprimer ?')">Supprimer</a>
            <?php
        }
        else if (isset($produit))
        {
            ?>
        <a href="conseil-insert-<?= $produit->getNomProduit(); ?>-<?= $produit->getVarieteProduit(); ?>.html">Ajouter une fiche</a>
        <?php
        }
             ?>
        

        <label>
            Bénéfice sur la santé
        </label>
            <?php
            if(isset($produit) && $produit->getListeBeneficeSante() != null)
            {
                $beneficeSante = $produit->getListeBeneficeSante();
                $beneficeSante = $beneficeSante[0];
            ?>
            <table>
                <input type="hidden" name="idBeneficeSante"value="<?= isset($beneficeSante) ? $beneficeSante->getIdBeneficeSante() : '' ?>"/>
                    <tr>
                        <td><textarea name="benefice1" cols="30" style="resize: none"><?= isset($beneficeSante) ? $beneficeSante->getBenefice1() : '' ?></textarea></td>
                        <td><textarea name="benefice2" cols="30" style="resize: none"><?= isset($beneficeSante) ? $beneficeSante->getBenefice2() : '' ?></textarea></td>
                    </tr>
                    <tr>
                        <td><textarea name="benefice3" cols="30" style="resize: none"><?= isset($beneficeSante) ? $beneficeSante->getBenefice3() : '' ?></textarea></td>
                        <td><textarea name="benefice4" cols="30" style="resize: none"><?= isset($beneficeSante) ? $beneficeSante->getBenefice4() : '' ?></textarea></td>
                    </tr>
                    <tr>    
                        <td><textarea name="benefice5" cols="30" style="resize: none"><?= isset($beneficeSante) ? $beneficeSante->getBenefice5() : '' ?></textarea></td>
                        <td><textarea name="benefice6" cols="30" style="resize: none"><?= isset($beneficeSante) ? $beneficeSante->getBenefice6() : '' ?></textarea></td>
                    </tr>
                </table>
                <a href="beneficeSante-delete-<?= isset($beneficeSante) ? $beneficeSante->getIdBeneficeSante() : '' ?>.html" onclick="return confirm('Etes vous sûr de vouloir supprimer ?')">Supprimer</a>
            <?php
        }
        else if (isset($produit))
        {
            ?>
        <a href="beneficeSante-insert-<?= $produit->getNomProduit(); ?>-<?= $produit->getVarieteProduit(); ?>.html">Ajouter une fiche</a>
        <?php
        }
             ?>
        

        <label>
            Marketing
        </label>
            <?php
            if(isset($produit) && $produit->getListeMarketing() != null)
            {
                $marketing = $produit->getListeMarketing();
                $marketing = $marketing[0];
            ?>
            <table>
            <input type="hidden" name="idMarketing"value="<?= isset($marketing) ? $marketing->getIdMarketing() : '' ?>"/>
                <tr>
                    <td><textarea name="marketing1" cols="30" style="resize: none"><?= isset($marketing) ? $marketing->getMarketing1() : '' ?></textarea></td>
                    <td><textarea name="marketing2" cols="30" style="resize: none"><?= isset($marketing) ? $marketing->getMarketing2() : '' ?></textarea></td>
                </tr> 
            </table>
            <a href="marketing-delete-<?= isset($marketing) ? $marketing->getIdMarketing() : '' ?>.html" onclick="return confirm('Etes vous sûr de vouloir supprimer ?')">Supprimer</a>
            <?php
        }
        else if (isset($produit))
        {
            ?>
        <a href="marketing-insert-<?= $produit->getNomProduit(); ?>-<?= $produit->getVarieteProduit(); ?>.html">Ajouter une fiche</a>
        <?php
        }
             ?>

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
</form>