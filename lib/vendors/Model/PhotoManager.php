<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 30/05/2017
 * Time: 17:57
 */

namespace Model;

use ArthyleneFramework\Manager;
use Entity\Photo;

abstract class PhotoManager extends Manager
{
    /**
     * Méthode retournant une photo précis.
     * @param $id int L'identifiant de la photo à récupérer
     * @return Photo La photo etat demandée
     */
    abstract public function getUnique($id);

    /**
     * Méthode permettant d'enregistrer une photo.
     * @param
     * @return void
     */
    public function save(Photo $photo)
    {
        if ($photo->isValid()) {
            $photo->isNew() ? $this->add($photo) : $this->modify($photo);
        } else {
            throw new \RuntimeException('La news doit être validée pour être enregistrée');
        }
    }

    /**
     * Méthode permettant d'ajouter une photo.
     * @return void
     */
    abstract protected function add(Photo $photo);

    /**
     * Méthode permettant de modifier une photo.
     * @param $photo Photo la photo à modifier
     * @return void
     */
    abstract protected function modify(Photo $photo);

    /**
     * Méthode permettant de supprimer une photo.
     * @param $id int L'identifiant de la photo à supprimer
     * @return void
     */
    abstract public function delete($id);

    /**
     * Methode for api
     * @return mixed
     */
    abstract public function GetAll();
}