<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 19/06/2017
 * Time: 10:29
 */

namespace Entity;


use ArthyleneFramework\Entity;

class Etiquette extends Entity
{

    protected $idEtiquette;
    protected $code;
    protected $idCagette;
    protected $idPhoto;
    protected $nomProduit;
    protected $varieteProduit;
    protected $ordreEte;
    protected $ordreAutomne;
    protected $ordreHiver;
    protected $ordrePrintemps;
    protected $nombreDeCouche;
    protected $maturiteMin;
    protected $maturiteMax;
    protected $emplacementChariot;


    public function isValid()
    {
        return empty($this->erreurs());
    }

    public function isNew()
    {
        return empty($this->getIdEtiquette());
    }

    /**
     * @return mixed
     */
    public function getIdEtiquette()
    {
        return $this->idEtiquette;
    }

    /**
     * @param mixed $idEtiquette
     */
    public function setIdEtiquette($idEtiquette)
    {
        $this->idEtiquette = $idEtiquette;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getIdCagette()
    {
        return $this->idCagette;
    }

    /**
     * @param mixed $idCagette
     */
    public function setIdCagette($idCagette)
    {
        $this->idCagette = $idCagette;
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
    public function getNomProduit()
    {
        return $this->nomProduit;
    }

    /**
     * @param mixed $nomProduit
     */
    public function setNomProduit($nomProduit)
    {
        $this->nomProduit = $nomProduit;
    }

    /**
     * @return mixed
     */
    public function getVarieteProduit()
    {
        return $this->varieteProduit;
    }

    /**
     * @param mixed $varieteProduit
     */
    public function setVarieteProduit($varieteProduit)
    {
        $this->varieteProduit = $varieteProduit;
    }

    /**
     * @return mixed
     */
    public function getOrdreEte()
    {
        return $this->ordreEte;
    }

    /**
     * @param mixed $ordreEte
     */
    public function setOrdreEte($ordreEte)
    {
        $this->ordreEte = $ordreEte;
    }

    /**
     * @return mixed
     */
    public function getOrdreAutomne()
    {
        return $this->ordreAutomne;
    }

    /**
     * @param mixed $ordreAutomne
     */
    public function setOrdreAutomne($ordreAutomne)
    {
        $this->ordreAutomne = $ordreAutomne;
    }

    /**
     * @return mixed
     */
    public function getOrdreHiver()
    {
        return $this->ordreHiver;
    }

    /**
     * @param mixed $ordreHiver
     */
    public function setOrdreHiver($ordreHiver)
    {
        $this->ordreHiver = $ordreHiver;
    }

    /**
     * @return mixed
     */
    public function getOrdrePrintemps()
    {
        return $this->ordrePrintemps;
    }

    /**
     * @param mixed $ordrePrintemps
     */
    public function setOrdrePrintemps($ordrePrintemps)
    {
        $this->ordrePrintemps = $ordrePrintemps;
    }

    /**
     * @return mixed
     */
    public function getNombreDeCouche()
    {
        return $this->nombreDeCouche;
    }

    /**
     * @param mixed $nombreDeCouche
     */
    public function setNombreDeCouche($nombreDeCouche)
    {
        $this->nombreDeCouche = $nombreDeCouche;
    }

    /**
     * @return mixed
     */
    public function getMaturiteMin()
    {
        return $this->maturiteMin;
    }

    /**
     * @param mixed $maturiteMin
     */
    public function setMaturiteMin($maturiteMin)
    {
        $this->maturiteMin = $maturiteMin;
    }

    /**
     * @return mixed
     */
    public function getMaturiteMax()
    {
        return $this->maturiteMax;
    }

    /**
     * @param mixed $maturiteMax
     */
    public function setMaturiteMax($maturiteMax)
    {
        $this->maturiteMax = $maturiteMax;
    }

    /**
     * @return mixed
     */
    public function getEmplacementChariot()
    {
        return $this->emplacementChariot;
    }

    /**
     * @param mixed $emplacementChariot
     */
    public function setEmplacementChariot($emplacementChariot)
    {
        $this->emplacementChariot = $emplacementChariot;
    }


}