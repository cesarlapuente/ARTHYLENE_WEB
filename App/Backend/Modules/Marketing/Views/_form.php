<form action="" method="post" xmlns="http://www.w3.org/1999/html">
    <p>
        <table>
                <tr>
                    <td><textarea name="marketing1" cols="30" style="resize: none"><?= isset($marketing) ? $marketing->getMarketing1() : '' ?></textarea></td>
                    <td><textarea name="marketing2" cols="30" style="resize: none"><?= isset($marketing) ? $marketing->getMarketing2() : '' ?></textarea></td>
                </tr> 
        </table>
            <input type="hidden" name="variete" value="<?= isset($variete) ? $variete : '' ?>"/>
            <input type="hidden" name="nomProduit" value="<?= isset($nom) ? $nom : '' ?>"/>
            <input type="hidden" name="idProduit" value="<?= isset($prod) ? $prod->getIdProduit() : '' ?>"/>
            <input type="submit" value="Ajouter"/>
    </p>
</form>