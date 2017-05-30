<?php

/**
 * Created by PhpStorm.
 * User: Thibault
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

        // Cette ligne, vous ne pouviez pas la deviner sachant qu'on n'a pas encore touché au modèle.
        // Contentez-vous donc d'écrire cette instruction, nous implémenterons la méthode ensuite.
        $listeProduits = $manager->getList();

        /*foreach ($listeProduits as $produit)
        {
            echo $produit->getNomProduit();
            //$debut = substr($produit->getNomProduit()." ".$produit->getVarieteProduit(), 0 , 200);
            $produit->setVarieteProduit("test");
        }*/
        // On ajoute la variable $listeNews à la vue.
        $this->page->addVar('listeProduit', $listeProduits);
    }

    public function executeShow(HTTPRequest $request)
    {
        $produit = $this->managers->getManagerOf('Produit')->getUnique($request->getData('id'));

        if (empty($produit)) {
            $this->app->httpResponse()->redirect404();
        }

        $this->page->addVar('title', $produit->getNomProduit());
        $this->page->addVar('produit', $produit);
    }
}