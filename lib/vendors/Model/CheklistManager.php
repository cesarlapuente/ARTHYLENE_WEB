<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 05/07/2017
 * Time: 17:17
 */

namespace Model;


use ArthyleneFramework\Manager;
use Entity\Checklist;
use Entity\Photo;

abstract class CheklistManager extends Manager
{

    /**
     * Méthode retournant une liste d'item demandée.
     * @return array La liste des items. Chaque entrée est une instance de Checklist.
     */
    abstract public function getList();

    /**
     * Méthode retournant un Checklist precis.
     * @param $id int L'identifiant de l'item à récupérer
     * @return Checklist L'item demandée
     */
    abstract public function getUnique($id);

    /**
     * Méthode permettant d'enregistrer un item.
     * @param
     * @return void
     */
    public function save(Checklist $item, Photo $photo)
    {
        if ($item->isValid()) {
            $item->isNew() ? $this->add($item, $photo) : $this->modify($item, $photo);
        } else {
            throw new \RuntimeException('L\'item doit être validé pour être enregistré');
        }
    }

    /**
     * Méthode permettant d'ajouter un item.
     * @return void
     */
    abstract protected function add(Checklist $item, Photo $photo);

    /**
     * Méthode permettant de modifier un item.
     * @param $item Checklist le produit à modifier
     * @return void
     */
    abstract protected function modify(Checklist $item, Photo $photo);

    /**
     * Méthode permettant de supprimer un item.
     * @param $id int L'identifiant de l'item à supprimer
     * @return void
     */
    abstract public function delete($id);

    /**
     * Methode for api
     * @return mixed
     */
    abstract public function GetAll();

    /**
     * Méthode pour eviter les doublons
     * @return boolean
     */
    abstract public function AlreadyIn(Checklist $item);

}