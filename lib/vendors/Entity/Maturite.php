<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 30/05/2017
 * Time: 12:10
 */

namespace Entity;


use ArthyleneFramework\Entity;

class Maturite extends Entity
{
    protected $idMaturite;
    protected $idProduit;
    protected $contenu;
    protected $idPhoto;
    protected $maturiteIdeale;
    protected $textePopup;

    protected $photo;
    protected $niveau;

    public function isValid()
    {
        return !(empty($this->contenu) || empty($this->textePopup));
    }

    public function isNew()
    {
        return empty($this->getIdMaturite());
    }

    /**
     * @return mixed
     */
    public function getIdMaturite()
    {
        return $this->idMaturite;
    }

    /**
     * @param mixed $idMaturite
     */
    public function setIdMaturite($idMaturite)
    {
        $this->idMaturite = $idMaturite;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
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
    public function getMaturiteIdeale()
    {
        return $this->maturiteIdeale;
    }

    /**
     * @param mixed $maturiteIdeale
     */
    public function setMaturiteIdeale($maturiteIdeale)
    {
        $this->maturiteIdeale = $maturiteIdeale;
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

    /**
     * @return mixed
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param mixed $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }


}