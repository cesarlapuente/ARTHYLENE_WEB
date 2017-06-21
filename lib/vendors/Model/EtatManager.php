<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 30/05/2017
 * Time: 17:57
 */

namespace Model;

use ArthyleneFramework\Manager;
use Entity\Etat;
use Entity\Photo;
use Entity\Produit;

abstract class EtatManager extends Manager
{
    /**
     * Méthode retournant une fiche etat précis.
     * @param $id int L'identifiant de la fiche à récupérer
     * @return Etat La fiche etat demandée
     */
    abstract public function getUnique($id);

    /**
     * Méthode permettant d'enregistrer une fiche.
     * @param
     * @return void
     */
    public function save(Etat $etat, Produit $produit, Photo $photo)
    {
        if ($etat->isValid()) {
            $etat->isNew() ? $this->add($etat, $produit, $photo) : $this->modify($etat, $produit, $photo);
        } else {
            throw new \RuntimeException('La news doit être validée pour être enregistrée');
        }
    }

    /**
     * Méthode permettant d'ajouter une fiche.
     * @return void
     */
    abstract protected function add(Etat $etat, Produit $produit, Photo $photo);

    /**
     * Méthode permettant de modifier un produit.
     * @param $etat Etat le produit à modifier
     * @return void
     */
    abstract protected function modify(Etat $etat, Produit $produit, Photo $photo);

    /**
     * Méthode permettant de supprimer un produit.
     * @param $id int L'identifiant du produit à supprimer
     * @return void
     */
    abstract public function delete($id);

    abstract public function GetAll();
}