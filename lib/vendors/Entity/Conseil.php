<?php

namespace Entity;


use ArthyleneFramework\Entity;

class Conseil extends Entity
{
    protected $idConseil;
    protected $idProduit;
    protected $conseil1;
    protected $conseil2;
    protected $conseil3;
    protected $conseil4;
    protected $conseil5;
    protected $conseil6;

      

    public function isValid()
    {
        return !(empty($this->idConseil));
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
    public function getIdConseil()
    {
        return $this->idConseil;
    }

    /**
     * @param mixed $idConseil
     */
    public function setIdConseil($idConseil)
    {
        $this->idConseil = $idConseil;
    }

    /**
     * @return mixed
     */
    public function getConseil1()
    {
        return $this->conseil1;
    }

    /**
     * @param mixed $conseil1
     */
    public function setConseil1($conseil1)
    {
        $this->conseil1 = $conseil1;
    }

    /**
     * @return mixed
     */
    public function getConseil2()
    {
        return $this->conseil2;
    }

    /**
     * @param mixed $conseil2
     */
    public function setConseil2($conseil2)
    {
        $this->conseil2 = $conseil2;
    }

    /**
     * @return mixed
     */
    public function getConseil3()
    {
        return $this->conseil3;
    }

    /**
     * @param mixed $conseil3
     */
    public function setConseil3($conseil3)
    {
        $this->conseil3 = $conseil3;
    }

    /**
     * @return mixed $conseil4
     */
    public function getConseil4()
    {
        return $this->conseil4;
    }

    /**
     * @param mixed $conseil4
     */
    public function setConseil4($conseil4)
    {
        $this->conseil4 = $conseil4;
    }

        /**
     * @return mixed $conseil5
     */
    public function getConseil5()
    {
        return $this->conseil5;
    }

    /**
     * @param mixed $conseil5
     */
    public function setConseil5($conseil5)
    {
        $this->conseil5 = $conseil5;
    }

        /**
     * @return mixed $conseil6
     */
    public function getConseil6()
    {
        return $this->conseil6;
    }

    /**
     * @param mixed $conseil6
     */
    public function setConseil6($conseil6)
    {
        $this->conseil6 = $conseil6;
    }
}