<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 30/05/2017
 * Time: 16:43
 */

namespace Entity;


use ArthyleneFramework\Entity;

class Etat extends Entity
{
    protected $idEtat;
    protected $idProduit;
    protected $contenu;
    protected $idPhoto;
    protected $textePopup;

    /**
     * @return mixed
     */
    public function getIdEtat()
    {
        return $this->idEtat;
    }

    /**
     * @param mixed $idEtat
     */
    public function setIdEtat($idEtat)
    {
        $this->idEtat = $idEtat;
    }

    /**
     * @return mixed
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * @param mixed $idProduit
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getIdPhoto()
    {
        return $this->idPhoto;
    }

    /**
     * @param mixed $idPhoto
     */
    public function setIdPhoto($idPhoto)
    {
        $this->idPhoto = $idPhoto;
    }

    /**
     * @return mixed
     */
    public function getTextePopup()
    {
        return $this->textePopup;
    }

    /**
     * @param mixed $textePopup
     */
    public function setTextePopup($textePopup)
    {
        $this->textePopup = $textePopup;
    }

}