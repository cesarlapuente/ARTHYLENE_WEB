<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 01/06/2017
 * Time: 16:55
 */

namespace Model;


use Entity\Presentation;
use PDO;

class PresentationManagerPDO extends PresentationManager
{

    /**
     * Méthode retournant une fiche Presentation précise.
     * @param $id int L'identifiant de la presentation à récupérer
     * @return Presentation La fiche maturite demandée
     */
    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT idPresentation, idProduit, contenu, idPhoto FROM presentation WHERE idPresentation = :id');
        $requete->execute(array(
            'id' => $id
        ));

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Presentation');
        if ($presentation = $requete->fetch()) {
            /*if ($maturite->getIdPhoto() != NULL) {
                $reqPhoto = $this->dao->prepare('SELECT Photo FROM photo WHERE idPhoto = :id');
                $requete->bindValue(':id', $maturite->getIdPhoto());
                $requete->execute();
                $maturite->setPhoto($reqPhoto->fetch());
            }*/
            return $presentation;
        }
    }

    public function GetAll()
    {
        $requete = $this->dao->query('SELECT * FROM presentation');
        if ($presentation = $requete->fetchAll(PDO::FETCH_ASSOC)) {
            return $presentation;
        }

        return null;
    }
}