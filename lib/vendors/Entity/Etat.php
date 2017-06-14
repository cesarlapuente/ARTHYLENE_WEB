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

    const POPUP_INVALIDE = 2;
    const CONTENU_INVALIDE = 3;

    protected $idEtat;
    protected $idProduit;
    protected $contenu;
    protected $idPhoto;
    protected $textePopup;

    protected $niveau;
    protected $photo;

    public function isValid()
    {
        return empty($this->erreurs());
    }

    public function isNew()
    {
        return empty($this->getIdEtat());
    }

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
        /*if (empty($contenu)) {
            $this->erreurs[] = self::CONTENU_INVALIDE;
        }*/
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
        /*if (empty($textePopup)) {
            $this->erreurs[] = self::POPUP_INVALIDE;
        }*/
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

}