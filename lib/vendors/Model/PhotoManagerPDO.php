<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 07/07/2017
 * Time: 18:14
 */

namespace Model;


use Entity\Photo;
use PDO;

class PhotoManagerPDO extends PhotoManager
{

    /**
     * Méthode retournant une photo précis.
     * @param $id int L'identifiant de la photo à récupérer
     * @return Photo La photo etat demandée
     */
    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT * FROM photo WHERE idPhoto = :id');
        $requete->execute(array(
            'id' => $id
        ));
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Photo');
        return $requete->fetch();
    }

    /**
     * Méthode permettant de supprimer une photo.
     * @param $id int L'identifiant de la photo à supprimer
     * @return void
     */
    public function delete($id)
    {
        $requete = $this->dao->prepare('DELETE FROM photo WHERE idPhoto = :id ');
        $requete->execute(array(
            'id' => $id
        ));
    }

    /**
     * Methode for api
     * @return mixed
     */
    public function GetAll()
    {
        $requete = $this->dao->query('SELECT * FROM photo');
        if ($items = $requete->fetchAll(PDO::FETCH_ASSOC)) {
            return $items;
        }

        return null;
    }

    /**
     * Méthode permettant d'ajouter une photo.
     * @return void
     */
    protected function add(Photo $photo)
    {
        $requete = $this->dao->prepare('INSERT INTO photo SET photo = :photo');
        $requete->execute(array(
            'photo' => $photo->getPhoto()
        ));
    }

    /**
     * Méthode permettant de modifier une photo.
     * @param $photo Photo la photo à modifier
     * @return void
     */
    protected function modify(Photo $photo)
    {
        $requete = $this->dao->prepare('UPDATE photo SET iphoto = :photo WHERE idPhoto = =:id');
        $requete->execute(array(
            'photo' => $photo->getPhoto(),
            'id' => $photo->getIdPhoto()
        ));
    }
}