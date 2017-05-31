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

abstract class EtatManager extends Manager
{
    /**
     * Méthode retournant une fiche etat précis.
     * @param $id int L'identifiant de la news à récupérer
     * @return Etat La fiche etat demandée
     */
    abstract public function getUnique($id);
}