<?php

namespace Model;


use Entity\BeneficeSante;
use PDO;

class BeneficeSanteManagerPDO extends BeneficeSanteManager
{

    /**
     * Méthode retournant une fiche benefice précise.
     * @param $id int L'identifiant du benefice à récupérer
     * @return benefice La fiche benefice demandée
     */
    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT * FROM beneficesante WHERE idBeneficeSante = :id');
        $requete->execute(array(
            'id' => $id
        ));

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\BeneficeSante');
        if ($beneficeSante = $requete->fetch()) {
            return $beneficeSante;
        }
    }

    public function GetAll()
    {
        $requete = $this->dao->query('SELECT * FROM beneficesante');
        if ($beneficeSante = $requete->fetchAll(PDO::FETCH_ASSOC)) {
            return $beneficeSante;
        }
        return null;
    }

    public function deleteUnique($id)
    {
        $requete = $this->dao->prepare('DELETE FROM beneficesante WHERE idBeneficeSante = :id');
        $requete->execute(array(
            'id' => $id
        ));

        $requete = $this->dao->prepare('UPDATE produit SET idBeneficeSante = null WHERE idBeneficeSante = :id');
        $requete->execute(array(
            'id' => $id
        ));
    }

    protected function add(BeneficeSante $beneficeSante)
    {
        $requete = $this->dao->prepare('INSERT INTO beneficesante SET idProduit = :idProduit, benefice1 = :benefice1, benefice2 = :benefice2, benefice3 = :benefice3, benefice4 = :benefice4, benefice5 = :benefice5, benefice6 = :benefice6');
        $requete->execute(array(
            'idProduit' => $beneficeSante->getIdProduit(),
            'benefice1' => urldecode($beneficeSante->getBenefice1()),
            'benefice2' => urldecode($beneficeSante->getBenefice2()),
            'benefice3' => urldecode($beneficeSante->getBenefice3()),
            'benefice4' => urldecode($beneficeSante->getBenefice4()),
            'benefice5' => urldecode($beneficeSante->getBenefice5()),
            'benefice6' => urldecode($beneficeSante->getBenefice6())
        ));

        $requete = $this->dao->prepare('SELECT idBeneficeSante FROM beneficesante WHERE idProduit = :idProduit');
        $requete->execute(array(
            'idProduit' => $beneficeSante->getIdProduit()
        ));
        $idBeneficeSante = $requete->fetch();

        $requete = $this->dao->prepare('UPDATE produit SET idBeneficeSante = :idBeneficeSante WHERE idProduit = :idProduit');
        $requete->execute(array(
            'idBeneficeSante' => $idBeneficeSante['idBeneficeSante'],
            'idProduit' => $beneficeSante->getIdProduit()
        ));
    }
}