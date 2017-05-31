<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 30/05/2017
 * Time: 18:03
 */

namespace Model;


use Entity\Maturite;

class MaturiteManagerPDO extends MaturiteManager
{

    /**
     * Méthode retournant une fiche Maturite précise.
     * @param $id int L'identifiant de la news à récupérer
     * @return Maturite La fiche maturite demandée
     */
    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT idMaturite, contenu, idPhoto, maturiteIdeale, textePopup 
        FROM maturite WHERE idMaturite = :id');
        $requete->bindValue(':id', $id);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Maturite');
        if ($maturite = $requete->fetch()) {
            if ($maturite->getIdPhoto() != NULL) {
                $reqPhoto = $this->dao->prepare('SELECT Photo FROM photo WHERE idPhoto = :id');
                $requete->bindValue(':id', $maturite->getIdPhoto());
                $requete->execute();
                $maturite->setPhoto($reqPhoto->fetch());
            }
            return $maturite;
        }
    }
}