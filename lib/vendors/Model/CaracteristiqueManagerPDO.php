<?php

namespace Model;


use Entity\Caracteristique;
use PDO;

class CaracteristiqueManagerPDO extends CaracteristiqueManager
{

    /**
     * Méthode retournant une fiche caracteristique précise.
     * @param $id int L'identifiant de la presentation à récupérer
     * @return Caracteristique La fiche maturite demandée
     */
    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT * FROM caracteristique WHERE idCaracteristique = :id');
        $requete->execute(array(
            'id' => $id
        ));

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Caracteristique');
        if ($caracteristique = $requete->fetch()) {
            return $caracteristique;
        }
    }

    public function GetAll()
    {
        $requete = $this->dao->query('SELECT * FROM caracteristique');
        if ($caracteristique = $requete->fetchAll(PDO::FETCH_ASSOC)) {
            return $caracteristique;
        }
        return null;
    }

    public function deleteUnique($id)
    {
        $requete = $this->dao->prepare('DELETE FROM caracteristique WHERE idCaracteristique = :id');
        $requete->execute(array(
            'id' => $id
        ));

        $requete = $this->dao->prepare('UPDATE produit SET idCaracteristique = null WHERE idCaracteristique = :id');
        $requete->execute(array(
            'id' => $id
        ));
    }

    protected function add(Caracteristique $caracteristique)
    {
        $requete = $this->dao->prepare('INSERT INTO caracteristique SET idProduit = :idProduit, famille = :famille, espece = :espece, origine = :origine, forme = :forme, taillePoids = :taillePoids, couleurTexture = :couleurTexture, saveur = :saveur, principauxProducteurs = :principauxProducteurs');
        $requete->execute(array(
            'idProduit' => $caracteristique->getIdProduit(),
            'famille' => urldecode($caracteristique->getFamille()),
            'espece' => urldecode($caracteristique->getEspece()),
            'origine' => urldecode($caracteristique->getOrigine()),
            'forme' => urldecode($caracteristique->getForme()),
            'taillePoids' => urldecode($caracteristique->getTaillePoids()),
            'couleurTexture' => urldecode($caracteristique->getCouleurTexture()),
            'saveur' => urldecode($caracteristique->getSaveur()),
            'principauxProducteurs' => urldecode($caracteristique->getPrincipauxProducteurs())
        ));

        $requete = $this->dao->prepare('SELECT idCaracteristique FROM caracteristique WHERE idProduit = :idProduit');
        $requete->execute(array(
            'idProduit' => $caracteristique->getIdProduit()
        ));
        $idCaracteristique = $requete->fetch();

        $requete = $this->dao->prepare('UPDATE produit SET idCaracteristique = :idCaracteristique WHERE idProduit = :idProduit');
        $requete->execute(array(
            'idCaracteristique' => $idCaracteristique['idCaracteristique'],
            'idProduit' => $caracteristique->getIdProduit()
        ));
    }
}