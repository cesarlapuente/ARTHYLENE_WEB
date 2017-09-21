<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 30/05/2017
 * Time: 11:58
 */
?><h2><?= $title . " " . preg_replace('#[_]+#', ' ', $produit->getVArieteProduit()); ?></h2>
<p>
<h3>Présentation</h3>
<div style="border:solid 1px darkgrey;height:120px;">
    <?= $presentation->getContenu(); ?>
</div>
</p>
<p><h3>Fiches des maturités du produit</h3>
<?php
if (empty($produit->getListeMaturite())){
    ?><h4>Aucune fiche</h4><?php
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
            <td>
                <a href="maturite-show-<?= $prod->getIdMaturite() ?>.html">Afficher</a>
            </td>
        </tr>
        <?php
    }
    } ?></table></p>
<p><h3>Fiches des états du produit</h3>
<?php
if (empty($produit->getListeEtat())){
    ?><h4>Aucune fiche</h4><?php
}else{
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
            <td>
                <a href="etat-show-<?= $prod->getIdEtat() ?>.html">Afficher</a>
            </td>
        </tr>
        <?php
    }
    }?></table></p>

<p><h3>Caractéristiques</h3>
        <table>
            <?php
            if(isset($caracteristique) && $caracteristique != null)
            {
            ?>
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

            <?php
        }
        else if(isset($produit))
        {
            ?>
        <h4>Aucune fiche</h4>
        <?php
        }
             ?>
        </table></p>

<p><h3>Conseil de consommation</h3>
        <table>
            <?php
            if(isset($conseil) && $conseil != null)
            {
            ?>
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
            <?php
        }
        else if (isset($produit))
        {
            ?>
        <h4>Aucune fiche</h4>
        <?php
        }
             ?>
        </table></p>

<p><h3>Bénéfice sur la santé</h3>
        <table>
            <?php
            if(isset($beneficeSante) && $beneficeSante != null)
            {
            ?>
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
            <?php
            }
            else if (isset($produit))
            {
            ?>
        <h4>Aucune fiche</h4>
        <?php
        }
             ?>
        </table></p>

<p><h3>Marketing</h3>
    <table>
            <?php
            if(isset($marketing) && $marketing != null)
            {
            ?>
                <tr>
                    <td><textarea name="marketing1" cols="30" style="resize: none"><?= isset($marketing) ? $marketing->getMarketing1() : '' ?></textarea></td>
                    <td><textarea name="marketing2" cols="30" style="resize: none"><?= isset($marketing) ? $marketing->getMarketing2() : '' ?></textarea></td>
                </tr>   
            <?php
            }
            else if (isset($produit))
            {
            ?>
        <h4>Aucune fiche</h4>
        <?php
        }
             ?>
        </table></p>
    <br>
