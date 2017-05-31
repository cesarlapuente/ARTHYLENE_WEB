<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 29/05/2017
 * Time: 10:44
 */

namespace Model;

use ArthyleneFramework\Manager;
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
}