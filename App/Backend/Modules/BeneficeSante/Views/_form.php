<form action="" method="post" xmlns="http://www.w3.org/1999/html">
    <p>
        <table>
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
            <input type="hidden" name="variete" value="<?= isset($variete) ? $variete : '' ?>"/>
            <input type="hidden" name="nomProduit" value="<?= isset($nom) ? $nom : '' ?>"/>
            <input type="hidden" name="idProduit" value="<?= isset($prod) ? $prod->getIdProduit() : '' ?>"/>
            <input type="submit" value="Ajouter"/>
    </p>
</form>