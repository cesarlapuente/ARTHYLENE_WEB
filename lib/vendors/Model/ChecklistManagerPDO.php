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
     * Méthode permettant d'ajouter un item.
     * @return void
     */
    protected function add(Checklist $item, Photo $photo)
    {
        $requete = $this->dao->prepare('INSERT INTO checklist SET titre = :titre, contenu = :contenu,
        isImportant = :important, idPhoto = :photo');
        $requete->execute(array(
            'titre' => $item->getTitle(),
            'contenu' => $item->getContent(),
            'important' => $item->getisImportant(),
            'photo' => $item->getIdPhoto()
        ));
    }

    /**
     * Méthode permettant de modifier un item.
     * @param $item Checklist le produit à modifier
     * @return void
     */
    protected function modify(Checklist $item, Photo $photo)
    {
        $requete = $this->dao->prepare('UPDATE checklist SET titre = :titre, contenu = :contenu,
        isImportant = :important, idPhoto = :photo');
        $requete->execute(array(
            'titre' => $item->getTitle(),
            'contenu' => $item->getContent(),
            'important' => $item->getisImportant(),
            'photo' => $item->getIdPhoto()
        ));
    }
}