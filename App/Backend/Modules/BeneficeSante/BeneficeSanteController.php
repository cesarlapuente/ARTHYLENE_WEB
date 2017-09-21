<?php

namespace App\Backend\Modules\BeneficeSante;


use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;
use Entity\Maturite;
use Entity\Photo;
use Entity\Produit;

use Entity\BeneficeSante;
use Entity\Caracteristique;
use Entity\Conseil;
use Entity\Marketing;

class BeneficeSanteController extends BackController
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
        if ($request->postExists('benefice1')) {
            $this->processForm($request);
        }
        $this->page->addVar('title', 'Ajout de Bénéfice');
        $this->page->addVar('variete', $request->getData('variete'));
        $this->page->addVar('nom', $request->getData('produit'));

        $produit = $this->managers->getManagerOf('Produit')->getUnique($request->getData('produit'), $request->getData('variete'));
        $this->page->addVar('prod', $produit);

        $this->page->addVar('sousTitre', preg_replace('#[_]+#', ' ', $request->getData('produit')) . " " . preg_replace('#[_]+#', ' ', $request->getData('variete')) . ' : Ajout de bénéfice santé');
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
                $beneficeSante = new BeneficeSante([
                    'idBeneficeSante' => intval($request->postData('id')),
                    'idProduit' => $request->postData('idProduit'),
                    'benefice1' => $request->postData('benefice1'),
                    'benefice2' => $request->postData('benefice2'),
                    'benefice3' => $request->postData('benefice3'),
                    'benefice4' => $request->postData('benefice4'),
                    'benefice5' => $request->postData('benefice5'),
                    'benefice6' => $request->postData('benefice6')
            ]);

        } else {
                $beneficeSante = new BeneficeSante([
                    'idProduit' => $request->postData('idProduit'),
                    'benefice1' => $request->postData('benefice1'),
                    'benefice2' => $request->postData('benefice2'),
                    'benefice3' => $request->postData('benefice3'),
                    'benefice4' => $request->postData('benefice4'),
                    'benefice5' => $request->postData('benefice5'),
                    'benefice6' => $request->postData('benefice6')
            ]);
        }

        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($beneficeSante->getIdProduit());

        $this->managers->getManagerOf('BeneficeSante')->save($beneficeSante);
        $this->app->httpResponse()->redirect('produit-update-' . $produit->getNomProduit() . "-" . $produit->getVarieteProduit() . ".html");

        $this->page->addVar('erreursBeneficeSante', $beneficeSante->erreurs());
        $this->page->addVar('erreurs', $produit->erreurs());
        $this->page->addVar('beneficeSante', $beneficeSante);
        $this->page->addVar('produit', $produit);
    }

    /**
     * Update
     *
     * @param HTTPRequest $request
     */
    public function executeUpdate(HTTPRequest $request)
    {
        if ($request->postExists('benefice1')) {
            $this->processForm($request);
        }
        $maturite = $this->managers->getManagerOf('BeneficeSante')->getUnique($request->getData('id'));
        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($beneficeSante->getIdProduit());

        $this->page->addVar('title', 'Mise à jour d\'une fiche de maturité');
        $this->page->addVar('maturite', $maturite);
        $this->page->addVar('produit', $produit);

        $this->page->addVar('sousTitre', preg_replace('#[_]+#', ' ', $request->getData('produit')) . " " . preg_replace('#[_]+#', ' ', $request->getData('variete')) . ' : Ajout d\'une fiche de bénéfice sur la santé');
    }

    /**
     * Delete
     *
     * @param HTTPRequest $request
     */
    public function executeDelete(HTTPRequest $request)
    {
        $maturite = $this->managers->getManagerOf('BeneficeSante')->getUnique($request->getData('id'));
        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($beneficeSante->getIdProduit());

        $this->managers->getManagerOf('BeneficeSante')->delete($request->getData('id'));
        $this->managers->getManagerOf('Produit')->deleteUnique($produit->getIdProduit());
        $this->app->getUser()->setFlash('La fiche a bien été supprimée !');

        $this->app->httpResponse()->redirect('produit-update-' . $produit->getNomProduit() . "-" . $produit->getVarieteProduit() . ".html");
    }
}