<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 05/07/2017
 * Time: 17:24
 */

namespace Model;


use Entity\Checklist;
use Entity\Photo;
use PDO;

class ChecklistManagerPDO extends CheklistManager
{

    /**
     * Méthode retournant un Checklist precis.
     * @param $id int L'identifiant de l'item à récupérer
     * @return Checklist L'item demandée
     */
    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT * FROM checklist WHERE id = :id');
        $requete->execute(array(
            'id' => $id
        ));
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Checklist');
        return $requete->fetch();
    }

    /**
     * Méthode permettant de supprimer un item.
     * @param $id int L'identifiant de l'item à supprimer
     * @return void
     */
    public function delete($id)
    {
        $requete = $this->dao->prepare('DELETE FROM checklist WHERE id = :id ');
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
        $requete = $this->dao->query('SELECT * FROM checklist');
        if ($items = $requete->fetchAll(PDO::FETCH_ASSOC)) {
            return $items;
        }

        return null;
    }

    /**
     * Méthode retournant une liste d'item demandée.
     * @return array La liste des items. Chaque entrée est une instance de Checklist.
     */
    public function getList()
    {
        $sql = 'SELECT * FROM checklist';

        $requete = $this->dao->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Checklist');

        $listeItems = $requete->fetchAll();

        $requete->closeCursor();

        return $listeItems;
    }

    /**
     * Méthode pour eviter les doublons
     * @return boolean
     */
    public function AlreadyIn(Checklist $item)
    {
        $requette = $this->dao->prepare('SELECT * FROM checklist WHERE titre = :titre ');
        $requette->execute(array(
            'titre' => $item->getTitre()
        ));

        if ($requette->fetch()) {
            return true;
        }

        return false;
    }

    /**
     * Méthode renvoyant le nombre d'etiquettes total.
     * @return int
     */
    public function count()
    {
        return $this->dao->query('SELECT COUNT(id) FROM checklist')->fetchColumn();
    }

    /**
     * Méthode permettant d'ajouter un item.
     * @return void
     */
    protected function add(Checklist $item, Photo $photo)
    {
        $idPhoto = -1;
        if (!$photo->isEmpty()) {
            $resPhoto = $this->dao->prepare('INSERT INTO photo SET photo = :photo, chemin = :chemin,
        namePhoto = :namep, typePhoto = :typep, sizePhoto = :sizep');
            $resPhoto->execute(array(
                'photo' => $photo->getPhoto(),
                'chemin' => $photo->getChemin(),
                'namep' => $photo->getName(),
                'typep' => $photo->getType(),
                'sizep' => $photo->getSize()
            ));
            $idPhoto = $this->dao->lastInsertId();
        }

        $requete = $this->dao->prepare('INSERT INTO checklist SET titre = :titre, contenu = :contenu,
        isImportant = :important, idPhoto = :photo');
        $requete->execute(array(
            'titre' => $item->getTitre(),
            'contenu' => $item->getContenu(),
            'important' => $item->getIsImportant(),
            'photo' => $idPhoto
        ));
    }

    /**
     * Méthode permettant de modifier un item.
     * @param $item Checklist le produit à modifier
     * @return void
     */
    protected function modify(Checklist $item, Photo $photo)
    {
        $idPhoto = $item->getIdPhoto();
        if (!$photo->isEmpty()) {
            $requette = $this->dao->prepare('SELECT * FROM photo WHERE idPhoto = :id ');
            $requette->execute(array(
                'id' => $photo->getIdPhoto()
            ));

            if ($requette->fetch()) {
                $resPhoto = $this->dao->prepare('UPDATE photo SET photo = :photo, chemin = :chemin,
                namePhoto = :namep, typePhoto = :typep, sizePhoto = :sizep WHERE idPhoto = :id');
                $resPhoto->execute(array(
                    'photo' => $photo->getPhoto(),
                    'chemin' => $photo->getChemin(),
                    'namep' => $photo->getName(),
                    'typep' => $photo->getType(),
                    'sizep' => $photo->getSize(),
                    'id' => $photo->getIdPhoto()
                ));
            } else {
                $resPhoto = $this->dao->prepare('INSERT INTO photo SET photo = :photo, chemin = :chemin,
                namePhoto = :namep, typePhoto = :typep, sizePhoto = :sizep');
                $resPhoto->execute(array(
                    'photo' => $photo->getPhoto(),
                    'chemin' => $photo->getChemin(),
                    'namep' => $photo->getName(),
                    'typep' => $photo->getType(),
                    'sizep' => $photo->getSize()
                ));
                $idPhoto = $this->dao->lastInsertId();
            }
        }
        $requete = $this->dao->prepare('UPDATE checklist SET titre = :titre, contenu = :contenu,
        isImportant = :important, idPhoto = :photo WHERE id = :id');
        $requete->execute(array(
            'titre' => $item->getTitre(),
            'contenu' => $item->getContenu(),
            'important' => $item->getisImportant(),
            'photo' => $idPhoto,
            'id' => $item->getId()
        ));
    }
}