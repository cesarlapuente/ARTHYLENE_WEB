<?php

namespace App\Backend\Modules\Conseil;


use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;
use Entity\Maturite;
use Entity\Photo;
use Entity\Produit;

use Entity\BeneficeSante;
use Entity\Caracteristique;
use Entity\Conseil;
use Entity\Marketing;

class ConseilController extends BackController
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
        if ($request->postExists('conseil1')) {
            $this->processForm($request);
        }
        $this->page->addVar('title', 'Ajout de conseil');
        $this->page->addVar('variete', $request->getData('variete'));
        $this->page->addVar('nom', $request->getData('produit'));

        $produit = $this->managers->getManagerOf('Produit')->getUnique($request->getData('produit'), $request->getData('variete'));
        $this->page->addVar('prod', $produit);

        $this->page->addVar('sousTitre', preg_replace('#[_]+#', ' ', $request->getData('produit')) . " " . preg_replace('#[_]+#', ' ', $request->getData('variete')) . ' : Ajout de conseil de consommation');
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
                $conseil = new Conseil([
                'idConseil' => intval($request->postData('id')),
                'idProduit' => $request->postData('idProduit'),
                'conseil1' =>  $request->postData('conseil1'),
                'conseil2' => $request->postData('conseil2'),
                'conseil3' => $request->postData('conseil3'),
                'conseil4' => $request->postData('conseil4'),
                'conseil5' => $request->postData('conseil5'),
                'conseil6' => $request->postData('conseil6')
            ]);

        } else {
            $conseil = new Conseil([
                'idProduit' => $request->postData('idProduit'),
                'conseil1' =>  $request->postData('conseil1'),
                'conseil2' => $request->postData('conseil2'),
                'conseil3' => $request->postData('conseil3'),
                'conseil4' => $request->postData('conseil4'),
                'conseil5' => $request->postData('conseil5'),
                'conseil6' => $request->postData('conseil6')
            ]);
        }

        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($conseil->getIdProduit());

        $this->managers->getManagerOf('Conseil')->save($conseil);
        $this->app->httpResponse()->redirect('produit-update-' . $produit->getNomProduit() . "-" . $produit->getVarieteProduit() . ".html");

        $this->page->addVar('erreursConseil', $conseil->erreurs());
        $this->page->addVar('erreurs', $produit->erreurs());
        $this->page->addVar('conseil', $conseil);
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
        $maturite = $this->managers->getManagerOf('Conseil')->getUnique($request->getData('id'));
        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($conseil->getIdProduit());

        $this->page->addVar('title', 'Mise à jour d\'une fiche de maturité');
        $this->page->addVar('maturite', $maturite);
        $this->page->addVar('produit', $produit);

        $this->page->addVar('sousTitre', preg_replace('#[_]+#', ' ', $request->getData('produit')) . " " . preg_replace('#[_]+#', ' ', $request->getData('variete')) . ' : Ajout d\'une fiche de conseil');
    }

    /**
     * Delete
     *
     * @param HTTPRequest $request
     */
    public function executeDelete(HTTPRequest $request)
    {
        $maturite = $this->managers->getManagerOf('Conseil')->getUnique($request->getData('id'));
        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($conseil->getIdProduit());

        $this->managers->getManagerOf('Conseil')->delete($request->getData('id'));
        $this->managers->getManagerOf('Produit')->deleteUnique($produit->getIdProduit());
        $this->app->getUser()->setFlash('La fiche a bien été supprimée !');

        $this->app->httpResponse()->redirect('produit-update-' . $produit->getNomProduit() . "-" . $produit->getVarieteProduit() . ".html");
    }
}