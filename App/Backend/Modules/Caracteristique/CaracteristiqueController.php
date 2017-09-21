<?php

namespace App\Backend\Modules\Caracteristique;


use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;
use Entity\Maturite;
use Entity\Photo;
use Entity\Produit;

use Entity\BeneficeSante;
use Entity\Caracteristique;
use Entity\Conseil;
use Entity\Marketing;

class CaracteristiqueController extends BackController
{
    protected $nomProduit;
    protected $varieteProduit;

    /**
     * Show
     *
     * @param HTTPRequest $request
     */
    // public function executeShow(HTTPRequest $request)
    // {
    //     $maturite = $this->managers->getManagerOf('Caracteristique')->getUnique($request->getData('id'));

    //     if (empty($maturite)) {
    //         $this->app->httpResponse()->redirect404();
    //     }

    //     $produit = $this->managers->getManagerOf('Produit')->getUniqueId($maturite->getIdProduit());

    //     $this->page->addVar('maturite', $maturite);
    //     $this->page->addVar('produit', $produit);
    // }

    /**
     * Insert
     *
     * @param HTTPRequest $request
     */
    public function executeInsert(HTTPRequest $request)
    {
        if ($request->postExists('famille')) {
            $this->processForm($request);
        }
        $this->page->addVar('title', 'Ajout de caractéristiques');
        $this->page->addVar('variete', $request->getData('variete'));
        $this->page->addVar('nom', $request->getData('produit'));

        $produit = $this->managers->getManagerOf('Produit')->getUnique($request->getData('produit'), $request->getData('variete'));
        $this->page->addVar('prod', $produit);

        $this->page->addVar('sousTitre', preg_replace('#[_]+#', ' ', $request->getData('produit')) . " " . preg_replace('#[_]+#', ' ', $request->getData('variete')) . ' : Ajout de caractéristiques');
    }

    /**
     * Form
     *
     * @param HTTPRequest $request
     */

    public function processForm(HTTPRequest $request)
    {
        if ($request->postExists('id')) 
        {
            $caracteristique = new Caracteristique([
            'idCaracteristique' => intval($request->postData('id')),
            'idProduit' => $request->postData('idProduit'),
            'famille' => $request->postData('famille'),
            'espece' => $request->postData('espece'),
            'origine' => $request->postData('origine'),
            'forme' => $request->postData('forme'),
            'taillePoids' => $request->postData('tailleEtPoids'),
            'couleurTexture' => $request->postData('couleurEtTexture'),
            'saveur' => $request->postData('saveur'),
            'principauxProducteurs' => $request->postData('principauxProducteur')
            ]);
        } else {
            $caracteristique = new Caracteristique([
            'idProduit' => $request->postData('idProduit'),
            'famille' => $request->postData('famille'),
            'espece' => $request->postData('espece'),
            'origine' => $request->postData('origine'),
            'forme' => $request->postData('forme'),
            'taillePoids' => $request->postData('tailleEtPoids'),
            'couleurTexture' => $request->postData('couleurEtTexture'),
            'saveur' => $request->postData('saveur'),
            'principauxProducteurs' => $request->postData('principauxProducteur')
            ]);
        }

        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($caracteristique->getIdProduit());

        $this->managers->getManagerOf('Caracteristique')->save($caracteristique);
        $this->app->httpResponse()->redirect('produit-update-' . $produit->getNomProduit() . "-" . $produit->getVarieteProduit() . ".html");

        $this->page->addVar('erreursCaracteristique', $caracteristique->erreurs());
        $this->page->addVar('erreurs', $produit->erreurs());
        $this->page->addVar('caracteristique', $caracteristique);
        $this->page->addVar('produit', $produit);
    }

    /**
     * Update
     *
     * @param HTTPRequest $request
     */
    public function executeUpdate(HTTPRequest $request)
    {
        if ($request->postExists('famille')) {
            $this->processForm($request);
        }
        $maturite = $this->managers->getManagerOf('Caracteristique')->getUnique($request->getData('id'));
        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($caracteristique->getIdProduit());

        $this->page->addVar('title', 'Mise à jour d\'une fiche de maturité');
        $this->page->addVar('maturite', $maturite);
        $this->page->addVar('produit', $produit);

        $this->page->addVar('sousTitre', preg_replace('#[_]+#', ' ', $request->getData('produit')) . " " . preg_replace('#[_]+#', ' ', $request->getData('variete')) . ' : Ajout d\'une fiche de caracteristique');
    }

    /**
     * Delete
     *
     * @param HTTPRequest $request
     */
    public function executeDelete(HTTPRequest $request)
    {
        $caracteristique = $this->managers->getManagerOf('Caracteristique')->getUnique($request->getData('id'));
        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($caracteristique->getIdProduit());

        $this->managers->getManagerOf('Caracteristique')->deleteUnique($request->getData('id'));
        // $this->managers->getManagerOf('Produit')->deleteUnique($produit->getIdProduit());
        $this->app->getUser()->setFlash('La fiche a bien été supprimée !');

        $this->app->httpResponse()->redirect('produit-update-' . $produit->getNomProduit() . "-" . $produit->getVarieteProduit() . ".html");
    }
}