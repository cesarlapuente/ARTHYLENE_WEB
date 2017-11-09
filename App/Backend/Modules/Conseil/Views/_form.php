<form action="" method="post" xmlns="http://www.w3.org/1999/html">
    <p>
        <table>
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
            <input type="hidden" name="variete" value="<?= isset($variete) ? $variete : '' ?>"/>
            <input type="hidden" name="nomProduit" value="<?= isset($nom) ? $nom : '' ?>"/>
            <input type="hidden" name="idProduit" value="<?= isset($prod) ? $prod->getIdProduit() : '' ?>"/>
            <input type="submit" value="Ajouter"/>
    </p>
</form>