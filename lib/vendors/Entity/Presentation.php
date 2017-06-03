<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 31/05/2017
 * Time: 11:27
 */

namespace Entity;


use ArthyleneFramework\Entity;

class Presentation extends Entity
{
    const CONTENU_EMPTY = 1;
    protected $idPresentation;
    protected $idProduit;
    protected $contenu;
    protected $idPhoto;

    public function isValid()
    {
        return !(empty($this->contenu));
    }

    /**
     * @return mixed
     */
    public function getIdPresentation()
    {
        return $this->idPresentation;
    }

    /**
     * @param mixed $idPresentation
     */
    public function setIdPresentation($idPresentation)
    {
        $this->idPresentation = $idPresentation;
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
        if (empty($contenu)) {
            $this->erreurs[] = self::CONTENU_EMPTY;
        }
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

}