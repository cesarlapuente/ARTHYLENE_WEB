<?php

namespace Entity;


use ArthyleneFramework\Entity;

class Caracteristique extends Entity
{
    protected $idCaracteristique;
    protected $idProduit;
    protected $famille;
    protected $espece;
    protected $origine;
    protected $forme;
    protected $taillePoids;
    protected $couleurTexture;
    protected $saveur;
    protected $principauxProducteurs;
                   

    public function isValid()
    {
        return !(empty($this->contenu));
    }

    /**
     * @return mixed
     */
    public function getIdCaracteristique()
    {
        return $this->idCaracteristique;
    }

    /**
     * @param mixed $idCaracteristique
     */
    public function setIdCaracteristique($idCaracteristique)
    {
        $this->idCaracteristique = $idCaracteristique;
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
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * @param mixed $famille
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;
    }

    /**
     * @return mixed
     */
    public function getEspece()
    {
        return $this->espece;
    }

    /**
     * @param mixed $espece
     */
    public function setEspece($espece)
    {
        $this->espece = $espece;
    }

    /**
     * @return mixed
     */
    public function getOrigine()
    {
        return $this->origine;
    }

    /**
     * @param mixed $origine
     */
    public function setOrigine($origine)
    {
        $this->origine = $origine;
    }

    /**
     * @return mixed $forme
     */
    public function getForme()
    {
        return $this->forme;
    }

    /**
     * @param mixed $forme
     */
    public function setForme($forme)
    {
        $this->forme = $forme;
    }

        /**
     * @return mixed $taillePoids
     */
    public function getTaillePoids()
    {
        return $this->taillePoids;
    }

    /**
     * @param mixed $taillePoids
     */
    public function setTaillePoids($taillePoids)
    {
        $this->taillePoids = $taillePoids;
    }

        /**
     * @return mixed $saveur
     */
    public function getSaveur()
    {
        return $this->saveur;
    }

    /**
     * @param mixed $saveur
     */
    public function setSaveur($saveur)
    {
        $this->saveur = $saveur;
    }

        /**
     * @return mixed $couleurTexture
     */
    public function getCouleurTexture()
    {
        return $this->couleurTexture;
    }

    /**
     * @param mixed $couleurTexture
     */
    public function setCouleurTexture($couleurTexture)
    {
        $this->couleurTexture = $couleurTexture;
    }

        /**
     * @return mixed $principauxProducteurs
     */
    public function getPrincipauxProducteurs()
    {
        return $this->principauxProducteurs;
    }

    /**
     * @param mixed $principauxProducteurs
     */
    public function setPrincipauxProducteurs($principauxProducteurs)
    {
        $this->principauxProducteurs = $principauxProducteurs;
    }
}