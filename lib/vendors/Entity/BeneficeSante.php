<?php

namespace Entity;


use ArthyleneFramework\Entity;

class BeneficeSante extends Entity
{
    protected $idBeneficeSante;
    protected $idProduit;
    protected $benefice1;
    protected $benefice2;
    protected $benefice3;
    protected $benefice4;
    protected $benefice5;
    protected $benefice6;

      

    public function isValid()
    {
        return !(empty($this->idBeneficeSante));
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
    public function getIdBeneficeSante()
    {
        return $this->idBeneficeSante;
    }

    /**
     * @param mixed $idBeneficeSante
     */
    public function setIdBeneficeSante($idBeneficeSante)
    {
        $this->idBeneficeSante = $idBeneficeSante;
    }

    /**
     * @return mixed
     */
    public function getBenefice1()
    {
        return $this->benefice1;
    }

    /**
     * @param mixed $benefice1
     */
    public function setBenefice1($benefice1)
    {
        $this->benefice1 = $benefice1;
    }

    /**
     * @return mixed
     */
    public function getBenefice2()
    {
        return $this->benefice2;
    }

    /**
     * @param mixed $benefice2
     */
    public function setBenefice2($benefice2)
    {
        $this->benefice2 = $benefice2;
    }

    /**
     * @return mixed
     */
    public function getBenefice3()
    {
        return $this->benefice3;
    }

    /**
     * @param mixed $benefice3
     */
    public function setBenefice3($benefice3)
    {
        $this->benefice3 = $benefice3;
    }

    /**
     * @return mixed $benefice4
     */
    public function getBenefice4()
    {
        return $this->benefice4;
    }

    /**
     * @param mixed $benefice4
     */
    public function setBenefice4($benefice4)
    {
        $this->benefice4 = $benefice4;
    }

        /**
     * @return mixed $benefice5
     */
    public function getBenefice5()
    {
        return $this->benefice5;
    }

    /**
     * @param mixed $benefice5
     */
    public function setBenefice5($benefice5)
    {
        $this->benefice5 = $benefice5;
    }

        /**
     * @return mixed $benefice6
     */
    public function getBenefice6()
    {
        return $this->benefice6;
    }

    /**
     * @param mixed $benefice6
     */
    public function setBenefice6($benefice6)
    {
        $this->benefice6 = $benefice6;
    }
}