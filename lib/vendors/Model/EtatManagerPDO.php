<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 31/05/2017
 * Time: 11:53
 */

namespace Model;


use Entity\Etat;

class EtatManagerPDO extends EtatManager
{

    /**
     * Méthode retournant une fiche etat précis.
     * @param $id int L'identifiant de la news à récupérer
     * @return Etat La fiche etat demandée
     */
    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT idEtat, contenu, idPhoto, textePopup 
        FROM etat WHERE idEtat = :id');
        $requete->bindValue(':id', $id);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Etat');
        if ($etat = $requete->fetch()) {
            if ($etat->getIdPhoto() != NULL) {
                $reqPhoto = $this->dao->prepare('SELECT Photo FROM photo WHERE idPhoto = :id');
                $requete->bindValue(':id', $etat->getIdPhoto());
                $requete->execute();
                $etat->setPhoto($reqPhoto->fetch());
            }
            return $etat;
        }
    }
}