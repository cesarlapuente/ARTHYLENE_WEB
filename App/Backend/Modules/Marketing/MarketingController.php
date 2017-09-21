<?php

namespace App\Backend\Modules\Marketing;


use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;
use Entity\Maturite;
use Entity\Photo;
use Entity\Produit;

use Entity\BeneficeSante;
use Entity\Caracteristique;
use Entity\Conseil;
use Entity\Marketing;

class MarketingController extends BackController
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
        if ($request->postExists('marketing1')) {
            $this->processForm($request);
        }
        $this->page->addVar('title', 'Ajout de Marketing');
        $this->page->addVar('variete', $request->getData('variete'));
        $this->page->addVar('nom', $request->getData('produit'));

        $produit = $this->managers->getManagerOf('Produit')->getUnique($request->getData('produit'), $request->getData('variete'));
        $this->page->addVar('prod', $produit);

        $this->page->addVar('sousTitre', preg_replace('#[_]+#', ' ', $request->getData('produit')) . " " . preg_replace('#[_]+#', ' ', $request->getData('variete')) . ' : Ajout de Marketing');
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
            $marketing = new Marketing([
                'idMarketing' => intval($request->postData('id')),
                'idProduit' => $request->postData('idProduit'),
                'marketing1' => $request->postData('marketing1'),
                'marketing2' => $request->postData('marketing2')
            ]);
        } else {
            $marketing = new Marketing([
                'idProduit' => $request->postData('idProduit'),
                'marketing1' => $request->postData('marketing1'),
                'marketing2' => $request->postData('marketing2')
            ]);
        }

        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($marketing->getIdProduit());

        $this->managers->getManagerOf('Marketing')->save($marketing);
        $this->app->httpResponse()->redirect('produit-update-' . $produit->getNomProduit() . "-" . $produit->getVarieteProduit() . ".html");

        $this->page->addVar('erreursMarketing', $marketing->erreurs());
        $this->page->addVar('erreurs', $produit->erreurs());
        $this->page->addVar('marketing', $marketing);
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
        $marketing = $this->managers->getManagerOf('Marketing')->getUnique($request->getData('id'));
        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($marketing->getIdProduit());

        $this->page->addVar('title', 'Mise à jour d\'une fiche de maturité');
        $this->page->addVar('marketing', $marketing);
        $this->page->addVar('produit', $produit);

        $this->page->addVar('sousTitre', preg_replace('#[_]+#', ' ', $request->getData('produit')) . " " . preg_replace('#[_]+#', ' ', $request->getData('variete')) . ' : Ajout d\'une fiche de marketing');
    }

    /**
     * Delete
     *
     * @param HTTPRequest $request
     */
    public function executeDelete(HTTPRequest $request)
    {
        $maturite = $this->managers->getManagerOf('Marketing')->getUnique($request->getData('id'));
        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($marketing->getIdProduit());

        $this->managers->getManagerOf('Marketing')->delete($request->getData('id'));
        $this->managers->getManagerOf('Produit')->deleteUnique($produit->getIdProduit());
        $this->app->getUser()->setFlash('La fiche a bien été supprimée !');

        $this->app->httpResponse()->redirect('produit-update-' . $produit->getNomProduit() . "-" . $produit->getVarieteProduit() . ".html");
    }
}