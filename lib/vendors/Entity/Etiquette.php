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
    const MIN = 0;
    const NOM_PRODUIT_EMPTY = 6;
    const VARIETE_PRODUIT_EMPTY = 1;
    const CODE_EMPTY = 2;
    const MATURITE_MAX_EMPTY = 3;
    const MATURITE_MIN_EMPTY = 4;
    const EMPLACEMENT_EMPTY = 5;

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
        if (empty($code)) {
            $this->erreurs[] = self::CODE_EMPTY;
        }
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
        if (empty($nomProduit)) {
            $this->erreurs[] = self::NOM_PRODUIT_EMPTY;
        }
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
        if (empty($varieteProduit)) {
            $this->erreurs[] = self::VARIETE_PRODUIT_EMPTY;
        }
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
        if (empty($maturiteMin)) {
            $this->erreurs[] = self::MATURITE_MIN_EMPTY;
        }
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
        if (empty($maturiteMax)) {
            $this->erreurs[] = self::MATURITE_MAX_EMPTY;
        }
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
        if (empty($emplacementChariot)) {
            $this->erreurs[] = self::EMPLACEMENT_EMPTY;
        }
        $this->emplacementChariot = $emplacementChariot;
    }


}