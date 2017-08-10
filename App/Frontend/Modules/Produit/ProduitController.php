<?php

/**
 * Created by PhpStorm.
 * User: Thibault Nougues
 * Date: 29/05/2017
 * Time: 10:12
 */

namespace App\Frontend\Modules\Produit;

use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;

class ProduitController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {
        // On ajoute une définition pour le titre.
        $this->page->addVar('title', 'Liste des Produit');

        $manager = $this->managers->getManagerOf('Produit');

        $listeProduits = $manager->getList();

        // On ajoute la variable $listeProduit à la vue.
        $this->page->addVar('listeProduit', $listeProduits);
    }

    public function executeShow(HTTPRequest $request)
    {
        $produit = $this->managers->getManagerOf('Produit')->getUnique($request->getData('nom'), $request->getData('variete'));

        if (empty($produit)) {
            $this->app->httpResponse()->redirect404();
        }

        $presentation = $this->managers->getManagerOf('Presentation')->getUnique($produit->getIdPresentation());

        $this->page->addVar('title', $produit->getNomProduit());
        $this->page->addVar('produit', $produit);
        $this->page->addVar('presentation', $presentation);
    }
}