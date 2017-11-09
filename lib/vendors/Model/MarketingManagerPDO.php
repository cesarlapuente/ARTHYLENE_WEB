<?php

namespace Model;


use Entity\Marketing;
use PDO;

class MarketingManagerPDO extends MarketingManager
{

    /**
     * Méthode retournant une fiche marketing précise.
     * @param $id int L'identifiant du marketing à récupérer
     * @return marketing La fiche marketing demandée
     */
    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT * FROM marketing WHERE idMarketing = :id');
        $requete->execute(array(
            'id' => $id
        ));

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Marketing');
        if ($marketing = $requete->fetch()) {
            return $marketing;
        }
    }

    public function GetAll()
    {
        $requete = $this->dao->query('SELECT * FROM marketing');
        if ($marketing = $requete->fetchAll(PDO::FETCH_ASSOC)) {
            return $marketing;
        }
        return null;
    }

    public function deleteUnique($id)
    {
        $requete = $this->dao->prepare('DELETE FROM marketing WHERE idMarketing = :id');
        $requete->execute(array(
            'id' => $id
        ));

        $requete = $this->dao->prepare('UPDATE produit SET idMarketing = null WHERE idMarketing = :id');
        $requete->execute(array(
            'id' => $id
        ));
    }

    protected function add(Marketing $marketing)
    {
        $requete = $this->dao->prepare('INSERT INTO marketing SET idProduit = :idProduit, marketing1 = :marketing1, marketing2 = :marketing2');
        $requete->execute(array(
            'idProduit' => $marketing->getIdProduit(),
            'marketing1' => urldecode($marketing->getMarketing1()),
            'marketing2' => urldecode($marketing->getMarketing2())
        ));

        $requete = $this->dao->prepare('SELECT idMarketing FROM marketing WHERE idProduit = :idProduit');
        $requete->execute(array(
            'idProduit' => $marketing->getIdProduit()
        ));
        $idMarketing = $requete->fetch();

        $requete = $this->dao->prepare('UPDATE produit SET idMarketing = :idMarketing WHERE idProduit = :idProduit');
        $requete->execute(array(
            'idMarketing' => $idMarketing['idMarketing'],
            'idProduit' => $marketing->getIdProduit()
        ));
    }
}