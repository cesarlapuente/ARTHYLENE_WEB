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

        $beneficeSante = $this->managers->getManagerOf('BeneficeSante')->getUnique($produit->getIdBeneficeSante());
        $caracteristique = $this->managers->getManagerOf('Caracteristique')->getUnique($produit->getIdCaracteristique());
        $conseil = $this->managers->getManagerOf('Conseil')->getUnique($produit->getIdConseil());
        $marketing = $this->managers->getManagerOf('Marketing')->getUnique($produit->getIdMarketing());

        $photo = $this->managers->getManagerOf('Photo')->getUnique($presentation->getIdPhoto());

        $this->page->addVar('title', $produit->getNomProduit());
        $this->page->addVar('produit', $produit);
        $this->page->addVar('presentation', $presentation);

        $this->page->addVar('photo', $photo);

        $this->page->addVar('beneficeSante', $beneficeSante);
        $this->page->addVar('caracteristique', $caracteristique);
        $this->page->addVar('conseil', $conseil);
        $this->page->addVar('marketing', $marketing);
    }
}