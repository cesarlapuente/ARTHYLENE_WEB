<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 30/05/2017
 * Time: 17:57
 */

namespace Model;

use ArthyleneFramework\Manager;
use Entity\Maturite;
use Entity\Photo;
use Entity\Produit;

abstract class MaturiteManager extends Manager
{
    /**
     * Méthode retournant une fiche Maturite précise.
     * @param $id int L'identifiant de la news à récupérer
     * @return Maturite La fiche maturite demandée
     */
    abstract public function getUnique($id);

    /**
     * Méthode permettant d'enregistrer une news.
     * @param $news Produit la news à enregistrer
     * @see self::add()
     * @see self::modify()
     * @return void
     */
    public function save(Maturite $maturite, Produit $produit, Photo $photo)
    {
        if ($maturite->isValid()) {
            $maturite->isNew() ? $this->add($maturite, $produit, $photo) : $this->modify($maturite, $produit, $photo);
        } else {
            throw new \RuntimeException('La news doit être validée pour être enregistrée');
        }
    }

    /**
     * Méthode permettant d'ajouter une news.
     * @param $maturite Produit La maturite à ajouter
     * @return void
     */
    abstract protected function add(Maturite $maturite, Produit $produit, Photo $photo);

    /**
     * Méthode permettant de modifier un produit.
     * @param $maturite Maturite le produit à modifier
     * @return void
     */
    abstract protected function modify(Maturite $maturite, Produit $produit, Photo $photo);

    /**
     * Méthode permettant de supprimer un produit.
     * @param $id int L'identifiant du produit à supprimer
     * @return void
     */
    abstract public function delete($id);
}