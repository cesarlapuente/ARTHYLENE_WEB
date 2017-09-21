<?php

namespace Model;


use Entity\Conseil;
use PDO;

class ConseilManagerPDO extends ConseilManager
{

    /**
     * Méthode retournant une fiche conseil précise.
     * @param $id int L'identifiant du conseil à récupérer
     * @return conseil La fiche maturite demandée
     */
    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT * FROM conseil WHERE idConseil = :id');
        $requete->execute(array(
            'id' => $id
        ));

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Conseil');
        if ($conseil = $requete->fetch()) {
            return $conseil;
        }
    }

    public function GetAll()
    {
        $requete = $this->dao->query('SELECT * FROM conseil');
        if ($conseil = $requete->fetchAll(PDO::FETCH_ASSOC)) {
            return $conseil;
        }
        return null;
    }

    public function deleteUnique($id)
    {
        $requete = $this->dao->prepare('DELETE FROM conseil WHERE idConseil = :id');
        $requete->execute(array(
            'id' => $id
        ));
    }

    protected function add(Conseil $conseil)
    {
        $requete = $this->dao->prepare('INSERT INTO conseil SET idProduit = :idProduit, conseil1 = :conseil1, conseil2 = :conseil2, conseil3 = :conseil3, conseil4 = :conseil4, conseil5 = :conseil5, conseil6 = :conseil6');
        $requete->execute(array(
            'idProduit' => $conseil->getIdProduit(),
            'conseil1' => urldecode($conseil->getConseil1()),
            'conseil2' => urldecode($conseil->getConseil2()),
            'conseil3' => urldecode($conseil->getConseil3()),
            'conseil4' => urldecode($conseil->getConseil4()),
            'conseil5' => urldecode($conseil->getConseil5()),
            'conseil6' => urldecode($conseil->getConseil6())
        ));

        $requete = $this->dao->prepare('SELECT idConseil FROM conseil WHERE idProduit = :idProduit');
        $requete->execute(array(
            'idProduit' => $conseil->getIdProduit()
        ));
        $idConseil = $requete->fetch();

        $requete = $this->dao->prepare('UPDATE produit SET idConseil = :idConseil WHERE idProduit = :idProduit');
        $requete->execute(array(
            'idConseil' => $idConseil['idConseil'],
            'idProduit' => $conseil->getIdProduit()
        ));
    }
}