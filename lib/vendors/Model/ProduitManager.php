<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 29/05/2017
 * Time: 10:44
 */

namespace Model;

use ArthyleneFramework\Manager;
use Entity\Photo;
use Entity\Presentation;
use Entity\Produit;


abstract class ProduitManager extends Manager
{
    /**
     * Méthode retournant une liste de produit demandée.
     * @return array La liste des news. Chaque entrée est une instance de News.
     */
    abstract public function getList();

    /**
     * Méthode retournant un produit précise.
     * @param $id int L'identifiant de la news à récupérer
     * @return Produit La news demandée
     */
    abstract public function getUnique($id);


    abstract public function getUniqueId($id);

    /**
     * Méthode renvoyant le nombre de produit total.
     * @return int
     */
    abstract public function count();

    /**
     * Méthode permettant d'enregistrer une news.
     * @param $news Produit la news à enregistrer
     * @see self::add()
     * @see self::modify()
     * @return void
     */
    public function save(Produit $produit, Presentation $presentation, Photo $photo)
    {
        if ($produit->isValid() && $presentation->isValid()) {
            $produit->isNew() ? $this->add($produit, $presentation, $photo) : $this->modify($produit, $presentation, $photo);
        } else {
            throw new \RuntimeException('La news doit être validée pour être enregistrée');
        }
    }

    /**
     * Méthode permettant d'ajouter une news.
     * @param $news News La news à ajouter
     * @return void
     */
    abstract protected function add(Produit $produit, Presentation $presentation, Photo $photo);

    /**
     * Méthode permettant de modifier un produit.
     * @param $produit Produit le produit à modifier
     * @return void
     */
    abstract protected function modify(Produit $produit, Presentation $presentation, Photo $photo);

    /**
     * Méthode permettant de supprimer un produit.
     * @param $id int L'identifiant du produit à supprimer
     * @return void
     */
    abstract public function delete($id);

    abstract public function deleteUnique($id);
}