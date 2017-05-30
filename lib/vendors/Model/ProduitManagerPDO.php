<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 29/05/2017
 * Time: 10:47
 */

namespace Model;


class ProduitManagerPDO extends ProduitManager
{
    /**
     * Méthode retournant une liste de news demandée.
     * @return array La liste des news. Chaque entrée est une instance de News.
     */
    public function getList()
    {
        $sql = 'SELECT idProduit, nomProduit, varieteProduit, niveauMaturite, idMaturite, niveauEtat, idEtat, idPresentation FROM produit ORDER BY idProduit DESC';

        $requete = $this->dao->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Produit');

        $listeProduits = $requete->fetchAll();

        /*foreach ($listeProduits as $produit)
        {
            $produit->setDateAjout(new \DateTime($produit->dateAjout()));
            $produit->setDateModif(new \DateTime($produit->dateModif()));
        }*/

        $requete->closeCursor();

        return $listeProduits;
    }

    /**
     * Méthode retournant une news précise.
     * @param $id int L'identifiant de la news à récupérer
     * @return News La news demandée
     */
    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT idProduit, nomProduit, varieteProduit, niveauMaturite, idMaturite,
 niveauEtat, idEtat, idPresentation FROM produit WHERE idProduit = :id');
        $requete->bindValue(':id', (int)$id, \PDO::PARAM_INT);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Produit');

        if ($produit = $requete->fetch()) {
            return $produit;
        }

        return null;
    }
}