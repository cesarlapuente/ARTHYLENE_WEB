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
            <?php
            if(isset($caracteristique) && $caracteristique != null)
            {
            ?>
            <table style="width: 98%;">
                <tr>
                    <th>Famille</th>
                    <td>
                        <div class="cube">
                            <?= isset($caracteristique) ? $caracteristique->getFamille() : '' ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Espece</th>
                    <td>
                        <div class="cube">
                            <?= isset($caracteristique) ? $caracteristique->getEspece() : '' ?>
                        </div>
                    </td>
                </tr>
                <tr>    
                    <th>Origine</th>
                    <td>
                        <div class="cube">
                            <?= isset($caracteristique) ? $caracteristique->getOrigine() : '' ?>
                        </div>
                    </td>
                </tr>    
                <tr>
                    <th>Forme</th>
                    <td>
                        <div class="cube">
                            <?= isset($caracteristique) ? $caracteristique->getForme() : '' ?>
                        </div>
                    </td>
                </tr>    
                <tr>
                    <th>Taille et poids</th>
                    <td>
                        <div class="cube">
                            <?= isset($caracteristique) ? $caracteristique->getTaillePoids() : '' ?>
                        </div>
                    </td>
                </tr>    
                <tr>
                    <th>Couleur et Texture</th>
                    <td>
                        <div class="cube">
                            <?= isset($caracteristique) ? $caracteristique->getCouleurTexture() : '' ?>
                        </div>
                    </td>
                </tr>    
                <tr>
                    <th>Saveur</th>
                    <td>
                        <div class="cube">
                            <?= isset($caracteristique) ? $caracteristique->getSaveur() : '' ?>
                        </div>
                    </td>
                </tr>    
                <tr>
                    <th>Principaux producteurs</th>
                    <td>
                        <div class="cube">
                            <?= isset($caracteristique) ? $caracteristique->getPrincipauxProducteurs() : '' ?>
                        </div>
                    </td>
                </tr>
            </table>
            <?php
        }
        else if(isset($produit))
        {
            ?>
        <h4>Aucune fiche</h4>
        <?php
        }
             ?>
        </p>

<p><h3>Conseil de consommation</h3>
            <?php
            if(isset($conseil) && $conseil != null)
            {
            ?>
            <table style="width: 98%;">
                <tr>
                    <td>
                        <div class="cube">
                            <?= isset($conseil) ? $conseil->getConseil1() : '' ?>
                        </div>
                    </td>
                    <td>
                        <div class="cube">
                            <?= isset($conseil) ? $conseil->getConseil2() : '' ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="cube">
                            <?= isset($conseil) ? $conseil->getConseil3() : '' ?>
                        </div>
                    </td>
                    <td>
                        <div class="cube">
                            <?= isset($conseil) ? $conseil->getConseil4() : '' ?>
                        </div>
                    </td>
                </tr>
                <tr>    
                    <td>
                        <div class="cube">
                            <?= isset($conseil) ? $conseil->getConseil5() : '' ?>
                        </div>
                    </td>
                    <td>
                        <div class="cube">
                            <?= isset($conseil) ? $conseil->getConseil6() : '' ?>
                        </div>
                    </td>
                </tr>
                </table>   
            <?php
        }
        else if (isset($produit))
        {
            ?>
        <h4>Aucune fiche</h4>
        <?php
        }
             ?>
        </p>

<p><h3>Bénéfice sur la santé</h3>
            <?php
            if(isset($beneficeSante) && $beneficeSante != null)
            {
            ?>
            <table style="width: 98%;">
                <tr>
                    <td>
                        <div class="cube">
                            <?= isset($beneficeSante) ? $beneficeSante->getBenefice1() : '' ?>
                        </div>
                    </td>
                    <td>
                        <div class="cube">
                            <?= isset($beneficeSante) ? $beneficeSante->getBenefice2() : '' ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="cube">
                            <?= isset($beneficeSante) ? $beneficeSante->getBenefice3() : '' ?>
                        </div>
                    </td>
                    <td>
                        <div class="cube">
                            <?= isset($beneficeSante) ? $beneficeSante->getBenefice4() : '' ?>
                        </div>
                    </td>
                </tr>
                <tr>    
                    <td>
                        <div class="cube">
                            <?= isset($beneficeSante) ? $beneficeSante->getBenefice5() : '' ?>
                        </div>
                    </td>
                    <td>
                        <div class="cube">
                            <?= isset($beneficeSante) ? $beneficeSante->getBenefice6() : '' ?>
                        </div>
                    </td>
                </tr>
            </table>  
            <?php
            }
            else if (isset($produit))
            {
            ?>
        <h4>Aucune fiche</h4>
        <?php
        }
             ?>
        </p>

<p><h3>Marketing</h3>
            <?php
            if(isset($marketing) && $marketing != null)
            {
            ?>
            <table style="width: 98%;">
                <tr>
                    <td>
                        <div class="cube">
                            <?= isset($marketing) ? $marketing->getMarketing1() : '' ?>
                        </div>
                    </td>
                    <td>
                        <div class="cube">
                            <?= isset($marketing) ? $marketing->getMarketing2() : '' ?>
                        </div>
                    </td>
                </tr>
            </table>
            <?php
            }
            else if (isset($produit))
            {
            ?>
        <h4>Aucune fiche</h4>
        <?php
        }
         ?>
        </p>
    <br>
