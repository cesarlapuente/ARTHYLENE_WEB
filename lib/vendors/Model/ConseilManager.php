<?php

namespace Model;


use ArthyleneFramework\Manager;
use Entity\Conseil;

abstract class ConseilManager extends Manager
{
    /**
     * Méthode retournant une fiche conseil précise.
     * @param $id int L'identifiant du conseil à récupérer
     * @return Conseil La fiche conseil demandée
     */
    abstract public function getUnique($id);

    abstract public function GetAll();

    abstract public function deleteUnique($id);

    public function save(Conseil $conseil)
    {
        $this->add($conseil);
    }
    abstract protected function add(Conseil $conseil);
}