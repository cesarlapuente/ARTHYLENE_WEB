<?php

namespace Model;


use ArthyleneFramework\Manager;
use Entity\BeneficeSante;

abstract class BeneficeSanteManager extends Manager
{
    /**
     * Méthode retournant une fiche beneficeSanté précise.
     * @param $id int L'identifiant du benefice à récupérer
     * @return benefice La fiche conseil demandée
     */
    abstract public function getUnique($id);

    abstract public function GetAll();

    abstract public function deleteUnique($id);

    public function save(BeneficeSante $beneficeSante)
    {
        $this->add($beneficeSante);
    }
    abstract protected function add(BeneficeSante $beneficeSante);
}