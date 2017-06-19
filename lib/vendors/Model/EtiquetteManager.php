<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 19/06/2017
 * Time: 10:37
 */

namespace Model;


use ArthyleneFramework\Manager;
use Entity\Etiquette;
use Entity\Photo;

abstract class EtiquetteManager extends Manager
{

    /**
     * Méthode retournant une liste d'etiquette demandée.
     * @return array La liste des etiquettes. Chaque entrée est une instance de Etiquette.
     */
    abstract public function getList();

    /**
     * Méthode renvoyant le nombre d'etiquettes total.
     * @return int
     */
    abstract public function count();

    /**
     * Méthode retournant une etiquette précise.
     * @param $id int L'identifiant de l'etiquette à récupérer
     * @return Etiquette L'etiquette demandée
     */
    abstract public function getUnique($id);

    /**
     * Méthode permettant d'enregistrer une etiquette.
     * @param
     * @return void
     */
    public function save(Etiquette $etiquete, Photo $photo)
    {
        if ($etiquete->isValid()) {
            $etiquete->isNew() ? $this->add($etiquete, $photo) : $this->modify($etiquete, $photo);
        } else {
            throw new \RuntimeException('La news doit être validée pour être enregistrée');
        }
    }

    /**
     * Méthode permettant d'ajouter une etiquette.
     * @return void
     */
    abstract protected function add(Etiquette $etiquette, Photo $photo);

    /**
     * Méthode permettant de modifier une etiquette.
     * @param $etiquette Etiquette l'etiquette à modifier
     * @return void
     */
    abstract protected function modify(Etiquette $etiquette, Photo $photo);

    /**
     * Méthode permettant de supprimer une etiquette.
     * @param $id int L'identifiant de l'etiquette à supprimer
     * @return void
     */
    abstract public function delete($id);
}