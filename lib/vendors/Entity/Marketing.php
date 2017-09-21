<?php

namespace Entity;


use ArthyleneFramework\Entity;

class Marketing extends Entity
{
    protected $idMarketing;
    protected $idProduit;
    protected $marketing1;
    protected $marketing2;
      

    public function isValid()
    {
        return !(empty($this->idMarketing));
    }

    public function getIdProduit()
    {
        return $this->idProduit;
    }

    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;
    }

    /**
     * @return mixed
     */
    public function getIdMarketing()
    {
        return $this->idMarketing;
    }

    /**
     * @param mixed $idMarketing
     */
    public function setIdMarketing($idMarketing)
    {
        $this->idMarketing = $idMarketing;
    }

    /**
     * @return mixed
     */
    public function getMarketing1()
    {
        return $this->marketing1;
    }

    /**
     * @param mixed $marketing1
     */
    public function setMarketing1($marketing1)
    {
        $this->marketing1 = $marketing1;
    }

    /**
     * @return mixed
     */
    public function getMarketing2()
    {
        return $this->marketing2;
    }

    /**
     * @param mixed $marketing2
     */
    public function setMarketing2($marketing2)
    {
        $this->marketing2 = $marketing2;
    }
}