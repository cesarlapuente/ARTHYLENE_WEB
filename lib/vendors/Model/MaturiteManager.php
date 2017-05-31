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

abstract class MaturiteManager extends Manager
{
    /**
     * Méthode retournant une fiche Maturite précise.
     * @param $id int L'identifiant de la news à récupérer
     * @return Maturite La fiche maturite demandée
     */
    abstract public function getUnique($id);
}