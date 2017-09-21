<form action="" method="post" xmlns="http://www.w3.org/1999/html">
    <p>
        <table>
                <tr>
                    <th>Famille</th>
                    <td><textarea name="famille" cols="30" style="resize: none"></textarea></td>
                </tr>
                <tr>
                    <th>Espece</th>
                    <td><textarea name="espece" cols="30" style="resize: none"></textarea></td>
                </tr>
                <tr>    
                    <th>Origine</th>
                    <td><textarea name="origine" cols="30" style="resize: none"></textarea></td>
                </tr>    
                <tr>
                    <th>Forme</th>
                    <td><textarea name="forme" cols="30" style="resize: none"></textarea></td>
                </tr>    
                <tr>
                    <th>Taille et poids</th>
                    <td><textarea name="tailleEtPoids" cols="30" style="resize: none"></textarea></td>
                </tr>    
                <tr>
                    <th>Couleur et Texture</th>
                    <td><textarea name="couleurEtTexture" cols="30" style="resize: none"></textarea></td>
                </tr>    
                <tr>
                    <th>Saveur</th>
                    <td><textarea name="saveur" cols="30" style="resize: none"></textarea></td>
                </tr>    
                <tr>
                    <th>Principaux producteurs</th>
                    <td><textarea name="principauxProducteur" cols="30" style="resize: none"></textarea></td>
                </tr>
        </table>
            <input type="hidden" name="variete" value="<?= isset($variete) ? $variete : '' ?>"/>
            <input type="hidden" name="nomProduit" value="<?= isset($nom) ? $nom : '' ?>"/>
            <input type="hidden" name="idProduit" value="<?= isset($prod) ? $prod->getIdProduit() : '' ?>"/>
            <input type="submit" value="Ajouter"/>
    </p>
</form>