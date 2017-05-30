<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 29/05/2017
 * Time: 10:47
 */

namespace Model;


use Entity\Produit;

class ProduitManagerPDO extends ProduitManager
{
    /**
     * Méthode retournant une liste de produits demandée.
     * @return array La liste des news. Chaque entrée est une instance de Produit.
     */
    public function getList()
    {
        $sql = 'SELECT DISTINCT nomProduit, varieteProduit FROM produit';

        $requete = $this->dao->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Produit');

        $listeProduits = $requete->fetchAll();

        $requete->closeCursor();

        return $listeProduits;
    }

    /**
     * Méthode retournant la page du produit
     * @param $id int L'identifiant de la news à récupérer
     * @return Produit Le produit demandée
     */
    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT idProduit, nomProduit, varieteProduit FROM produit WHERE varieteProduit = :id');
        $requete->bindValue(':id', $id);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Produit');

        $reqMaturite = $this->dao->prepare('SELECT niveauMaturite, idMaturite FROM produit WHERE varieteProduit = :id AND niveauMaturite!= \'\' ORDER BY niveauMaturite');
        $reqMaturite->bindValue(':id', $id);
        $reqMaturite->execute();

        $reqMaturite->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Produit');

        $reqMatIdeale = $this->dao->prepare('SELECT idMaturite, maturiteIdeale FROM maturite WHERE maturiteIdeale = 1');
        $reqMatIdeale->execute();

        $reqMatIdeale->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Maturite');

        $reqEtat = $this->dao->prepare('SELECT niveauEtat, idEtat FROM produit WHERE varieteProduit = :id AND niveauEtat!= \'\' ORDER BY niveauEtat');
        $reqEtat->bindValue(':id', $id);
        $reqEtat->execute();
        $reqEtat->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Produit');

        if ($produit = $requete->fetch()) {
            $produit->setListeMaturite($reqMaturite->fetchAll());
            $produit->setListeEtat($reqEtat->fetchAll());
            $produit->setMaturiteIdeale($reqMatIdeale->fetch());
            return $produit;
        }

        return null;
    }
}